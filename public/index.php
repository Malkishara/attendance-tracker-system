<?php
require '../app/core/Database.php';
require '../app/models/Student.php';
require '../app/models/Attendance.php';
require '../app/models/Subject.php';
require '../routes/web.php';
if (!defined('BASE_URL')) {
    define('BASE_URL', '/attendance-tracker-system/public');
}

?>