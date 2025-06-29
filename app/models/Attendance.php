<?php
require_once __DIR__ . '/../core/Database.php';


class Attendance {

    //mark attendance
    public static function markAttendance(int $studentId, int $subjectId, string $status, string $date): void {
        $conn = Database::getConnection();

        $stmt = $conn->prepare("SELECT id FROM attendance WHERE student_id = ? AND subject_id = ? AND date = ?");
        $stmt->bind_param("iis", $studentId, $subjectId, $date);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $stmt = $conn->prepare("UPDATE attendance SET status = ? WHERE student_id = ? AND subject_id = ? AND date = ?");
            $stmt->bind_param("siis", $status, $studentId, $subjectId, $date);
        } else {
            $stmt = $conn->prepare("INSERT INTO attendance (student_id, subject_id, status, date) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiss", $studentId, $subjectId, $status, $date);
        }
        $stmt->execute();
    }

    //get attendance report 
    public static function getAttendanceReport(int $subjectId, string $from, string $to): array {
    $conn = Database::getConnection();

    $stmt = $conn->prepare("
        SELECT s.id, s.name,
            ROUND(SUM(CASE WHEN a.status = 'present' THEN 1 ELSE 0 END) / COUNT(*) * 100, 2) AS attendance_percentage
        FROM attendance a
        JOIN students s ON s.id = a.student_id
        WHERE a.subject_id = ? AND a.date BETWEEN ? AND ?
        GROUP BY s.id, s.name
        ORDER BY attendance_percentage DESC
    ");
    $stmt->bind_param("iss", $subjectId, $from, $to);
    $stmt->execute();

    $result = $stmt->get_result();
    $report = [];
    while ($row = $result->fetch_assoc()) {
        $report[] = $row;
    }
    return $report;
}


    // get attendance for a subject & date for all students 
    public static function getAttendanceBySubjectAndDate(int $subjectId, string $date): array {
        $conn = Database::getConnection();

        $stmt = $conn->prepare("SELECT student_id, status FROM attendance WHERE subject_id = ? AND date = ?");
        $stmt->bind_param("is", $subjectId, $date);
        $stmt->execute();

        $result = $stmt->get_result();
        $attendance = [];
        while ($row = $result->fetch_assoc()) {
            $attendance[$row['student_id']] = $row['status'];
        }
        return $attendance;
    }
}
