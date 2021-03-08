<?php
    session_start();

    if($_SESSION['authenticated'] === false) {
        echo "
            <script>
                window.location = 'index.php'
            </script>
        ";
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard || logged in</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>
        <h3>Welcome <?php echo $_SESSION['username']; ?> </h3>
        <h4>Your Username is <?php echo $_SESSION['username']; ?></h4>
        <h4>Your Email is <?php echo $_SESSION['email']; ?></h4>
        <h4>Your Password is <?php echo $_SESSION['password'] ?></h4>

        <ul class="links">
        <li><a class="link" href="changedet.php">Edit Profile</a></li>
        <li><a class="link" href="password.php">Change Password</a></li>
        <li><a class="link" href="logout.php">Log- out</a></li>
    </ul>
    </div>
    
</body>
</html>