<?php
// Static Properties and methods
// Static members belong to the class itself not any specific instance.

class MathHelper{
    // static property - shared across all instances
    public static $pi = 3.14159;

    // Static counter to track instances
    private static $instanceCount = 0;

    public function __construct(){
        // increment counter when a new object is created
        self::$instanceCount++;
    }

    // Static method - can be called without creating an object
    public static function square($number){
        return $number *$number;
    }

    // Static method using static property
    public static function circleArea($radius){
        return self::$pi *self::square($radius);
    }

    // Static method to access private static property
    public static function getInstanceCount(){
        return self::$instanceCount;
    }
    // non static method
    public function displayInfo(){
        // Accessing 
        return "pi value:" . self::$pi;
    }
}
echo MathHelper::$pi . "<br>"; //Access static property directly
echo MathHelper::square(4) . "<br>"; //Output :16
echo MathHelper::circleArea(5) . "<br>"; //Output :78.53975

// Create Instances
$helper1 = new MathHelper();
$helper2 = new MathHelper();
$helper3 = new MathHelper();


echo MathHelper::getInstanceCount() ."<br>"; //Output 3

// Static with inheritance
class AdvancedMathhelper extends MathHelper{
    // Override static property (cretes) a new one does not change parents

    public static $pi = 3.1415965359;

    public static function cubeVolume($side){
        return self::square($side) * $side;
    }

    // Use parent's static method
    public static function displayParentPi(){
        return parent::$pi;
    }
}

echo AdvancedMathhelper::$pi . "<br>"; //Output 3.1415965359
echo AdvancedMathhelper::cubeVolume(3). "<br>";  //Output 27
echo AdvancedMathhelper::displayParentPi(). "<br>"; //Output 3.14159