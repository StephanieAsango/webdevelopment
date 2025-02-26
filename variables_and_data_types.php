<?php

// Variables in PHP are containers for storing data.
// They always start with a $symbol

// PHP is loosely typed, meaning variables can hold diffrent types of data
// The type is determined by the value assigned

// Strings - text enclosed in quotes
$name="John Doe"; //Variables quotes allow interpolation
$name='John Doe'; //Single quotes treat everything as literal text

// 2. Integer - Whole number
$age=25;  //numbers with decimal points

//3. Floats - numbers with decimal points
$height=1.85;  //Uses dot for decimal points

// 4.Boolean -true/false values
$is_student = true;

//5. Null -reperesents a variable with no value
$empty_variable = null;

// Array - ordered collection of values
$fruits = ["apple", "banana", "orange"];

//Checking variable types
// var_dump() - Outputs type and value
// gettype() - Outputs just the type
echo var_dump($empty_variable) . "<br>";
echo gettype($empty_variable) . "<br>";
echo gettype($fruits) . "<br>";
echo gettype($name) . "<br>";
echo gettype($height) . "<br>";
echo gettype($is_student) . "<br>";
echo gettype($age) . "<br>";

// Type casting - converting between types
$String_number = "42";
$actual_number =(int)$String_number;

echo gettype($String_number) . "<br>";
echo gettype($actual_number) . "<br>";

// Constants - Values that cannot be changed
define("MAX_USERS", 100); // Using define() function
const MIN_AGE = 18; //Using const keyword

echo MAX_USERS . "<br>";
echo MIN_AGE . "<br>";

//Variable interpolation in strings
$name = "Stephanie Asango";
echo "My name is $name . <br>"; 
echo 'My name is ' . $name . '.';//String concatenation with dot operator

// Next - PHP Operators (Operators.php)

?>