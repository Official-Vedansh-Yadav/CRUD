<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "crud";

$conn = mysqli_connect($server,$user,$password,$database);

// Showing Error if connection was not successful
if (!$conn) {
    header("location: /CRUD/create/_create_database.php");
} 

?>