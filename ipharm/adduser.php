<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$userPassword = $_POST['userPassword'];

//Database connection
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "ipharm"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn -> connect_error){
    die("Connection failed: " .$conn->connect_error);
}else{
    $stmt = $conn->prepare("Insert into user(firstName, lastName, email, userPassword)
        values(?, ?, ?, ?)");
    $stmt->bind_param("ssss, $firstName, $lastName, $email, $userPassword");
    $stmt->execute();
    echo "Registration was successful...";
    $stmt->close();
    $conn-> close();
}
?> 