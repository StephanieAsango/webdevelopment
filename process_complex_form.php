<?php
// Get vs POST methods

/**
 * GET Method:
 * -Data is appended to the URL as query parameters 
 * -Limited amount of data can be sent(URL lenght restriction)
 * -Data is visible in the URL (not secure for sensitive information)
 * -Good for simple data retreival, searching , filtering
 * 
 * POST method:
 * -Data is sent in the HTTP request body
 * -Can send much larger amounts of data
 * -Data is more visible in the URL(more secure)
 * -Required fo file uploads
 * -Used for operations that change data
 */

// Processing diffrent form input types


if ($_SERVER['REQUEST_METHOD']=="POST"){
    // Text input
    $username = $_POST['username'] ?? "";

    // Password (never eco passwords in real application)
    $password = $_POST['password'] ?? "";

    // checkbox(will be set only if checked)
    $subscribe = isset($_POST['subscribe']) ?true :false;

    // Radio Button
    $gender = $_POST['gender'] ?? ""; //will contain the selected

    // Select dropdown
    $country = $_POST['country'] ; 

    // multi select
    $interests = $_POST['interests'] ?? []; 

    // Hidden field
    $formId = $_POST["form_id"] ?? "";

    // Display some results for demonstartion
    echo "Username: $username<br>";
    echo "Subscribed:" . ($subscribe ? "Yes" :"No") . "<br>";
    echo "Gender: $gender<br>";
    echo "Country: $country<br>";
    echo "Interests: " . implode(", ", $interests) . "<br>";
    echo "Form ID: $formId<br>";

}


?>