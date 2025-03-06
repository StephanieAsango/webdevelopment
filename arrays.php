<?php

// Arrays in PHP

// Arrays are one of the most versatile and powerful data structures in PHP
// They allow you to store multiple values in a single variable and are essential for many programming tasks.
// Let's explore them in detail.

// 1.Type of arrays in PHP
// PHP supports three main types of arrays

// 1. Indexed arrays(Numeric arrays)
// Arrays with numeric keys, typically starting from zero

$friuts = ["apple", "banana", "orange"];
echo $friuts[0] . "<br>"; //apple


// Creating indexed arrays
$colors = ["red", "green", "blue"]; //Short array syntax
$numbers = array(1, 2, 3, 4, 5);  //Traditional array syntax

// Adding elements to indexed arrays
$colors[] = "yellow";  //Adds to the end of the array
array_push($colors, "purple", "pink"); //Adds multiple elements to the end of the array

// 2.Associative arrays 
$person = [
    "name" => "John",
    "age" => 30,
    "city" => "New york"
];

echo $person["name"] . "<br>"; //Outputs John 

// Creating associative arrays 
$user = [
    "id" => 1,
    "username" =>"johndoe",
];

$settings = array(
    "theme" => "dark",
    "notification" => true,
    "language" => "en"
);

// Adding elements to associative arrays
$user["role"] = "admin";

// 3,. Multidimensional Arrays
// Array containing other arrays

$matrix =[
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

echo $matrix[1][2] . "<br>";

$users = [
    "John"=>[
        "age"=> 30,
        "email" =>"john@example.com",
        "roles"=>"admin", "editor"
    ],
    "Jane"=> [
        "age" =>25,
        "email" =>"jane@example.com",
        "roles" =>["author"]
    ],
];
// Output john@example.com
echo $users["John"]["email"] . "<br>";

// Outputs author
echo $users["Jane"]["roles"] [0]. "<br>";

// 2.Array manipulations
// Creating and modofying arrays
$friuts = ["apple", "banana", "orange"];

// Adding elements
$friuts[] ="grapes"; //Add to the end
array_push($friuts, "mango","kiwi"); //Add multiple to the end

//Removing elements
$last = array_pop($friuts); //Remove and return the last element
$first = array_shift($friuts); //Remove and return the first element
unset($friuts[1]); //Removes specfic element

// Slicing arrays
$slice = array_slice($friuts, 1, 2); //Extract portion (offset , length)

echo $last . "<br>";
echo $first . "<br>";
// var_dump (echo $friuts . "<br>");

// Splicing arrays(modifies original)
array_splice($friuts, 1, 2, ["pineapple", "melon"]);

// Merging arrays
$more_fruits = ["strawberry", "raspberry"];
$all_fruits = array_merge($friuts, $more_fruits);

// Combining arrays
$keys = ["a", "b", "c"];
$values = [1, 2, 3];
$combine = array_combine($keys, $values);

echo  var_dump($all_fruits) . "<br>";
echo  var_dump($slice) . "<br>";

// Checking array elements
$has_apple = in_array("apple", $friuts); //Check if value exists
$key = array_search("banana", $friuts); //Find key of value
$exists = isset($friuts[0]); //Check if index exists

// Extracting keys and values
$keys = array_keys($person); //get all keys
$values = array_values($person); //get all values

echo  var_dump($keys) . "<br>";
echo  var_dump($values) . "<br>";

$friuts = ["apple", "banana", "orange"];
$numbers = ["orange", "apple","banana", "grape"];
$scores =["John" => 85, "Alice"=>92, "Bob"=>78];

// Sorting indexed arrays
sort($numbers); //Sort in ascending order modify original array
// $number is now  [1, 2, 3, 4, 5]
echo  var_dump($numbers) . "<br>";

rsort($friuts); //Sort in descending orders
// fruits is now ["orange","grape", "banana","apple"]
echo  var_dump($friuts) . "<br>";

// Sorting associative arrays
asort($scores); //Sort by value maintain key association
//Score is now ["bob"=78,"john"=85,"alice"= 92]
echo  var_dump($scores) . "<br>";

arsort($scores);//Sort by value sin descending order
//Score is now ["alice"= 92,"john"=85,"bob"=78]
echo  var_dump($scores) . "<br>";

ksort($scores); //Sort by keys in ascending order
//$scores is now ["alice"= 92,"bob"=78,"john"=85]
echo  var_dump($scores) . "<br>";

krsort($scores);//Sort by keys in ascending order
//$scores is now =["John" => 85, "Bob"=>78, "Alice"=>92];
echo  var_dump($scores) . "<br>";

// Natural Order sorting (for human-readable strings)
$files =["img1.jpg","img10.jpg","img2.jpg"];
sort($files);// Natural sort ["img1.jpg","img10.jpg","img2.jpg"]; 
natsort($files); //Standard  ["img1.jpg","img2.jpg","img10.jpg"];

// Shuffle array elements randomly
shuffle($numbers);

// Tommorow
// 4. Array iterations
// 5.Array Operations
// 6. Array Functions

// OOP