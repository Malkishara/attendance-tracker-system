<?php
class Subject {

    //get subjects from db
    public static function getAll(): array {
        $conn = Database::getConnection();
        $result = $conn->query("SELECT id, name FROM subjects");

        $subjects = [];
        while ($row = $result->fetch_assoc()) {
            $subjects[] = $row;
        }
        return $subjects;
    }
}
?>