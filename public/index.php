<?php
define('BASE_DIR', realpath(__DIR__ . '/../'));
require_once BASE_DIR . '/app/controllers/AuthController.php';
require_once BASE_DIR . '/app/controllers/HomeController.php';
require_once BASE_DIR . '/app/controllers/StudentController.php';

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
    'student/list' => ['controller' => 'StudentController', 'action' => 'list'],
    'student/profile' => ['controller' => 'StudentController', 'action' => 'profile'],
    'student/edit' => ['controller' => 'StudentController', 'action' => 'edit'],
    'student/update' => ['controller' => 'StudentController', 'action' => 'update'],
    'student/insert' => ['controller' => 'StudentController', 'action' => 'insert'],
    // Add other routes here
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
