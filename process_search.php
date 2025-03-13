<?php

// Handling Get requests
// Process_search.php?query=php&category=tuorials
if($_SERVER['REQUEST_METHOD'] =='GET'){
    $searchQuery = $_GET["query"] ??"";
    $category = $_GET["category"] ??"";

    echo "Searching for '$searchQuery' in category '$category' <br>";
}