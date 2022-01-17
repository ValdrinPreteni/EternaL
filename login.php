<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<form method="post" action="login.php">
  <div class="container">
      <center>
    <h1>Login</h1>
    <hr>

    <label for="email"><b>Email</b></label> <br>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>
    <br>
    <br>
    <label for="psw"><b>Password</b></label> <br>
    <input type="password" placeholder="Enter Password" name="pw" id="pw" required>
        <hr>

    <button type="submit" class="btn btn-success">Login</button>
      </center>
  </div>
</form>

<?php
require('db.php');


if ($_SESSION['loggedin'] === true) {
    header("Location: ./index.php");
    exit();
}
if (isset($_GET['wrongpw'])) {
    echo "<script>alert('Wrong Password, try again');</script>";
}
if (isset($_GET['welcome'])) {
    echo "<script>alert('You have been registered successfully, please login');</script>";
}
if (isset($_REQUEST['email'])) {

$email = $_REQUEST['email'];
$pw = $_REQUEST['pw'];

  $search = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$pw'");
  if(mysqli_num_rows($search)) {

    
        $result =mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='$email'");
        while ($row = mysqli_fetch_assoc($result))
   {
      $_SESSION['address'] = $row['address'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['role'] = $row['role'];
      $_SESSION['username'] = $row['username'];
   }
   
      $_SESSION['loggedin'] = true;
      header("Location: ./index.php");
      exit();
  } else {
    $_SESSION['loggedin'] = false;
      header("Location: ./login.php?wrongpw");
      exit();
  }
}
?>