<!-- uploadImage.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <link rel="stylesheet" href="css/profileCss.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <a href="profile.php">Profile</a>
			<a href="uploadImage.php">Upload Image</a>
			<a href="gallery.php">Gallery</a>
            <a href="changePassword.php">Change Password</a>
            <a href="changeInfo.php">Change Info</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="main-content">
            <h2>Upload Image</h2>
            <form action="../controllers/handleUpload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" accept="image/*" required>
                <button type="submit">Upload</button>
            </form>
            
        </div>
    </div>
    <div class="footer">
        <p>Dashboard Footer</p>
    </div>
</body>
</html>
