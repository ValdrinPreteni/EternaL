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

$pc = $_GET['pc'];
try {
    $sql = "DELETE FROM `products` WHERE `productCode`='$pc'";
    $delete = mysqli_query($conn, $sql);
    if ($delete !== FALSE) {
        header("Location: ./admin.php?deleted");
    } else {
        header("Location: ./admin.php?fdelete");
    }
} catch (Exception $e) {
    echo $e;
}

?>