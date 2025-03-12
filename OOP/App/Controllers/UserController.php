<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\Logger as LogService;

class UserController{
    public function getUser($id){
        // Using imported user class
        $user = new User($id, "John Doe");

        // Using a class with full namespace
        $validator = new App\Validators\UserValidator();

        // Using aliased class
        $logger = new LogService();

        return $user;
    }
}