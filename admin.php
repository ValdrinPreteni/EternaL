<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
require('db.php');

// Check's if you are logged in and wether you are admin or not
if ($_SESSION['loggedin'] === false) {
    header("Location: ./login.php");
    exit();
} 
if ($_SESSION['role'] !== '1') {
    header("Location: ./index.php");
    exit();
} 
// kontrollon paramat per alerte
if (isset($_GET['deleted'])) {
    echo "<script>alert('Product deleted successfully');</script>";
    }
    if (isset($_GET['fdelete'])) {
        echo "<script>alert('Product failed to delete');</script>";
    }
    if (isset($_GET['failed'])) {
        echo "<script>alert('Product failed to edit');</script>";
    }
    if (isset($_GET['success'])) {
        echo "<script>alert('Product has been successfully updated');</script>";
    }
?>
<table class="table">
  <thead class="thead-dark">
    <tr>
  <tr>
    <th>Name</th>
    <th>Product Code</th>
    <th>Unit</th>
    <th>Price</th>
    <th>Category</th>
    <th>Description</th>
    <th>Quantity</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  </thead>
  <tbody>



<?php 

$sql = "SELECT * FROM `products`";
$rows = array();
$results = $conn->query($sql);

foreach ($results as $result) {
    echo '<tr>';
    echo '<th scope="row">'.$result['name'].'</th>';
    echo '<td>'.$result['productCode'].'</td>';
    echo '<td>'.$result['unit'].'</td>';
    echo '<td>'.$result['price'].'</td>';
    echo '<td>'.$result['category'].'</td>';
    echo '<td>'.$result['description'].'</td>';
    echo '<td>'.$result['qtyInStock'].'</td>';
    echo '<td><a href="./edit.php?pc='.$result['productCode'].'"><button class="btn btn-primary">Edit</button></a></td>';
    echo '<td><a href="./delete.php?pc='.$result['productCode'].'"><button class="btn btn-danger">Delete</button></a></td>';
  echo '</tr>';

}
?>
  </tbody>

</table>