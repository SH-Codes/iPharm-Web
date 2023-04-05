<?php
// require_once 'config.php';

$message = '';

if (isset($_POST['add_product'])) {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDescription = $_POST['productDescription'];
    $productImage = $_FILES['productImage']['name'];
    $productImageTmpName = $_FILES['productImage']['tmp_name'];
    $productImageFolder = 'img/' . $productImage;

    if (empty($productId) || empty($productName) || empty($productPrice) || empty($productDescription) || empty($productImage)) {
        $message = 'Please fill out all fields';
    } else {
        $productId = mysqli_real_escape_string($conn, $productId);
        $productName = mysqli_real_escape_string($conn, $productName);
        $productPrice = mysqli_real_escape_string($conn, $productPrice);
        $productDescription = mysqli_real_escape_string($conn, $productDescription);
        
        $sql = "INSERT INTO products (productId, productName, productPrice, productDescription, productImage) VALUES ('$productId', '$productName', '$productPrice', '$productDescription', '$productImage')";

        if ($conn->query($sql) === TRUE) {
            move_uploaded_file($productImageTmpName, $productImageFolder);
            $message = 'New product added successfully';
        } else {
            $message = 'Could not add the product';
        }
    }
}
?>