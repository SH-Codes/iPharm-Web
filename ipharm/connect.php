<?php
// Connection parameters
$serverName = "SIHLEHLOPHE";
$databaseName = "ipharm";
$username = "sihle";
$password = "";

// Connect to the database
$conn = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", $username, $password);

// Check for errors
if ($conn === false) {
  die(print_r(sqlsrv_errors(), true));
}

// Get form data
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

// Insert new product into the database
$query = "INSERT INTO products (name, description, price) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bindValue(1, $name, PDO::PARAM_STR);
$stmt->bindValue(2, $description, PDO::PARAM_STR);
$stmt->bindValue(3, $price, PDO::PARAM_STR);
$result = $stmt->execute();

// Check for errors
if ($result === false) {
  die(print_r(sqlsrv_errors(), true));
}

// Display success message
echo "Product added successfully!";
?>
