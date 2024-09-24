<?php
required_onace("../models/functions.php");
// Example: Validate email (this is just a basic example)
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    

    if (!validEmail($email)) {
        echo "invalid"; 
    } else {
        echo "valid"; 
    }
}
?>
