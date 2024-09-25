<?php
$servername = "localhost"; // usually localhost
$username = "root"; // your database username
$password = "wawapogi@202X"; // your database password
$dbname = "schoolsystem"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO concerns (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

if ($stmt->execute()) {
    echo "Your concern has been submitted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
