<?php
// Production
$servername = "localhost";
$username = "u579024239_tnj";
$database = "u579024239_tnj";
$password = 'A$w172h%4H';

// Development
// $servername = "localhost";
// $username = "root";
// $database = "toysnjoy";
// $password = "";

// Validate Connection
$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("Error 404: " . $connection->connect_error);
}
