<?php
// $productId = $_POST['productId'];
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productDescription = $_POST['productDescription'];
$category = $_POST['category'];

// $categoryId = $_POST['categoryId'];
$productImage = $_FILES['productImage']['name'];
$productImageTmpName = $_FILES['productImage']['tmp_name'];
$productImageFolder = 'img/' . $productImage;

// Database connection
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "ipharm"; 

// Create connection
$conn = new mysqli ($servername, $username, $password, $dbname);

// Check connection
if (!$conn -> connect_error) {
    die("Connection failed: " .$conn->connect_error);
}else{
    $stmt = $conn->prepare("Insert into products(productName, productPrice, productDescription, category, productImage)
        values(?, ?, ?, ?, ?, ?)");
    $stmt-bind_param("sdssb, $productName, $productPrice, $productDescription, $category, $productImage");
    $stmt->exectute();
    echo "Product Successfully Added...";
    $stmt->close();
    $conn-> close();
}
?> 