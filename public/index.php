<?php
define('BASE_DIR', realpath(__DIR__ . '/../'));
require_once BASE_DIR . '/app/controllers/AuthController.php';
require_once BASE_DIR . '/app/controllers/BlogController.php';
require_once BASE_DIR . '/app/controllers/BloodBankController.php';
require_once BASE_DIR . '/app/controllers/CourseController.php';
require_once BASE_DIR . '/app/controllers/HomeController.php';
require_once BASE_DIR . '/app/controllers/ProjectController.php';
require_once BASE_DIR . '/app/controllers/ReferenceController.php';
require_once BASE_DIR . '/app/controllers/StaffController.php';
require_once BASE_DIR . '/app/controllers/StudentController.php';
require_once BASE_DIR . '/app/controllers/TeacherController.php';
require_once BASE_DIR . '/app/controllers/TutorialController.php';
require_once BASE_DIR . '/app/controllers/UtilitiesController.php';
require_once BASE_DIR . '/app/controllers/AdminController.php';

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
    // course
    'course/list' => ['controller' => 'CourseController', 'action' => 'list'],
    'course/add' => ['controller' => 'CourseController', 'action' => 'add'],
    'course/save' => ['controller' => 'CourseController', 'action' => 'save'],
    'course/edit' => ['controller' => 'CourseController', 'action' => 'edit'],
    'course/update' => ['controller' => 'CourseController', 'action' => 'update'],
    'course/delete-confirm' => ['controller' => 'CourseController', 'action' => 'deleteConfirm'],
    'course/delete-execute' => ['controller' => 'CourseController', 'action' => 'deleteExecute'],
    // project
    'project/category' => ['controller' => 'ProjectController', 'action' => 'category'],
    'project/list' => ['controller' => 'ProjectController', 'action' => 'list'],
    // Blog
    'blog/list' => ['controller' => 'BlogController', 'action' => 'list'],
    'blog/detail' => ['controller' => 'BlogController', 'action' => 'detail'],
    'blog/add' => ['controller' => 'BlogController', 'action' => 'add'],
    'blog/save' => ['controller' => 'BlogController', 'action' => 'save'],
    'blog/edit' => ['controller' => 'BlogController', 'action' => 'edit'],
    'blog/update' => ['controller' => 'BlogController', 'action' => 'update'],
    'blog/delete-confirm' => ['controller' => 'BlogController', 'action' => 'deleteConfirm'],
    'blog/delete-execute' => ['controller' => 'BlogController', 'action' => 'deleteExecute'],
    // Blood Bank
    'blood-bank/list' => ['controller' => 'BloodBankController', 'action' => 'list'],
    // Reference
    'reference/list' => ['controller' => 'ReferenceController', 'action' => 'list'],
    // Tutorial
    'tutorial/category' => ['controller' => 'TutorialController', 'action' => 'category'],
    'tutorial/list' => ['controller' => 'TutorialController', 'action' => 'list'],
    // Utilities - Static Pages
    'about' => ['controller' => 'UtilitiesController', 'action' => 'aboutPage'],
    'admin/signup-list' => ['controller' => 'AdminController', 'action' => 'signUpList'],
    'admin/signup-review' => ['controller' => 'AdminController', 'action' => 'signUpReview'],
    'admin/signup-approve' => ['controller' => 'AdminController', 'action' => 'signUpApprove'],
    'admin/signup-delete-confirm' => ['controller' => 'AdminController', 'action' => 'deleteConfirmSignup'],
    'admin/signup-delete-execute' => ['controller' => 'AdminController', 'action' => 'deleteExecuteSignup'],
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
