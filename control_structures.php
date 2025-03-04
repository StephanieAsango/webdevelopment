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

$grade = 85;

if($grade >= 90){
    // First condition executes -executes if grade is 90 or above
    echo "A - Execellent! <br>";
}else if($grade >= 80){
    // Second condition executes -only checked if first condition is false
    // executes if grade is between 80-89
    echo "B -Good Job! <br>";
}elseif($grade >= 70){
    // Third condition - only checked if all previous conditions are false
    echo "C - satisfactory <br> !";
}else if($grade >= 60){
    // Third condition - only checked if all previous conditions are false
    echo "D- You passed, but you can do better! <br>";
}else{
    // Default case - only checked if all previous conditions are false
    // In this case grade is below 60
    echo "F - You need to improve! <br>";
}

/**
 * Important notes
 * -Conditions are evaluated from top to bottom
 * -Once a condition is true, it's code block executes and PHP skips all remaining conditions
 * -The else block is optional and provides a default case
 * -You can have as many elseif blocks as needed
 */

// Nested if statements- Placing if statements inside other if statements
$isLoggedIn = false; 
$isAdmin = true;

if ($isLoggedIn){
    // Outer condition - checks if user is logged in
    echo "Welcome back! <br>";

    if ($isAdmin){
        // Inner condition - only checks if outer condition is true
        // Checks if the logged-in user is an admin
        echo "You have adminstrator priviledges. <br>";
    }else{
        // Executes if user is logged in but not an admin
        echo "You have user priviledges. <br>";
    }
}else{
    // Executes if user is not logged in
    echo "Please log in to continue. <br>";
}

// 1.2 Switch statement
// The switch statement provides an elegant way to compare a variable against many diffrent values.

// Switch syntax
// switch (expression){
//     case value:
//         code;
//         break;
//     default:
//         code;
// }

$dayOfWeek = date("l"); //Gets the current day name(eg.Monday)
// echo $dayOfWeek

switch($dayOfWeek){
    case "Monday":
        // executes if $dayOfWeek is "Monday" (loose comparison)
        echo "Its the start of the week . <br>";
        break; //The break statement prevents a fall-through to the next case
    case "Tuesday":
    case "Wednesday":
    case "Thursday":
        // Multiple statements without break statements will fall through
        // These executes if $dayOfWeek is any of these three values 
        echo "Its a midweek day. <br>";
        break;
    case "Saturday":
    case "Sunday":
        echo "it is a weekend . <br>";
    default:
        //Optional defaul that executes if no case matches
        echo "invalid day of the week. <br>";
        // No break is neede indefault case (It's the last one) 
}
/**
 * Important notes:
 * -Switch uses loose comparison (==) not strict comparison (==)
 * -Without break, execute falls through to the next case
 * -The default case is optional
 * -Switch is often cleaner than multiple elseif statements when compairing aa value
 */

// 1.3 Ternary Operator
// A shorthand way to write simple if-elseif statements
// syntax
// Condition ? value_if_true : value_if_false
$age = 20;

// Compact way to assign a value based on a condition
$status = ($age>= 18) ? "adult":"minor";
echo "you are $status <br>";

// Equivalent if statement
// if ($age>= 18){
//     $status = "adult";
// }else {
//     $status ="minor";
// }
// Nested ternary operators (can be hard to read use with caution)  

$score = 75;
$grade = ($score >= 90)? "A":
        (($score >= 80)? "B":
        (($score >= 70)? "C":"F"));

echo "Your grade: $grade <br>";

/**
 * Tips for ternary operators 
 * -Best for simple conditions
 * -Use parenthesis for clarity
 * -Avoid deep nesting - it makes code harder to read
 * - Din't use for complex logic  - use if/else instead
 */

//  2.Loops
// Loops allow you to execute code repeatedly based on certain conditions making repetitive tasks more efficient.

// 2.1 While loops
// Executes code as long as the specified condition is true
// Syntax:
//  While( condition ){
//      code to execute
// }

$counter = 0;

while ($counter <= 10){
    // This code repeats as long as the condition is true
    echo "Count : $counter <br>";
    $counter ++ ; //Increment counter  - CRUCIAL to avoid infinite loops
}
/**
 * Important notes
 * -The condition is evaluated before each iteration 
 * -If the condition is false
 * - Always ensure the loop condition will eventually be false
 * -be careful to avoid infinite loops (when condition never becomes false)
 */

//Example: Using while to process data until a condition is met
$done = false;

while(!$done){
    //Simulate some condition that might change $done to true
    $radomnumber = rand(1, 10);
    if ($radomnumber> 8){
        echo "Found a number grater than 8: $radomnumber <br>";
        $done = True; //This will exit the loop
    } else {
        echo "Still looking ... Got:$radomnumber <br>";
    }
}

// Example : Reading data from a file until end-of-file
$file = fopen("data.txt", "r");
while (!feof($file)){
    // Processeach line until end of a file is reached
    $line =fgets($file);
    echo $line. "<br>";
}
fclose($file);

// Alternative syntax (for templates)
while ($condition ):
    // Code to execute
endwhile;


// 2.2 Do -While loop
// Similar to while but gurantees that the executes at least once because the condition is checked after the execution.
// Syntax:
// do {
//     // Code to execute
// }while (condition);

$counter = 1;

do {
    // The code block executes first , then the condition is checked
    echo "Count: $counter<br>";
    $counter ++;
}while ($counter <5);

/**
 * Key diffrences from while loop:
 * -Code always executes atleast once , even if the condition is initially false
 * - Condition is checked at the end of each iteration
 * -Appropriate when you need to process something atleast once
 */

//  Example : Validating user input

// do {
//     $input = getInput() ; //Assume this function gets user input
//     $valid = validateInput($input); //Assume this validates the input

//     if (!$valid){
//         echo "Invalid input, please try again.";
//     }
// }while (!$valid); //Keep asking until valid input is 

// Example where loop executes despite condition being false
$number = 10;

do {
    echo "This runs once even though the condition is false";
}while ($counter <5);

// 2.3   For loop
// Used when you know the number of iterations in advance
// Syntax
// for (initialization; condition; increment/decrement){
//     code to execute
// }

// 1.initialization - runs once at the beggining
// 2.condition - checked before each iteration
// 3.increment/ decrement - runs after each iteration

for($i = 1; $i<=5; $i++){
    echo "iteration: $i <br>";
}

/**
 * How the for loop works
 * 1.initialization $i=1
 * 2.check if $i <= (true)
 * 3.Execute the loop body
 * 4.Increment $i ($i becomes 2)
 * 5.Check if $i <=5 (true)
 * 6. Execute the loop body
 * ... and so on until $i becomes 6 and condition becomes false
 */

// Ommiting parts of a for loop
$i = 0;
for (; $i <5;){
    echo $i. "<br>";
    $i++;
}

// Using for loops with arrays
$fruits =["apple", "banana", "orange","grape" ,"mango"];
$fruitcount = count($fruits);

for ($i = 0; $i < $fruitcount; $i++){
    echo "Fruit at index $i:".$fruits[$i] ."<br>";
}


// Alternative syntax(for template)
for ($i =1; $i< 10; $i++):
    // code
endfor;

/**
 * When to use for loops :
 * -When you know the exact number of iterations in advance
 * -When working with array indices
 * -For mathematical sequences
 * -When you need a counter variable
 */

//  2.4 Foreach loop
// Specifically designed for iterating through arrays and objects

// syntax
// foreach (array-expression as $value){
//      code
// }

// basic foreach on indexed array

$colors = ["red" ,"green" ,"blue"];

foreach($colors as $color){
    // Colors take the value of each array element in sequence
    echo "Color: $color<br>";
}

/**
 * How it works:
 * 1. First iteration: $color = "red"
 * 2. second iteration: $color = "green"
 * 3. Third iteration: $color = "blue"
 */

//  Foreach with key => value on associate array
$person =[
    "name"=>"John",
    "age"=>30,
    "city"=> "Newyork"
];

foreach($person as $key => $value){
    // $key contains the array key (e.g,"name", "age")
    // $value contains the corresponding value( e.g "john", 30)
    echo "$key:$value<br>";
}

// Iterating over nested arrays
$users = [
    ["name"=> "Alice", "email"=>"alice@example.com"],
    ["name"=> "Bob","email" => "bob@example.com"]
];

foreach ($users as $user){
    echo "Name: ". $user["name"] . ", Email: " . $user["email"] . "<br>";
}

// Alternative syntax 
foreach($array as $value):
    // code
endforeach;

/**
 * Advantages of foreach
 * - No need to initialize counters or check array bounds
 * - Works with any array type (indexed, associative, multidimensional)
 * More readable and less prone to errors
 * - Automatically handles the correct number of iterations
 */

//  Loop Control Statements
//  Staements that change normal flow of loops
// break -> exits the loop immediatley

for ($i = 1; $i <= 10; $i++){
    if ($i == 5){
        echo "Breaking at $i <br>";
        break;  //Immediatley exits the loop when $i equals to 5
    }
    echo "Iteration : $i <br>";
}
// After the break , execution continues with the code after the loop

//Continue statement - skips the rest of the current iteration

for ($i = 1; $i <= 10; $i++){
    if ($i % 2 == 0){
        continue; //Skip even numbers
    }
    echo "Odd number : $i <br>";
}

// After the continue, the loop jumps to the next iteartion

/**
 * best practices:
 * - Use break when you've found what what you are looking for or met a termination condition
 * -Use continue to skip iterations that don't meet certain criteria
 * - Avoid exxecive use of break and continue as they can make code harder to follow
 */


 //3. Include and require statements
//  These  statements allow you to include code from other files , promoting code reuse and organization

//Include - includes and evaluates the specified file
include 'header.php';
// if file does not exist include produces a warning but script continues

//  Include_once - includes the file only once
include_once 'functions.php';
// if the file was alredy included once it won't be included again
//Useful for functions or class definitions to avoid redeclaration errors

//Require - similar to include but produces a fatal error if the file doesn'texist
require 'config.php';
// Script will stop if file not found - used when file is absolutely necessary

// require_once - reqiures the file only once
require_once 'database.php';
// Fatal error if not found, includes only once
// most comonly used for critical class definitions


/**
 * When to use each:
 * - Use required when the file is critical to the application
 * - Use include when the file is optional
 * - Use _once versions when the file contains functions or classes to prevent redifination errors
 * 
 * Paths
 * -Relative paths are relative to the currentscript
 * - Absolute paths start from the file system root
 * - you can use variables in path : includes $file_path
 */

//  Example of a common directory structures and includes
require_once 'config/database.php'; //Database configuration
require_once 'includes/functions.php'; //Helper functions
include 'templates/header.php';       //Site header(HTML)

//content goes here

include 'templates/foote.php';

//Tomorrow ->functions
?>