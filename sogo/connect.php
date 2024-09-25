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
$stmt = $conn->prepare("INSERT INTO reservations (firstname, lastname, tel, email, location, room, checkin_date, checkin_time, checkout_date, checkout_time, ip_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssss", $firstname, $lastname, $tel, $email, $location, $room, $checkin_date, $checkin_time, $checkout_date, $checkout_time, $ip_address);

// Set parameters and execute
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$location = $_POST['location'];
$room = $_POST['room'];
$checkin_date = $_POST['checkin_date'];
$checkin_time = $_POST['checkin_time'];
$checkout_date = $_POST['checkout_date'];
$checkout_time = $_POST['checkout_time'];

// Get the user's IP address
$ip_address = $_SERVER['REMOTE_ADDR'];

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>