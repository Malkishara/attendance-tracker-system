<link rel="stylesheet" href="<?= BASE_URL ?>/css/dashboard.css">

<div class="page-container">
    <div class="card">
         <!-- mark attendance button -->
         <div class="mark-attendance-btn">
          <form method="GET" action="<?= BASE_URL ?>/attendance-form">
                <button type="submit">Mark Attendance</button>
            </form>
         </div>

         <!-- header -->
           <h2>Attendance Dashboard</h2>    
        

        <!-- filter -->
        <form method="GET" class="filter-form">
            <label>Subject:
                <select name="subject_id" required>
                    <?php foreach ($subjects as $sub): ?>
                        <option value="<?= $sub['id'] ?>" <?= $sub['id'] == $subjectId ? 'selected' : '' ?>>
                            <?= htmlspecialchars($sub['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>

            <label>From:
                <input type="date" name="from" value="<?= htmlspecialchars($from) ?>">
            </label>
            <label>To:
                <input type="date" name="to" value="<?= htmlspecialchars($to) ?>">
            </label>

            <button type="submit">Search</button>
        </form>

        <!-- table -->
        <table class="attendance-table">
            <thead>
                <tr><th>Student</th><th>Attendance %</th></tr>
            </thead>
            <tbody>
                <?php foreach ($report as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= $row['attendance_percentage'] ?>%</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
