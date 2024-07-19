<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "your_database_name"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Get data from HTML form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Update database
$sql = "INSERT INTO users (name, email, phone, message) VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $phone, $message);
$stmt->execute();

echo "Data updated successfully";

$conn->close();
?>