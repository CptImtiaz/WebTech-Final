<?php
session_start();
if(!isset($_SESSION['userEmail']) || $_SESSION['role'] !== 'admin'){
    header("Location: login.php");
    die();
}

include "../models/functions.php";

// Get all user information from the database
$allUsers = getAllUsers();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/ProfileCss.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <a href="admin_profile.php">Admin Dashboard</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="main-content">
            <h2>All User Information</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Gender</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($allUsers as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['contact_number']; ?></td>
                            <td><?php echo $user['gender']; ?></td>
                            <td><?php echo $user['role']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="footer">
        <p>Admin Dashboard Footer</p>
    </div>
</body>
</html>
