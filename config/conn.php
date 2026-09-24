<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodorder_system";
$conn = new mysqli("localhost", "root", "", "foodorder_system");dsdsdsds

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else echo 'successful';
?>
