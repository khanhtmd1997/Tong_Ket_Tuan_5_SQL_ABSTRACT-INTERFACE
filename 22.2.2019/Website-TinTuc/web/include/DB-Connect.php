<?php
$servername = "127.0.0.1:3306";
$username = "root";
$database = "website_tintuc_pdo";
$password = "";
$conn = mysqli_connect($servername, $username,  $password,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";
?>