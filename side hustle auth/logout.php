<?php
    session_start();
    
    // echo json_encode($_SESSION);

    if($_SESSION['authenticated'] == false) {
        echo "
            <script>
                window.location = 'index.php'
            </script>
        ";
        die();
    } elseif($_SESSION['authenticated'] == true) {
        $_SESSION['authenticated'] = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Out</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <h1>Log Out Operation Successful</h1>
    <a class="link" href="index.php">Log In</a>
</body>
</html>