<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="css/profileCss.css">
    <link rel="stylesheet" href="css/gallery.css"> <!-- Link to the new CSS file -->
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
            <h2>Image Gallery</h2>
            <div class="gallery">
                <?php
                // Include the logic file with the correct path
                $images = include('../controllers/galleryLogic.php');

                // Check if any images are found
                if (empty($images)) {
                    echo '<p class="no-images">No images found in the gallery.</p>';
                } else {
                    foreach ($images as $image) {
                        // Output each image safely
                        echo '<img src="' . htmlspecialchars($image) . '" alt="Image" style="width: 200px; height: auto; margin: 5px;">';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>Dashboard Footer</p>
    </div>
</body>
</html>
