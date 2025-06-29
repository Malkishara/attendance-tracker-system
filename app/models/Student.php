<?php
class Student {

    //get student by subject
    public static function getStudentsBySubject(int $subjectId): array {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("
            SELECT s.id, s.name, s.reg_number
            FROM students s
            JOIN student_subjects ss ON s.id = ss.student_id
            WHERE ss.subject_id = ?
        ");
        $stmt->bind_param("i", $subjectId);
        $stmt->execute();
        $result = $stmt->get_result();

        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
        return $students;
    }

    
}
?>