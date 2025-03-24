<?php

// Error reporting for development
ini_set('display_errors', 1);
ini_set('dispaly_start_up_errors', 1);
error_reporting(E_ALL);

// Session start
session_start();

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'blog_db');


// Site url
define('BASE_URL', 'http://localhost/blog');

// Autoload classes
spl_autoload_register(function($className){
    $file = __DIR__ . '/classes/' . $className . 'php';
    if (file_exists($file)){
        require_once $file;
    }
});