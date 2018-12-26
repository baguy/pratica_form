<?php
    $host = "localhost";
    $userName = "";
    $password = "";
    $dbName = "pratica_form_db";

    // Create database connection
    $conn = new mysqli($host, $userName, $password, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
