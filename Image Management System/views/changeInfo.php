<?php
session_start();
// if(!isset($_SESSION['userEmail'])){
//     header("Location: login.php");
//     die();
// }
include "../models/functions.php";
$userInfo = getUser($email);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/changeInfoCss.css">
</head>

<body>
    
   
        <div class="sidebar">
            <a href="profile.php">Profile</a>
			<a href="uploadImage.php">Upload Image</a>
			<a href="gallery.php">Gallery</a>
            <a href="changePassword.php">Change Password</a>
            <a href="changeInfo.php">Change Info</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="main-content">
            <h2>Change Info</h2>
            <form action="../controllers/changeInfoAction.php" method="post"
                onsubmit="return isRegistrationValid(this)">
                <div class="form-group">
                    <label for="fname">Full name</label>
                    <input type="text" name="fname" id="fname">
                    <span id="rerr1"></span>
                </div>
                <div class="form-group">
                    <label for="cnum">Contact number</label>
                    <input type="text" name="cnum" id="cnum">
                    <span id="rerr2"></span>
                </div>
                <div class="form-group">
                    <p>Please select your gender</p>
                    <input type="radio" id="rmale" name="gender" value="Male">
                    <label for="male">Male</label><br>
                    <input type="radio" id="rfemale" name="gender" value="Female">
                    <label for="female">Female</label>
                    <span id="rerr4"></span>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
    <div class="footer">
        <p>Dashboard Footer</p>
    </div>
</body>

</html>