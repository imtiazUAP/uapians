<?php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$projectRoot = dirname($_SERVER['SCRIPT_NAME'], 2); // Adjust the level as per your directory structure

// Define base URL
define('BASE_URL', $protocol . "://" . $host . $projectRoot);
?>