<?php
include 'config.php'; // include your database configuration file here

// check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // get the form data
  $productId = $_POST['productId'];
  $productName = $_POST['productName'];
  $productPrice = $_POST['productPrice'];
  $productDescription = $_POST['productDescription'];
  $productCategory = $_POST['catergory'];
  $productImage = $_FILES['productImage']['name'];

  // connect to the database
  $conn = mysqli_connect($host, $user, $password, $database);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // insert the new product data into the database
  $sql = "INSERT INTO products (product_id, product_name, product_price, product_description, product_category, product_image)
          VALUES ('$productId', '$productName', '$productPrice', '$productDescription', '$productCategory', '$productImage')";
  if (mysqli_query($conn, $sql)) {
    echo "New product added successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  // close the database connection
  mysqli_close($conn);
}
?>
