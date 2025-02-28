<?php
// PHP Operators

// Operators in PHP allow you to perform operations on variable sand values. They are fundamental building blocks for creating expressions that manipulate data in your programs.

// 1. Arithmetic Operators
// These operators perform basic mathematical operations

echo "<b>1. Arithmetic operators</b><br>";
// Addition (+)
// The addition operator adds two values together
$sum = 10+5; //Result will be 15
echo "Sum : $sum <br>";

// Subtraction (-)
// The subtraction operation subtracts the right operands from the left operand
$diffrence = 10-5; //Result will be 5
echo "diffrence : $diffrence <br>";

// Multiplication(*)
// Multiplies two values
$product = 10*5; //Result will be 50
echo "product : $product<br>";

// Division (/)
// divides the left operand by the right operand
// Note division by zero will cause a fatal error
$quotient = 10/5; //Result will be 2
echo "Quotient : $quotient <br>";

// Modulus (%)
// The modulus operator returns the remainder of a division
// 10 divided by 3 equals 3 with a remainder of 1
$remainder = 10 %3; //Result will be 1
echo "remainder : $remainder <br>";

// Exponentiation(**)
// Raises the left operand to the power of the right operand 
// 2 raised to the power of 3 is 8
$power = 2**3; //Result will be 8
echo "power : $power <br>";

// Integer Division (intdiv())
// Returns the integer quotient of the division 
// 10 divided by 3 gives 3 (truncates the decimal part)
$intDivision = intdiv(10, 3); //Result will be 3
echo "Integer Division:$intDivision <br>";

// Tomorrow - Assignment operators
echo "<b>2. Assignment operators</b><br>";
// These operators assign values to variables
// Basic assignment(=)
$x = 10;  //Assign 10 to x

// Combined assignment operators
$x = 10;
echo "x = $x <br>";

$x += 5; //Equivalent to: $x =$x + 5; result:15
echo "x += 5 is $x <br>";

$x -= 3; //Equivalent to: $x =$x -3; result:12
echo "x -= 3 is $x <br>";

$x *= 2; //Equivalent to: $x =$x *2; result:24 
echo "x *= 2 is $x <br>";

$x /= 4; //Equivalent to: $x =$x /4 ; result:6 
echo "x /= 4 is $x <br>"; 

$x %= 4; //Equivalent to: $x =$x %4 ; result:2 
echo "x %= 4 is$x <br>";

$x **=3; //Equivalent to: $x =$x **4 ; result:8
echo "x **=3  is$x <br>";


//  Combined assignment operators perform an operation and assignment in one step

// Comparison Operators 
echo " <b>3. Comparison Operators</b><br>";
// These operators compare two values and return a boolean result (true or false)

// Equal(==)
echo var_dump(5==5) . "<br>"; //bool(true)
echo var_dump(5=="5"). "<br>"; //bool(true)  values are equal after type juggling

// Identical (===)
echo var_dump(5===5). "<br>"; //bool(true)
echo var_dump(5==="5"). "<br>"; //bool(false) checks both the value and the datatype diffrent values

// Not equal (!= or <>)
echo var_dump(5!=5). "<br>"; //bool(false)
echo var_dump(5<>5). "<br>"; //bool(false) alternative syntax

// Not identical (!==)
echo var_dump(5!=="5"). "<br>"; //bool(true)

// Greater than (>)
echo var_dump(10>5). "<br>"; //bool(true)

// Less than(>)
echo var_dump(5<10). "<br>"; //bool(true)

// Greater than or equal to(>=)
echo var_dump(10>=10). "<br>"; //bool(true)

// Less than or equal to (<=)
echo var_dump(5<=5). "<br>"; //bool(true)

// Logical operations
echo " <b>3. Logical Operators</b><br>";
// These operators perform logical operations on boolean values  - AND, OR, NOT, XOR

// 1. AND (&&, and) - all operands must be true to have a true result
echo " <b><i>3(i) Logical AND (&&, and)</b></i><br>";
echo var_dump(true && true) ; //bool(true)
echo var_dump(true && false); //bool(false)
echo var_dump(false && true); //bool(false)
echo var_dump(false && false); //bool(false)

// 2. OR (|| , or) - atleast one of the operand must be true
echo " <br><b><i>3(i) Logical OR (||, or)</b></i><br>";

echo var_dump(true || true) ; //bool(true)
echo var_dump(true or false) ; //bool(true)
echo var_dump(false || true) ; //bool(true)
echo var_dump(false or false) ; //bool(false)

// 3. NOT (!, not) - reverse a condition
echo " <br><b><i>3(i) Logical NOT (!, not)</b></i><br>";
var_dump(!true); //bool(false)
var_dump(!true); //bool(true)
// var_dump(not true);

// 2. XOR (xor) - exclusive OR, true if one is true, but not both
echo " <br><b><i>3(i) Exclusive OR (!, not)</b></i><br>";
var_dump(true xor false); //bool(true)
var_dump(true xor true); //bool(false)

// Tommorow -String operations
// String operations
// Operators for working with strings
// Concatenation(.)
$firstName = "Stephanie";
$lastName = "Asango";
$fullname= "<br>" . $firstName ." ".  $lastName . "<br>";
echo $fullname; //Stephanie Asango

// Concatenaton assignment(=.)
$text = "Hello";
$text .= " World!"; //$text now conatins hello World
$text .=" !";// Text now contains hello world
echo $text . "<br>";

// Array Operators
// Operators for working with arrays 
// Union (+)
$array1 = ["a" => "apple", "b" =>"banana"];
$array2 = ["b" =>"blueberry", "c"=> "cherry"];
$result = $array1 + $array2;
var_dump( $result);
// Result; ["a" => "apple", "b" =>"banana", "c"=> "cherry"]
// Note ; if keys exist in both arrays, the first array's value are kept
echo "<br>";
// Equality(==)
$array1 =[1, 2, 3];
$array2 =[1, 2, 3];
var_dump($array1 == $array2);// bool(true)

echo "<br>";
// Identity (===)
$array1 =[1, 2, 3];
$array2 =["1", "2", "3"];
var_dump($array1 === $array2);// bool(false) diffrent types

echo "<br>";
// Inequality(!=, <>)
var_dump($array1 == $array2);// bool(true)

echo "<br>";
// Non-Identity (!==)
var_dump($array1 !== $array2);

echo "<br>";
// Increment decrement operators

// These operators increase or decrease variables by one
// Pre-increment(++$x)
$x = 5;
$y = ++$x; // $x will be incremented to 6 then added to $y  
// $x is 6 and $y is 6

echo $x."<br>";
echo $y."<br>";

// post increment ($x++)
$x = 5;
$y = $x++; // $x is assigned to $y then incremented to 6
// $x is 6 while $y is 5
echo $x."<br>";
echo $y."<br>";

// Predecrement (--$x)
$x = 5;
$y = --$x;// $x will be decremented to 4 then assigned to $y
// $x is 4 while $y is 4
echo $x."<br>";
echo $y."<br>";

// post decrement
$x = 5;
$y = $x--; // $x is assigned to $y then decremented to 6
// $x is 4 while $y is 5
echo $x."<br>";
echo $y."<br>";

// Special operators 
// PHP includes some special operators for specific purposes

// Ternary operators (?:)
$age = 20;
$status = ($age >= 18 ?"adult" :"minor");
// If condition is true , first value is returned ; otherwise second value is returned

echo $status ." <br>";

// Operator precedence
// Like in mathematics, PHP operators have a specific order of precedence
// Example showing precedencd
$result= 5 +3 *2 ; //Result is 11 not 16
echo $result . "<br>";

// Using parenthesis to overide precedence 
$result=( 5 +3 )*2 ; //Result is 16
// Parenthesis have the highest precedence
echo $result . "<br>";

// precedence can cause unexpected behaviour
$a = 3;
$b = 5;
if ($a = $b) {//Assigns $b to $athen evaluates to 5(truthy)
    echo "This will always execute";
}

// The correct comparison would be : if ($a == $b) 
// Operators are powerful tools in PHP that let you manipulate variables and perform calculations efficiently. Understanding hoe they work and their precedence is essential for writing correct and effective  PHP code

// Next  Control Structures in PHP ->control_structures.php

?>