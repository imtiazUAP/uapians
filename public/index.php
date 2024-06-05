<?php
define('BASE_DIR', realpath(__DIR__ . '/../'));
require_once BASE_DIR . '/app/controllers/StudentController.php';
// ... require other controllers as needed

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');

// Define routes
$routes = [
    'uapians/' => ['controller' => 'StudentController', 'action' => 'list'],
    'uapians/student/list' => ['controller' => 'StudentController', 'action' => 'list'],
    'uapians/student/insert' => ['controller' => 'StudentController', 'action' => 'insert'],
    // Add other routes here
];

// Find the matching route
if (array_key_exists($uri, $routes)) {
    $route = $routes[$uri];
    $controllerName = $route['controller'];
    $actionName = $route['action'];
    
    // Instantiate the controller and call the action
    $controller = new $controllerName();
    $controller->$actionName();
} else {
    // Handle 404 Not Found
    header("HTTP/1.0 404 Not Found");
    echo '404 Not Found';
}
