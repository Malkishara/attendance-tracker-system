<?php
require_once __DIR__ . '/../models/Student.php';
require_once __DIR__ . '/../models/Subject.php';
require_once __DIR__ . '/../models/Attendance.php';

class AttendanceController {
    //show attendance form
    public function showForm() {
        $subjectId = $_GET['subject_id'] ?? null;
        $subjectId = $subjectId ? (int)$subjectId : null;

        $subjects = Subject::getAll();
        $students = $subjectId ? Student::getStudentsBySubject($subjectId) : [];
        $today = date('Y-m-d');
        $attendanceStatuses = $subjectId ? Attendance::getAttendanceBySubjectAndDate($subjectId, $today) : [];

        include __DIR__ . '/../views/attendance_form.php';
    }

    //submit attendance form
    public function submitForm() {
        $subjectId = (int)($_POST['subject_id'] ?? 0);
        $date = date('Y-m-d');

        foreach ($_POST['attendance'] as $studentId => $status) {
            Attendance::markAttendance((int)$studentId, $subjectId, $status, $date);
        }

        header("Location: " . BASE_URL . "/attendance-form?subject_id=$subjectId&submitted=1");
        exit;
    }

    //show dashboard page
    public function showDashboard() {
        $subjectId = (int)($_GET['subject_id'] ?? 1);
        $from = $_GET['from'] ?? date('Y-m-d', strtotime('-7 days'));
        $to = $_GET['to'] ?? date('Y-m-d');

        $subjects = Subject::getAll();
        $report = Attendance::getAttendanceReport($subjectId, $from, $to);

        include __DIR__ . '/../views/dashboard.php';
    }
}
