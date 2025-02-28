<?php

// Control structures in PHP
//   Control structures determine the flow of executuion in your code based on diffrent conditions and logic. Theyre the foundation of programming logic that allow your scripts to make decisions and repeat operations.

// 1. Conditional statements
// Conditional statements execute diffrent code blocks based on whether certain conditions are true or false

// 1.1 if, else and elseif
// The most fundamental way to make decisions in your code:
// BASIC if statement 
// Syntax
// if (condition){
//     code to execute if condition is true 
// }
$age = 20;
if ($age >= 18){
     //code to executes if condition is true 
    echo "You are an adult .<br>";
}
//  if - else statement
// Syntax
// if (condition){
//     code to execute if condition is true 
// } else{
// code to execute if condition is false
// }

$tempreture = 30;

if ($tempreture > 30){
    //code to executes if condition is true 
    echo "It's hot outside .<br>";
}else{
    //code to executes if condition is false
    echo "It's not hot outside .<br>";
}

// If-elseif-else statement for multiple conditions.
// Allows checking multiple conditions in sequence
?>