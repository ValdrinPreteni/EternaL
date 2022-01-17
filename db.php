<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
session_start();

$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn, 'shopping_mall');
?>