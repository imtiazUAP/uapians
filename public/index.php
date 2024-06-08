<?php
define('BASE_DIR', realpath(__DIR__ . '/../'));
require_once BASE_DIR . '/app/controllers/HomeController.php';
require_once BASE_DIR . '/app/controllers/StudentController.php';
// ... require other controllers as needed

// DEBUG:
echo "Requested URI: " . $_SERVER['REQUEST_URI'] . "<br>";

// Remove the base URL and the last slash from the request URI
$uri = rtrim(str_replace('/uapians/', '', $_SERVER['REQUEST_URI']), '/');

// DEBUG:
echo "Switching URI: " . $uri . "<br>";

// Define routes
$routes = [
    '' => ['controller' => 'HomeController', 'action' => 'list'],
    'student/list' => ['controller' => 'StudentController', 'action' => 'list'],
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
    $controller->$actionName();
} else {
    // Handle 404 Not Found
    header("HTTP/1.0 404 Not Found");
    echo '404 Not Found';
}
