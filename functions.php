<?php

// PHP functions
// Functions are re-usable blocks of code that perform specific tasks.They help organize your code, reduce repetition and make your programs more modular and maintainable.

// 1.Basic functions definitions
// 2. Syntax
// function function_name(){
//     code to execute;
// }

function sayHello(){
    echo "Hello, World!<br>";
}

// Calling (invoking) a function
sayHello();

// Functions with parameters
// Parameters allow you to pass data into functions
function greet($name){
    echo "Hello,$name<br>";
}

// Calling with argument
greet("John");
greet("Mary");

// Function with return value
// The return statement ends the function and sends a value back
function add($a, $b){
    $result = $a +$b;
    return $result; //Function execution stops here
    echo "This will never execute"; //Unreachable
}

// capturing the return value 
$sum = add(3, 4);
echo "The sum is :$sum<br>";

$sum = add(5, 6);
echo "The sum is :$sum<br>";

// Early returns for conditional logic
function checkAge($age){
    if ($age <= 0){
        return "Invalid age<br>";
    }

    if ($age < 18){
        return "minor<br>";
    }else{
        return "adult<br>";
    }
}
$age = checkAge(20);
echo "Your are an $age ";
echo checkAge(0);

$myage = -17;
$invalidage = checkAge($myage);
echo "$myage is $invalidage";


// Create a function that takes two integers and returns the power of the first integer raised to the second integer

function power($base, $exponent){
    $power = $base ** $exponent;
    return $power;
}
$x = 4;
$y = 4;
echo "The power of $x raised to $y is:" . power($x, $y) . "<br>";

// 2.Function parameters
// Required parameters
function multiply($a, $b){
    return $a * $b;
}
// multiply() retuens error - missing required parameters

// Optional parameters
function powerOfNumbers($base, $exponent=2){
    return $base ** $exponent;
}

echo powerOfNumbers(4). "<br>"; // 16 (4^2) - uses default exponent
echo powerOfNumbers(2, 3). "<br>"; //8 (2^3) overrides default argument

// Named arguments (PHP 8.0+)
// Allows specifying arguments by name, improving readability

function createUser($name, $email, $role='user', $active= true){
    // Function body
}

// using named arguments
createUser(
    name:"John Doe",
    email:"john@example.com",
    active:false
    // Role ommited will use default
);

// Type declarations
// Ensures parameters are of the specified type
function divide(float $a,float $b):float{
    if ($b == 0){
        throw new Exeption("Division by zero");
    }
    return $a / $b;
}

// Nullable Types (PHP 8.0+)
// Allows parameter to be null
function findUser(?int $id): ?array{
    if ($id == null){
        return null;
    }
    // code to find user
}

// variable -length arguments lists 
// The ...operators (splat,rest operator) allows accepting any number of arguments
function sum(...$numbers){
    $total = 0;
    foreach($numbers as $number){
        $total += $number;
    }
    return $total;
}

$sum = sum(1, 2, 3, 4, 5) ; //15
echo "The sum is $sum <br>";

// Passing arrays as arguments
function calculateAverage(array $numbers){
    $total = array_sum($numbers);
    $count = count($numbers);
    return $count >0 ? $total / $count : 0 ;
}

$scores = [85, 92,78, 95, 88];
$average =calculateAverage($scores); //Outputs 87.6
echo "The average is $average";

// Next - arrays
?>