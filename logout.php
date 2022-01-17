
<?php
require('db.php');

if ($_SESSION['loggedin'] !== true) {
    header("Location: ./login.php");
    exit();
}

 $helper = array_keys($_SESSION);
    foreach ($helper as $key){
        unset($_SESSION[$key]);
    }
    
    header("Location: ./login.php");
    exit();

?>