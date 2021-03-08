<?php
    session_start();


    //init variables

    $newPassword = $oldPassword = $retypeNewPassword = "";
    $passwordErr = $newPasswordErr = $retypeNewPasswordErr = $unEqualPasswordErr = "";

    if($_SESSION['authenticated'] === false) {
        echo "
            <script>
                window.location = 'index.php'
            </script>
        ";
        die();
    }

    if(isset($_POST['changepw'])) {
        if(empty($_POST['old_pw'])) {
            $passwordErr = 'Password Cannot Be Empty!';
        } else {
            $oldPassword = $_POST['old_pw'];
            $oldPassword = test_input($oldPassword);
        }

        if(empty($_POST['new_pw'])) {
            $newPasswordErr = 'Password Cannot Be Empty!'; 
        } else {
            $newPassword = $_POST['new_pw'];
            $newPassword = test_input($newPassword);
        }

        if(empty($_POST['retype_new_pw'])) {
            $retypeNewPasswordErr = 'Password Cannot Be Empty!';
        } else {
            $retypeNewPassword = $_POST['retype_new_pw'];
            $retypeNewPassword = test_input($retypeNewPassword);
        }

        if($_SESSION['password'] != $oldPassword) {
            $passwordErr = "Password Is Incorrect!";
        } else {
            if($newPassword != $retypeNewPassword) {
                $unEqualPasswordErr = "Password Don't Match! Please Try Again";
            } else {
                $_SESSION['password'] = $newPassword;
                $newPassword = $oldPassword = $retypeNewPassword = "";
                echo "
                    <script>
                        alert('Password Change Successful');
                    </script>
                ";
            }
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
    <title>Change Password</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<div class="container">
    <h1>Change Password</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div>
            <label for="password">Old Password</label>
            <input class="input-field" type="password" name="old_pw" required id="password" value="<?php echo $oldPassword; ?>">
            <span class="error"><?php  echo $passwordErr; ?></span>
        </div>
        <div>
            <label for="newpassword">New Password</label>
            <input class="input-field" type="password" name="new_pw" required id="newpassword" value="<?php echo $newPassword; ?>">
            <span class="error"><?php  echo $newPasswordErr; ?></span>
        </div>
        <div>
            <label for="retypepassword">Retype Password</label>
            <input class="input-field" type="password" name="retype_new_pw" required id="retypepassword" value="<?php echo $retypeNewPassword; ?>">
            <span class="error"><?php echo $retypeNewPasswordErr; ?></span>
        </div>
        <div>
            <span class="error"><?php echo $unEqualPasswordErr; ?></span>
        </div>
        <div>
            <input class="btn" type="submit" name="changepw" value="Change Password">
        </div>
    </form>
</div>
    
    
    
</body>
</html>