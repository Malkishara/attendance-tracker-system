<?php
define('BASE_URL', '/attendance-tracker-system/public');

require_once '../app/controllers/AttendanceController.php';

$controller = new AttendanceController();

$basePath = BASE_URL;
$requestUri = strtok($_SERVER['REQUEST_URI'], '?');
$path = str_replace($basePath, '', $requestUri);
$method = $_SERVER['REQUEST_METHOD'];

if (($path === '/' || $path === '/index.php') && $method === 'GET') {
    $controller->showDashboard();
} elseif ($path === '/attendance-form' && $method === 'GET') {
    $controller->showForm();
} elseif ($path === '/submit-attendance' && $method === 'POST') {
    $controller->submitForm();
} elseif ($path === '/dashboard' && $method === 'GET') {
    $controller->showDashboard();
}else {
    http_response_code(404);
    echo "404 Not Found: " . htmlspecialchars($path);
}
?>