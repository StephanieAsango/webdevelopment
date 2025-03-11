<?php

// Abstraction and interfaces
// /Abstraction allows you to define what classes must do without specifying how they do it



// Abstract class -cannot be insantiated
abstract class Shape{
    protected $color;

    public function __construct($color){
        $this->color;
    }

    // Regular method fully implemented
    public function getColor(){
        return $this->color;
    }

    // Abstract method - must be implemented by the child class
    abstract public function calculateArea();

    // Abstract method with parameters
    abstract public function draw($canvas);

}

class Circle extends Shape{
    private $radius;

    public function __construct($color, $radius){
        parent ::__construct($color);
        $this ->radius = $radius;
    }

    // Implementation of abstract method
    public function calculateArea(){
        return pi() * $this->radius * $this->radius;
    }

    // Implementation of absract method with parameters
    public function draw($canvas){
        return "Drawing a {$this->color} circle with radius {$this->radius} on {$this->radius}";
    }
}

class Rectangle extends Shape{
    private $width;
    private $height;

    public function __construct($color, $width, $height){
        parent::__construct($color);
        $this ->width = $width;
        $this ->height = $height;
    }

    public function calculateArea(){
        return  $this->width * $this->height;
    }

    public function draw($canvas){
        return "Drawing a {$this->color} rectangle  {$this->height} X {$this->width} on {$canvas}";
    }

}

// Using the classes
// $shape = new Shape("red"); error can not instantiate an abstarct class

$circle = new Circle("blue", 5);
echo $circle->calculateArea() . "<br>"; //Output 78.53
echo $circle->draw("HTML5 Canvas")  . "<br>";

$rectangle = new rectangle("red", 7, 6);
echo $rectangle->calculateArea()  . "<br>"; //Output 42
echo $rectangle->draw("HTML5 Canvas") ."<br>";

// Interface - defines a contract that classes must fullfill 
interface Loggable{
    // Interface methods are abstract by default
    public function logInfo();
    public function getLogType();
    
}

// Interface for printable objects
interface Printable {
    public function printOutput();
}

// Class implementing multiple interfaces
Class  User implements Loggable, Printable{
    private $username;
    private $email;

    public function __construct($username, $email){
        $this->username = $username;
        $this->email = $email;
    }

    // Implementig Loggable interface methods
    public function logInfo(){
        return "User: {$this->username}, Email:{$this->email}";
    }
    public function getLogType(){
        return "USER_LOG";
    }

    // Implementing Printable interace method
    public function printOutput(){
        return "Username : {$this->username}\n Email:{$this->email}";
    }
}

$user = new User("John Doe","John@example.com");
echo $user->logInfo() . "<br>";
echo $user->getLogType() . "<br>";
echo $user->printOutput()  . "<br>";

/**
 * Key concepts 
 * Abstract classes can have both abstract and concrete methods
 * Abstrat methods must be implemented by child classes
 * classes can implement multiple interfaces unlike (inheritance)
 * Interfaces contain only method declarations no implementations
 * Interfaces create a "contract implementing classes must fulfill
 *  
 */ 