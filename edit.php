<?php
require('db.php');

// kontrollon a osht useri admin nese jo bon redirect
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
<form method="post" action="edit.php?pc=<?php echo $_GET['pc']; ?>">
  <div class="container">
      <center>
    <h1>Edit product: <?php echo $_GET['pc']; ?></h1>
    <hr>
    <?php
    // Get infos from db and place them in forms
    $pc = $_GET['pc'];
    $result =mysqli_query($conn, "SELECT * FROM `products` WHERE `productcode`='$pc'");
    while ($row = mysqli_fetch_assoc($result))
    {
   
    echo'<label for="name"><b>Name</b></label> <br>
    <input type="text" placeholder="Enter Name" name="name" id="name" value="'.$row['name'].'" required>
    <br>
    <br>
    <label for="productcode"><b>Product Code</b></label> <br>
    <input type="text" placeholder="Enter Product Code" name="productcode" id="productcode" value="'.$row['productCode'].'" required>
    <br>
    <br>
    <label for="unit"><b>Unit</b></label> <br>
    <input type="text" placeholder="Enter Unit" name="unit" id="unit" value="'.$row['unit'].'" required>
   <br>
    <br>
    <label for="price"><b>Price</b></label> <br>
    <input type="text" placeholder="Enter price" name="price" id="price" value="'.$row['price'].'" required>
    <br>
    <br>
    <label for="category"><b>Category</b></label> <br>
    <input type="text" placeholder="Enter category" name="category" id="category" value="'.$row['category'].'" required>
    <br>
    <br>
    <label for="description"><b>Description</b></label> <br>
    <input type="text" placeholder="Enter Description" name="description" id="description" value="'.$row['description'].'" required>
    <br>
    <br>
    <label for="image"><b>Image URL</b></label> <br>
    <input type="text" placeholder="Enter image" name="image" id="image" value="'.$row['Image'].'" required>
    <br>
    <br>
    <label for="qty"><b>Quantity</b></label> <br>
    <input type="text" placeholder="Enter Quantity" name="qty" id="qty" value="'.$row['qtyInStock'].'" required>

    <hr>';
     
}
    ?>
    <button type="submit" class="btn btn-success">Edit Product</button>
      </center>
  </div>
</form>

<?php

if (isset($_REQUEST['name'])) {

  $name = $_REQUEST['name'];
  $productcode = $_REQUEST['productcode'];
  $unit = $_REQUEST['unit'];
  $price = $_REQUEST['price'];
  $category = $_REQUEST['category'];
  $description = $_REQUEST['description'];
  $image = $_REQUEST['image'];
  $qty = $_REQUEST['qty'];

    $pc = $_GET['pc'];
   $sql = "UPDATE `products` SET `name`='$name',`productCode`='$productcode',`unit`='$unit',`price`='$price',`category`='$category',`description`='$description',`Image`='$image',`qtyInStock`='$qty' WHERE `productCode`='$pc'";
  if ($conn->query($sql) === TRUE) {
      header("Location: ./admin.php?success");
  } else {
      header("Location: ./admin.php?failed");
    }
  }


?>