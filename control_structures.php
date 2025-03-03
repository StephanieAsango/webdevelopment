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
?>