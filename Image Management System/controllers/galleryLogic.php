<?php
session_start();

if (!isset($_SESSION['userEmail'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit;
}

// Use the hashed user email to create a unique directory for each user
$userEmail = $_SESSION['userEmail'];
$uploadDir = '../uploads/' . md5($userEmail) . '/'; // Hash the email for privacy

// Initialize an array to hold images
$images = [];

// Check if the user's upload directory exists
if (is_dir($uploadDir)) {
    // Get all image files in the user's upload directory
    $images = glob($uploadDir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
}

// Return the images array
return $images;
