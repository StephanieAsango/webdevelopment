<?php

// Databases are the backbone of most web applications, allowing you to store, retrieve and manipulate data efficiently.
// Let's explre how php interacts with MySQL, one of the most popular database systems.

// 1. Database Connection
// The first step in working with databases is establishing a connection. PHP offeres multiple ways to connect to MYSQL databases.

// Using MySQLi (MySQLImproved)
// Basic database connection with MySQLi (procedural style)

$host ="localhost";
$username ="root";
$password ="";
$database ="sample_db";

// Create a connection
// $conn = mysqli_connect($host, $username, $password, $database);

// // Check connection
// if (!$conn){
//     die("Connection failed: " . mysqli_connect_error());
// }
// echo "conected successfully!";

// Object-oriented style with MySQLi
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_errno){
    die("Connection failed: " . $mysqli->connect_error);
}

echo "conected successfully!";

// When done
$mysqli->close();

// Tommorow
// Using PDO (PHP Data Objects)
