<?php

$Fname = "Emmanuel Nwabuodafi";
$email = "Emmanuel@gmail.com";
$password = "12345";


session_start();

if (isset($_SESSION['Fname'])) {

    echo "<h1> Welcome ".$_SESSION['Fname']. "</h1>";
    echo "<a href='explore.php' >Explore page</a><br><br>";
    echo "<a href='log-out.php' >Logout</a>";

}else {
    if ($_POST['Fname'] == $Fname && $_POST['password'] == $password && $_POST['email'] == $email) {
        $_SESSION['Fname'] = $Fname;
        echo "<script> window.location.assign('logged-in.php')</script>";

    }else {
        echo "<script> alert('incorrect details'); window.location.assign('index.php')";
        echo "<script> alert('incorrect details')</script>";
    }
}



?>