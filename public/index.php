<?php
define('BASE_DIR', realpath(__DIR__ . '/../'));
require_once BASE_DIR . '/app/controllers/AuthController.php';
require_once BASE_DIR . '/app/controllers/HomeController.php';
require_once BASE_DIR . '/app/controllers/StudentController.php';
require_once BASE_DIR . '/app/controllers/TeacherController.php';
require_once BASE_DIR . '/app/controllers/StaffController.php';

// Parse the URL to separate the path and query string
$urlParts = parse_url($_SERVER['REQUEST_URI']);
$path = $urlParts['path'];

// Remove the base URL and the last slash from the path
$uri = rtrim(str_replace('/uapians/', '', $path), '/');

// Parse the query string if present
$queryString = isset($urlParts['query']) ? $urlParts['query'] : '';
parse_str($queryString, $queryParams);

// Define routes
$routes = [
    '' => ['controller' => 'HomeController', 'action' => 'list'],
    'logout' => ['controller' => 'AuthController', 'action' => 'logOut'],
    // Student
    'student/list' => ['controller' => 'StudentController', 'action' => 'list'],
    'student/profile' => ['controller' => 'StudentController', 'action' => 'profile'],
    'student/edit' => ['controller' => 'StudentController', 'action' => 'edit'],
    'student/update' => ['controller' => 'StudentController', 'action' => 'update'],
    'student/insert' => ['controller' => 'StudentController', 'action' => 'insert'],
    // Teacher
    'teacher/list' => ['controller' => 'TeacherController', 'action' => 'list'],
    'teacher/profile' => ['controller' => 'TeacherController', 'action' => 'profile'],
    'teacher/edit' => ['controller' => 'TeacherController', 'action' => 'edit'],
    'teacher/update' => ['controller' => 'TeacherController', 'action' => 'update'],
    'teacher/insert' => ['controller' => 'TeacherController', 'action' => 'insert'],
    // Staff
    'staff/list' => ['controller' => 'StaffController', 'action' => 'list'],
    'staff/profile' => ['controller' => 'StaffController', 'action' => 'profile'],
    'staff/edit' => ['controller' => 'StaffController', 'action' => 'edit'],
    'staff/update' => ['controller' => 'StaffController', 'action' => 'update'],
];

// Find the matching route
if (array_key_exists($uri, $routes)) {
    $route = $routes[$uri];
    $controllerName = $route['controller'];
    $actionName = $route['action'];
    
    // Instantiate the controller and call the action
    $controller = new $controllerName();
    $controller->$actionName($queryParams);
} else {
    // Handle 404 Not Found
    header("HTTP/1.0 404 Not Found");
    echo '404 Not Found';
}
?>
