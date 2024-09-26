<?php
// Database configuration
$host = 'localhost'; // Change this if your database is hosted elsewhere
$dbname = 'your_database_name'; // Replace with your database name
$username = 'your_username'; // Replace with your database username
$password = 'your_password'; // Replace with your database password

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);
    $checkin_date = $conn->real_escape_string($_POST['checkin-date']);
    $checkin_time = $conn->real_escape_string($_POST['checkin-time']);
    $checkout_date = $conn->real_escape_string($_POST['checkout-date']);
    $checkout_time = $conn->real_escape_string($_POST['checkout-time']);

    // Prepare SQL statement
    $sql = "INSERT INTO reservations (name, email, phone, address, checkin_date, checkin_time, checkout_date, checkout_time) 
            VALUES ('$name', '$email', '$phone', '$address', '$checkin_date', '$checkin_time', '$checkout_date', '$checkout_time')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Reservation successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
