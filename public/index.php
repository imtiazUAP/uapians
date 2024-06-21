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
require_once BASE_DIR . '/app/controllers/ClubController.php';
require_once BASE_DIR . '/app/controllers/GalleryController.php';

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
    // Auth
    'logout' => ['controller' => 'AuthController', 'action' => 'logOut'],
    // Home
    '' => ['controller' => 'HomeController', 'action' => 'list'],
    'notice/edit' => ['controller' => 'HomeController', 'action' => 'edit'],
    'notice/update' => ['controller' => 'HomeController', 'action' => 'update'],

    'news/add' => ['controller' => 'HomeController', 'action' => 'newsAdd'],
    'news/save' => ['controller' => 'HomeController', 'action' => 'newsSave'],
    'news/edit' => ['controller' => 'HomeController', 'action' => 'newsEdit'],
    'news/update' => ['controller' => 'HomeController', 'action' => 'newsUpdate'],
    'news/delete-confirm' => ['controller' => 'HomeController', 'action' => 'newsDeleteConfirm'],
    'news/delete-execute' => ['controller' => 'HomeController', 'action' => 'newsDeleteExecute'],

    // Student
    'student/list' => ['controller' => 'StudentController', 'action' => 'list'],
    'student/profile' => ['controller' => 'StudentController', 'action' => 'profile'],
    'student/edit' => ['controller' => 'StudentController', 'action' => 'edit'],
    'student/update' => ['controller' => 'StudentController', 'action' => 'update'],
    'student/insert' => ['controller' => 'StudentController', 'action' => 'insert'],
    'student/sign-up' => ['controller' => 'StudentController', 'action' => 'signUp'],
    'student/sign-up/save' => ['controller' => 'StudentController', 'action' => 'signUpSave'],
    'student/district/list' => ['controller' => 'StudentController', 'action' => 'filterDistrict'],
    // Teacher
    'teacher/list' => ['controller' => 'TeacherController', 'action' => 'list'],
    'teacher/profile' => ['controller' => 'TeacherController', 'action' => 'profile'],
    'teacher/edit' => ['controller' => 'TeacherController', 'action' => 'edit'],
    'teacher/update' => ['controller' => 'TeacherController', 'action' => 'update'],
    'teacher/add' => ['controller' => 'TeacherController', 'action' => 'add'],
    'teacher/save' => ['controller' => 'TeacherController', 'action' => 'save'],
    'teacher/delete-confirm' => ['controller' => 'TeacherController', 'action' => 'deleteConfirm'],
    'teacher/delete-execute' => ['controller' => 'TeacherController', 'action' => 'deleteExecute'],
    // Staff
    'staff/list' => ['controller' => 'StaffController', 'action' => 'list'],
    'staff/profile' => ['controller' => 'StaffController', 'action' => 'profile'],
    'staff/edit' => ['controller' => 'StaffController', 'action' => 'edit'],
    'staff/update' => ['controller' => 'StaffController', 'action' => 'update'],
    // club
    'club/cultural/detail' => ['controller' => 'ClubController', 'action' => 'culturalClubDetail'],
    'club/programming/detail' => ['controller' => 'ClubController', 'action' => 'programmingClubDetail'],
    'club/research/detail' => ['controller' => 'ClubController', 'action' => 'researchClubDetail'],
    'club/software/detail' => ['controller' => 'ClubController', 'action' => 'softwareClubDetail'],
    'club/sports/detail' => ['controller' => 'ClubController', 'action' => 'sportsClubDetail'],
    'club/web/detail' => ['controller' => 'ClubController', 'action' => 'webClubDetail'],
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
    'project/add' => ['controller' => 'ProjectController', 'action' => 'add'],
    'project/save' => ['controller' => 'ProjectController', 'action' => 'save'],
    // Blog
    'blog/list' => ['controller' => 'BlogController', 'action' => 'list'],
    'blog/detail' => ['controller' => 'BlogController', 'action' => 'detail'],
    'blog/add' => ['controller' => 'BlogController', 'action' => 'add'],
    'blog/save' => ['controller' => 'BlogController', 'action' => 'save'],
    'blog/edit' => ['controller' => 'BlogController', 'action' => 'edit'],
    'blog/update' => ['controller' => 'BlogController', 'action' => 'update'],
    'blog/delete-confirm' => ['controller' => 'BlogController', 'action' => 'deleteConfirm'],
    'blog/delete-execute' => ['controller' => 'BlogController', 'action' => 'deleteExecute'],
    'blog/comment/save' => ['controller' => 'BlogController', 'action' => 'saveComment'],
    // Blood Bank
    'blood-bank/list' => ['controller' => 'BloodBankController', 'action' => 'list'],
    // Reference
    'reference/list' => ['controller' => 'ReferenceController', 'action' => 'list'],
    'reference/add' => ['controller' => 'ReferenceController', 'action' => 'add'],
    'reference/save' => ['controller' => 'ReferenceController', 'action' => 'save'],
    'reference/edit' => ['controller' => 'ReferenceController', 'action' => 'edit'],
    'reference/update' => ['controller' => 'ReferenceController', 'action' => 'update'],
    'reference/delete-confirm' => ['controller' => 'ReferenceController', 'action' => 'deleteConfirm'],
    'reference/delete-execute' => ['controller' => 'ReferenceController', 'action' => 'deleteExecute'],
    // Tutorial
    'tutorial/category' => ['controller' => 'TutorialController', 'action' => 'category'],
    'tutorial/list' => ['controller' => 'TutorialController', 'action' => 'list'],
    'tutorial/add' => ['controller' => 'TutorialController', 'action' => 'add'],
    'tutorial/save' => ['controller' => 'TutorialController', 'action' => 'save'],
    // Utilities - Static Pages
    'about' => ['controller' => 'UtilitiesController', 'action' => 'aboutPage'],
    'admin/signup-list' => ['controller' => 'AdminController', 'action' => 'signUpList'],
    'admin/signup-review' => ['controller' => 'AdminController', 'action' => 'signUpReview'],
    'admin/signup-approve' => ['controller' => 'AdminController', 'action' => 'signUpApprove'],
    'admin/signup-delete-confirm' => ['controller' => 'AdminController', 'action' => 'deleteConfirmSignup'],
    'admin/signup-delete-execute' => ['controller' => 'AdminController', 'action' => 'deleteExecuteSignup'],
    'admin/add-student' => ['controller' => 'AdminController', 'action' => 'addStudent'],
    'admin/save-student' => ['controller' => 'AdminController', 'action' => 'saveStudent'],
    // Gallery
    'gallery/list' => ['controller' => 'GalleryController', 'action' => 'list'],
    'gallery/add' => ['controller' => 'GalleryController', 'action' => 'add'],
    'gallery/save' => ['controller' => 'GalleryController', 'action' => 'save'],
    'gallery/delete-confirm' => ['controller' => 'GalleryController', 'action' => 'deleteConfirm'],
    'gallery/delete-execute' => ['controller' => 'GalleryController', 'action' => 'deleteExecute'],

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
