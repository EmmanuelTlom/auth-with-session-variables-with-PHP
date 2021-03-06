<?php 

session_start();
if (isset($_SESSION['Fname'])) {
    session_destroy();

    echo "<script> window.location.assign('index.php')</script>";

    
}else {
    echo "<script> window.location.assign('index.php')";
}



?>