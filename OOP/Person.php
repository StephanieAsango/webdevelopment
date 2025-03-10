<?php

// Class definition
class Person{
    // properties (attributes)
    public $name;
    public $age;

    // Constructor -initializes the object
    public function __construct($name, $age){
        $this ->name = $name;
        $this ->age = $age;
    }
    // Methods - function inside a class
    public function greet(){
        return "hello , my name is{$this ->name} and I am {$this ->age}years old.";
    }

    // Another method
    public function haveBirthday(){
        $this ->age ++; //increment age by 1
        return "Happy Birthday! Now I'm {$this ->age} years old.";
    }
}

// Creating an object  in PHP(instance of the class)
$john = new Person("John", 30);
$jane = new Person("jane", 25);

// accessing properties
echo $john ->name . "<br>"; //Output John

// calling methods
echo $john ->greet(). "<br>";
echo $jane ->haveBirthday() . "<br>";

// Checking instance type
if ($john instanceof Person){
    echo "John is a Person object <br>";
}

/**
 * Things to understand about classes and objects:
 * -Classes define structure and behavior
 * -Objects are specific instances with their own property values
 * -The $this keyword refers to the current object instance
 * -Methods are functions that belong to a class 
 * -The constructor is a special method called when creating objects
 */