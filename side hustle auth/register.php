<?php
    session_start();
    

    // init variables
    $email = $password = $username = "";
    $error = $emailErr = $passwordErr = $usernameErr = "";

    $permitToLoginNo = 0;

    if(isset($_POST['register'])) {
        if($_POST['email'] == $_SESSION['email'] && $_POST['password'] == $_SESSION['password'] && $_POST['username'] == $_SESSION['username']) {
            echo "
                <script>
                    alert('Those Details Already Exists Hence You will Be Redirected To The Login Page Now');
                    window.location = 'index.php';
                </script>
            ";
        }
        
        if(empty($_POST['email'])) {
            $emailErr = 'Email Is Required!'; 
        } else {
            $email = $_POST['email'];
            $email = test_input($email);
            $_SESSION['email'] = $email;
            $permitToLoginNo += 1;
        }
        if(empty($_POST['username'])) {
            $usernameErr = 'Username Is Required!';
        } else {
            $username = $_POST['username'];
            $username = test_input($username);
            $_SESSION['username'] = $username;
            $permitToLoginNo += 1;
        }
        if(empty($_POST['password'])) {
            $passwordErr = 'Password Is Required!';
        } else {
            $password = $_POST['password'];
            $password = test_input($password);
            $_SESSION['password'] = $password;
            $permitToLoginNo += 1;
        }

        if($permitToLoginNo == 3) {
            $_SESSION['authenticated'] = true;
            echo "
                <script>
                    window.location = 'dashboard.php'
                </script>
            ";
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
    <title>Register</title>

   <link rel="stylesheet" href="style.css" />
</head>
<body>

        <div class="container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <h3>Welcome to This Authentication Sidehustle Internship Task </h3>
                <h3>Please Register </h3>
                <div>
                    <label for="email">Email Address</label>
                    <input type="email" name="email" required id="email" class="input-field">
                    <span class="error"><?php echo $emailErr; ?></span>
                </div>
                <div>
                    <label for="username">Username</label>
                    <input type="username" name="username" required id="username" class="input-field" >
                    <span class="error"><?php echo $usernameErr; ?></span>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" required id="password" class="input-field" >
                    <span class="error"><?php echo $passwordErr; ?></span>
                </div>
                <div>
                    <input type="submit" name="register" value="Register" class="btn" >
                </div>
            </form>
            <span>Already Have an account? <a href="index.php">Login Here</a></span>
        </div>
    
    
</body>
</html>