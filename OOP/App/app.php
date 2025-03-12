<?php

require_once 'autoloader.php';

// Now you can use classes without manual reqiures
$userController = new App\Controllers\UserController();
$user = $userController->getUser(1);
echo $user ->getName(); //Output John Doe

/**
 * Namespace and key concepts
 * -Use 'namespace' keyword at the top of your file
 * -Import classes with the 'use' keyword
 * -reate aliases with 'use Namespace\Class as Alias
 * -Reference global namespace with lesding backlash(namespace\Class)
 * 
 * Autoloading :
 * -Automatically loads class files when they're needed 
 * -PSR-4 is a common standard for autoloading
 * -Composer provided robust autoloader functionality
 */