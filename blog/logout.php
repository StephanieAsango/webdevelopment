<?php

// Include the config file
require_once 'includes/config.php';

// Unset all session variables
$_SESSION =array();

// Destroy the session
session_destroy();      

// Redirect to the login page
header('Location: ' . BASE_URL . '/login.php');
exit;

