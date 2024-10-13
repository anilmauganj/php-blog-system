<?php

define('BASE_URL', 'http://localhost/blogsystem');

// Autoload class

spl_autoload_register(function($class_name) {
    require_once 'classes/' . $class_name . ".php";
});

// Start session for login management

session_start();

// Database connection 
$db = new Database();
$conn = $db->connect();