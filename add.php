<?php
require('db.php');


if ($_SESSION['loggedin'] === false) {
    header("Location: ./login.php");
    exit();
} 
if ($_SESSION['role'] !== '1') {
    header("Location: ./index.php");
    exit();
} 
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<form method="post" action="add.php">
  <div class="container">
      <center>
    <h1>Add Product</h1>
    <hr>

    <label for="name"><b>Name</b></label> <br>
    <input type="text" placeholder="Enter Name" name="name" id="name" required>
    <br>
    <br>
    <label for="productcode"><b>Product Code</b></label> <br>
    <input type="text" placeholder="Enter Product Code" name="productcode" id="productcode" required>
    <br>
    <br>
    <label for="unit"><b>Unit</b></label> <br>
    <input type="text" placeholder="Enter Unit" name="unit" id="unit" required>
   <br>
    <br>
    <label for="price"><b>Price</b></label> <br>
    <input type="text" placeholder="Enter price" name="price" id="price" required>
    <br>
    <br>
    <label for="category"><b>Category</b></label> <br>
    <input type="text" placeholder="Enter category" name="category" id="category" required>
    <br>
    <br>
    <label for="description"><b>Description</b></label> <br>
    <input type="text" placeholder="Enter Description" name="description" id="description" required>
    <br>
    <br>
    <label for="image"><b>Image URL</b></label> <br>
    <input type="text" placeholder="Enter image" name="image" id="image" required>
    <br>
    <br>
    <label for="qty"><b>Quantity</b></label> <br>
    <input type="text" placeholder="Enter Quantity" name="qty" id="qty" required>

    <hr>

    <button type="submit" class="btn btn-success">Add Product</button>
      </center>
  </div>
</form>

<?php

if (isset($_GET['failed'])) {
  echo "<script>alert('Failed to add product');</script>";
}
if (isset($_GET['exists'])) {
  echo "<script>alert('Product already exists');</script>";
}
if (isset($_GET['success'])) {
  echo "<script>alert('Product added successfully');</script>";
}


// Productcode , cannot add 2 products with same productcode
if (isset($_REQUEST['name'])) {

  $name = $_REQUEST['name'];
  $productcode = $_REQUEST['productcode'];
  $unit = $_REQUEST['unit'];
  $price = $_REQUEST['price'];
  $category = $_REQUEST['category'];
  $description = $_REQUEST['description'];
  $image = $_REQUEST['image'];
  $qty = $_REQUEST['qty'];
  // Checks if product exi
    $search = mysqli_query($conn, "SELECT * FROM `products` WHERE productCode='$productcode'");
    if(mysqli_num_rows($search)) {
        header("Location: ./add.php?exists");
        exit();
    } 
  
   $sql = "INSERT INTO `products`(`name`, `productCode`, `unit`, `price`, `category`, `description`, `Image`, `qtyInStock`) VALUES ('$name','$productcode','$unit','$price','$category','$description','$image','$qty')";
  
  if ($conn->query($sql) === TRUE) {
      header("Location: ./add.php?success");
  } else {
      header("Location: ./add.php?failed");
    }
  }


?>