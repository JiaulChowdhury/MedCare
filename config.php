<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "medcare";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
$connect = new PDO("mysql:host=localhost; dbname=medcare", "root", "");
?>