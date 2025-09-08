<?php
$host = "localhost";
<<<<<<< HEAD
$user = "root"; 
$pass = "";     
$dbname = "blog";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
=======
$user = "root"; // your MySQL username
$pass = "";     // your MySQL password
$dbname = "blog";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
>>>>>>> f73cb1be9298f1cfcf108d3b0841a47953db23cb
}
?>