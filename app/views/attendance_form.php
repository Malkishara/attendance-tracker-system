<link rel="stylesheet" href="<?= BASE_URL ?>/css/attendance.css">

<div class="page-container">
    <div class="card">
       <!-- dashboard button -->
        <div class="dashboard-btn">
             <form method="GET" action="<?= BASE_URL ?>/dashboard">
                <button type="submit">Go to Dashboard</button>
            </form>
        </div>

        <!-- header -->
        <h2>Mark Attendance</h2>

        <!-- filter -->
        <div class="top-bar">
            <form method="GET" action="<?= BASE_URL ?>/attendance-form" class="subject-form">
                <label>Select Subject:
                    <select name="subject_id" onchange="this.form.submit()" required>
                        <option value="">-- Select --</option>
                        <?php foreach ($subjects as $sub): ?>
                            <option value="<?= $sub['id'] ?>" <?= ($sub['id'] == $subjectId) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($sub['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>
            </form>
        </div>

       <!-- success message -->
        <div id="successMsg">Attendance submitted successfully.</div>

        <?php if ($subjectId && $students): ?>
            <!-- search bar -->
            <div class="search-wrapper">
                <input type="text" id="searchInput" placeholder="Search student...">
            </div>

            <!-- attendance form -->
            <form method="POST" action="<?= BASE_URL ?>/submit-attendance">
                <input type="hidden" name="subject_id" value="<?= htmlspecialchars($subjectId) ?>">

                <table>
                    <thead>
                        <tr><th>Reg. Number</th><th>Name</th><th>Status</th></tr>
                    </thead>
                    <tbody id="studentTable">
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td><?= htmlspecialchars($student['reg_number']) ?></td>
                                <td><?= htmlspecialchars($student['name']) ?></td>
                                <td>
                                    <select name="attendance[<?= $student['id'] ?>]" required>
                                        <option value="present" <?= (isset($attendanceStatuses[$student['id']]) && $attendanceStatuses[$student['id']] === 'present') ? 'selected' : '' ?>>Present</option>
                                        <option value="absent" <?= (isset($attendanceStatuses[$student['id']]) && $attendanceStatuses[$student['id']] === 'absent') ? 'selected' : '' ?>>Absent</option>
                                    </select>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <br>
                <button type="submit">Submit Attendance</button>
            </form>

        <?php elseif ($subjectId): ?>
            <p>No students enrolled in this subject.</p>
        <?php endif; ?>
    </div>
</div>

<!-- javascript -->
<script>
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('submitted') === '1') {
        document.getElementById('successMsg').style.display = 'block';
    }

    document.getElementById('searchInput').addEventListener('input', function () {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#studentTable tr');
        rows.forEach(row => {
            const name = row.children[1].innerText.toLowerCase();
            const reg = row.children[0].innerText.toLowerCase();
            row.style.display = name.includes(filter) || reg.includes(filter) ? '' : 'none';
        });
    });
</script>
