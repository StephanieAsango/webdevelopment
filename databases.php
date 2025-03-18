<?php

// Databases are the backbone of most web applications, allowing you to store, retrieve and manipulate data efficiently.
// Let's explre how php interacts with MySQL, one of the most popular database systems.

// 1. Database Connection
// The first step in working with databases is establishing a connection. PHP offeres multiple ways to connect to MYSQL databases.

// Using MySQLi (MySQLImproved)
// Basic database connection with MySQLi (procedural style)

// $host ="localhost";
// $username ="root";
// $password ="";
// $database ="sample_db";

// Create a connection
// $conn = mysqli_connect($host, $username, $password, $database);

// // Check connection
// if (!$conn){
//     die("Connection failed: " . mysqli_connect_error());
// }
// echo "conected successfully!";

// // Object-oriented style with MySQLi
// $mysqli = new mysqli($host, $username, $password, $database);

// // Check connection
// if ($mysqli->connect_errno){
//     die("Connection failed: " . $mysqli->connect_error);
// }

// echo "conected successfully!";

// // When done
// $mysqli->close();

// Tommorow
// Using PDO (PHP Data Objects)
// PDO provides a consistent interface with multiple database systems, not like MYSQL

// Database connectionn with PDO

$host ="localhost";
$username ="root";
$password ="";
$database ="my_application";
$charset = "utf8mb4";// Use proper character encoding

try {
    //Create a connection string
    $dsn ="mysql:host=$host;dbname=$database;charset=$charset";

    // Connection options
    $options = [ 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Throw exception errors
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //return associative arrays by default
        PDO::ATTR_EMULATE_PREPARES => false, //use real prepared statements
    ];

    // Create PDO instance
    $pdo = new PDO($dsn, $username, $password, $options);

    echo "Connected succesfully!";
} catch (PDOException $e) {
    //Handle connection errors
    die("Connection failed: " . $e->getMessage());
}
