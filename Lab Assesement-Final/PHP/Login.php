<?php
$username = $password = "";
$username_err = $password_err = "";
 function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(test_input($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = test_input($_POST["username"]);
    }
 
    if (empty(test_input($_POST["password"]))) {
        $password_err = "Please enter password.";
    } else {
        $password = test_input($_POST["password"]);
    }
 
    if (empty($username_err) && empty($password_err)) {
        echo "Login successful";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <div style="width: 50%; margin: 0 auto; border: 1px solid #ccc; ">
        <div style="text-align: left;">
            <img src="../Image/logo.png" alt="XCompany Logo" style="height: 40px; vertical-align: middle;">
            <div style="float: right;">
                <a href="Publichome.php" style="color: purple;">Home</a> |
                <a href="Login.php" style="color: purple;">Login</a> |
                <a href="Registration.php" style="color: purple;">Registration</a>
            </div>
        </div>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="width: 50%; margin: 0 auto; text-align: left;">
            <fieldset>
                <legend>LOGIN</legend>
                User Name: <input type="text" name="username" value="<?php echo $username; ?>" style="width: auto;"><br>
                <p style="color: red;"><?php echo $username_err; ?></p><br>
                Password: <input type="password" name="password" style="width: auto;"><br>
                <p style="color: red;"><?php echo $password_err; ?></p><br>
                <input type="checkbox" name="remember"> Remember Me<br><br>
                <input type="submit" value="Submit">
                <a href="ForgotPassword.php">Forgot Password?</a>
            </fieldset>
        </form>
        <hr>
        <div style="text-align: center; margin-top: 20px;">
            Copyright © 2017
        </div>
    </div>
</body>
</html>
 