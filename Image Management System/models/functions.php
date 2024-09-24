<?php
    function matchCredential($username, $password)
    {
        $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "management";

    // Connect to the database
    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to check if the user exists with the given username and password
    $query = "SELECT * FROM userinfo WHERE email = '$username' AND password = '$password';";
    $result = $conn->query($query);

    // If a matching user is found
    if ($result->num_rows === 1) {
        $userInfo = $result->fetch_assoc(); // Fetch user info including role
        $_SESSION['userId'] = $userInfo['id']; // Store user ID in session
        $_SESSION['loggedInTime'] = time();
        return $userInfo; // Return the user information, including the role
    }

    return false; 
    }
	

    function isInserted($fname,$cnum,$gender,$email,$password){

        $isValid = false;
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "management";
    
        $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed : " . $conn->connect_error);
        } else {
            echo "Connected with the database";
        }

        $query = "SELECT *FROM userinfo WHERE email = '$email';";
        $result = $conn->query("$query");
        if ($result->num_rows === 1) {
            return false;
        }else{
            $query = "INSERT INTO userinfo (name, email, password, gender, contact_number, role)
                  VALUES ('$fname', '$email', '$password', '$gender', '$cnum', 'user');";
            $result = $conn->query("$query");
            return true;
        }



    }
    function getUser($email){
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "management";
        $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed : " . $conn->connect_error);
        }
        $query = "SELECT *FROM userinfo WHERE email = '$email';";

        $result = $conn->query("$query");

        $userInfo = $result->fetch_assoc();
        return $userInfo;
    }
    function updateDatabase($newPassword, $name, $contact_number, $gender, $email) {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "management";
    
        // Create connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        // Prepare an SQL statement for execution
        $query = "UPDATE userinfo 
                  SET password = ?, name = ?, contact_number = ?, gender = ? 
                  WHERE email = ?";
    
        if ($stmt = $conn->prepare($query)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssss", $newPassword, $name, $contact_number, $gender, $email);
    
            // Execute the statement
            if ($stmt->execute()) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $stmt->error;
            }
    
            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    
        // Close the connection
        $conn->close();
    }
	function getAllUsers() {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "management";

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch all users
    $query = "SELECT id, name, email, contact_number, gender, role FROM userinfo";
    $result = $conn->query($query);

    // Fetch all results in an associative array
    $users = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }

    // Close connection
    $conn->close();
    
    return $users;
}

    
function validEmail($email){
	$host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "management";

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
	$sql ="SELECT * FROM userinfo WHERE EMAIL = '$email';";
	$result = $conn->query($query);
	if($result->num_rows >0){
		
		return true;
	}
	return false;
}
    
?>