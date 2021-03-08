<?php
    session_start();


    //init variables
    $password = $username = "";
    $error = $pwdErr = $userErr = "";

    if(isset($_POST['login'])) {
        if(empty($_POST['password'])) {
            $passwordErr = 'Password Is Required!'; 
        } else {
            $password = $_POST['password'];
            $password = test_input($password);
        }

        if(empty($_POST['username'])) {
            $usernameErr = 'Username Is Required!';
        } else {
            $username = $_POST['username'];
            $username = test_input($username);
        }

        if(strtolower($username) == strtolower($_SESSION['username']) && $password == $_SESSION['password']) {
            $_SESSION['authenticated'] = true;
            echo "
                <script>
                    window.location = 'dashboard.php'
                </script>
            ";
        } else {
            $error = "Invalid Login Details !";
        }
    }

     function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Session auth</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container">

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <h1>Welcome</h1>
        <h3>Sign in for free</h3>
        <div>
            <label for="username">Username</label>
            <input type="username" name="username" id="username" required  class="input-field">
            <span class="error"><?php echo $userErr; ?></span>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required class="input-field" >
            <span class="error"><?php echo $pwdErr; ?></span>
        </div>
        <span class="error"><?php echo $error; ?></span>
        <div class="input">
            <input type="submit" name="login" value="Login"  class="btn">
        </div>
    </form>
    <span>Don't Have an account? <a href="register.php">Sign up for free</a></span>

    </div>
    
</body>
</html>