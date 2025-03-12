<?php 
// Namespaces and autoloading

// Namespaces help to ogrganize code and avoid naming conflicts
// Autoloading automatically loads class files when needed

// File: App/Models/User.php

namespace App\Models;

class User {
    private $id;
    private $name;

    public function __construct($id, $name){
        $this->id = $id;
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
}
