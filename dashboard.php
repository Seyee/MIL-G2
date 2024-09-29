<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html'); // Redirect to login if not authenticated
    exit;
}

echo "Welcome to the dashboard!";
?>
