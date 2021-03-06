<?php 

session_start();
if (isset($_SESSION['Fname'])) {
    echo "Hello Welcome to explore page".'<br>'.'<br>';

    echo "<a href='logged-in.php' name=logout >Back</a>";
}else {
    echo "<script> window.location.assign('index.php')";
}



?>