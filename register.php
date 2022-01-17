<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<form method="post" action="register.php">
  <div class="container">
      <center>
    <h1>Register</h1>
    <hr>

    <label for="email"><b>Email</b></label> <br>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>
    <br>
    <br>
    <label for="psw"><b>Password</b></label> <br>
    <input type="password" placeholder="Enter Password" name="pw" id="pw" required>
    <br>
    <br>
    <label for="username"><b>Username</b></label> <br>
    <input type="text" placeholder="Enter Username" name="username" id="username" required>
   <br>
    <br>
    <label for="name"><b>Name</b></label> <br>
    <input type="text" placeholder="Enter Name" name="name" id="name" required>
    <br>
    <br>
    <label for="addr"><b>Address</b></label> <br>
    <input type="text" placeholder="Enter Address" name="addr" id="addr" required>

    <hr>

    <button type="submit" class="btn btn-success">Register</button>
      </center>
  </div>
</form>

<?php

require('db.php');

if ($_SESSION['loggedin'] === true) {
    header("Location: ./index.php");
    exit();
}

if (isset($_GET['alreadyinuse'])) {
echo "<script>alert('Email is already registered');</script>";
}
if ($_GET['registered'] === 'false') {
    echo "<script>alert('Failed to register, please try again');</script>";
}
if (isset($_REQUEST['email'])) {

$email = $_REQUEST['email'];
$name = $_REQUEST['name'];
$pw = $_REQUEST['pw'];
$address = $_REQUEST['addr'];
$username = $_REQUEST['username'];
$ts = microtime(true);
// Check if user already exist
  $search = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'");
  if(mysqli_num_rows($search)) {
      header("Location: ./register.php?alreadyinuse=true");
      exit();
  } 


 $sql = "INSERT INTO `users`(`name`, `email`, `address`, `username`, `role`, `createDate`, `password`) VALUES ('$name','$email','$address','$username','0','$ts','$pw')";
if ($conn->query($sql) === TRUE) {
    header("Location: ./login.php?welcome=true");
} else {
    header("Location: ./register.php?registered=false");
  }
}
?>