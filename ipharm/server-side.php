<?php
include 'config.php'; // include your database configuration file here

// define variables and set to empty values
$productIdErr = $productNameErr = $productPriceErr = $productDescriptionErr = $productCategoryErr = $productImageErr = "";
$productId = $productName = $productPrice = $productDescription = $productCategory = $productImage = "";

// check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // validate product ID
}if (empty($_POST['productId'])) {
    $productIdErr = "Product ID is required";
  } else {
    $productId = test_input($_POST['productId']);
    // check if product ID is valid (e.g. only contains letters and numbers)
    if (!preg_match("/^[a-zA-Z0-9]*$/", $productId)) {
      $productIdErr = "Only letters and numbers are allowed in the product ID";
    }
  }

  // validate product name
  if (empty($_POST['productName'])) {
    $productNameErr = "Product name is required";
  } else {
    $productName = test_input($_POST['productName']);
    // check if product name is valid (e.g. only contains letters and spaces)
    if (!preg_match("/^[a-zA-Z ]*$/", $productName)) {
      $productNameErr = "Only letters and spaces are allowed in the product name";
    }
  }

  // validate product price
  if (empty($_POST['productPrice'])) {
    $productPriceErr = "Product price is required";
  } else {
    $productPrice = test_input($_POST['productPrice']);
    // check if product price is a valid number
    if (!is_numeric($productPrice)) {
      $productPriceErr = "Product price must be a number";
    }
  }

  // validate product description
  if (empty($_POST['productDescription'])) {
    $productDescriptionErr = "Product description is required";
  } else {
    $productDescription = test_input($_POST['productDescription']);
    // add additional validation rules for product description if needed
  }

  // validate product category
  if (empty($_POST['category'])) {
    $productCategoryErr = "Product category is required";
  } else {
    $productCategory = test_input($_POST['category']);
    // add additional validation rules for product category if needed
  }

  // validate product image
  if (empty($_FILES['productImage']['name'])) {
    $productImageErr = "Product image is required";
  } else {
    $productImage = test_input($_FILES['productImage']['name']);
    // add additional validation rules for product image if needed
  }

  // if all input fields are valid, insert the new product data into the database
  if ($productIdErr == "" && $productNameErr == "" && $productPriceErr == "" && $productDescriptionErr == "" && $productCategoryErr == "" && $productImageErr == "") {
    // connect to the database
    $conn = mysqli_connect($host, $user, $password, $database);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // insert the new product data into the database
    $sql = "INSERT INTO products (product_id, product_name, product_price, product_description, product_category, product_image)
            VALUES ('$productId', '$productName', '$productPrice', '$productDescription', '$productCategory', '$productImage')";
    if (mysqli_query($conn, $sql)) {
      echo "New";
  
    }
  }
?>
