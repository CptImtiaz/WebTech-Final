<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../models/functions.php"); // Adjusted to use the functions file

session_start();

if (!isset($_SESSION['userEmail'])) {
    header('Location: ../views/login.php'); // Redirect to login if not logged in
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Use email or user ID for a more specific folder naming convention
        $userEmail = $_SESSION['userEmail'];
        $uploadDir = '../uploads/' . md5($userEmail) . '/'; // Hash the email for privacy

        // Create user-specific directory if it does not exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

        // Check if the file is an image
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                // Optionally, you can store metadata in the database if needed
                // e.g., store the filename or the upload date

                // Redirect back to the profile or dashboard
                header('Location: ../views/uploadImage.php?upload=success');
                exit;
            } else {
                echo "File upload failed. Please check directory permissions.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    } else {
        echo "File upload error: " . $_FILES['image']['error'];
    }
}
?>
