<?php
session_start();
    require_once "../models/functions.php";
    $fname = $_POST['fname'];
    $cnum = $_POST['cnum'];
    $gender = $_POST['gender'];
    $uemail = $_SESSION['userEmail'];
    $userInfo = getUser($uemail);
    $password = $userInfo['password'];

    updateDatabase($password, $fname, $cnum, $gender, $uemail);
    header("Location: ../views/profile.php");

?>