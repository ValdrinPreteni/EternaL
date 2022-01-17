
<?php
require('db.php');

// kontrollon nese sosht true tqet nlogin
if ($_SESSION['loggedin'] !== true) {
    header("Location: ./login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Shopping</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!-- Nav -->
<nav class="navbar navbar-inverse bg-inverse fixed-top bg-faded">
    <div class="row">
        <div class="col">
          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#cart">Cart (<span class="total-count"></span>)</button><button class="clear-cart btn btn-danger float-right">Clear Cart</button> <?php if ($_SESSION['role'] === '1') { echo '<a href="./admin.php"><button  class="btn btn-success">Admin Panel</button></a>'; }?><a href="./logout.php"><button class="btn btn-danger">Logout</button></a></div>
    </div>
</nav>
<br>
<h1>Hello, <?php echo $_SESSION['username']; ?></h1> 

<!-- Main -->
<div class="container">
<a href="./index.php"> <button class="btn btn-success ">ALL</button></a>
<a href="./index.php?category=fruit"> <button class="btn btn-success">Fruits</button></a>
<a href="./index.php?category=vegetable"> <button class="btn btn-success">Vegetables</button></a>
<a href="./index.php?category=snacks"> <button class="btn btn-success">Snacks</button></a>
<a href="./index.php?category=test"> <button class="btn btn-success">Test</button></a>
<br>
<br>
    <div class="row">
    <?php

// If there is no category by default will show all 
    if (!isset($_GET['category'])) {

  
    $sql = "SELECT * FROM `products`";
    $rows = array();
    $results = $conn->query($sql);
  
    foreach ($results as $result) {

        echo '
        <div class="card" style="width: 15rem;">
  <img class="card-img-top" src="'.$result['Image'].'">
  <div class="card-block">
    <h4 class="card-title">'.$result['name'].'</h4>
    <p class="card-text">Price: $'.$result['price'].'</p>
    <a href="#" data-name="'.$result['name'].'" data-price="'.$result['price'].'" class="add-to-cart btn btn-primary">Add to cart</a>
  </div>
</div>
    ';

    } 
 } else {
 // If there is category then it will take product's from category
     $category = $_GET['category'];
    $sql = "SELECT * FROM `products` WHERE `category`='$category'";
    $rows = array();
    $results = $conn->query($sql);
  
    foreach ($results as $result) {

        echo '
        <div class="card" style="width: 15rem;">
  <img class="card-img-top" src="'.$result['Image'].'">
  <div class="card-block">
    <h4 class="card-title">'.$result['name'].'</h4>
    <p class="card-text">Price: $'.$result['price'].'</p>
    <a href="#" data-name="'.$result['name'].'" data-price="'.$result['price'].'" class="add-to-cart btn btn-primary">Add to cart</a>
  </div>
</div>
    ';

    } 
 }
    ?>



    </div>
</div>

  
 <!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="show-cart table">
          
        </table>
        <div>Total price: $<span class="total-cart"></span></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Order now</button>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script><script  src="./cart.js"></script>

</body>
</html>
