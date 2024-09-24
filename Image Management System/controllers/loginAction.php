
<?php
require_once "../models/functions.php";
session_start();
$isValid = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['email'];
    $password = $_POST['password'];
    
    $userInfo = matchCredential($username, $password);
    
    if ($userInfo === false) {
        header("Location: ../views/login.php?login=failed&username=$username");
    } else {  
        // Set session variables
        $_SESSION['userEmail'] = $userInfo['email'];
        $_SESSION['userId'] = $userInfo['id'];
        $_SESSION['role'] = $userInfo['role'];
        
        // Check user role and redirect accordingly
        if ($userInfo['role'] === 'admin') {
			
            header("Location: ../views/admin_profile.php");
        } else {
			
            header("Location: ../views/profile.php");
        }
    }
}
