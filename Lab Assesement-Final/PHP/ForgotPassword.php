<?php
$email = "";
$email_err = "";
 function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(test_input($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } elseif (!filter_var(test_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format.";
    } else {
        $email = test_input($_POST["email"]);
        echo "Password reset link sent!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
</head>
<body style="font-family: Arial, sans-serif; text-align: center;">
    <div style="width: 50%; margin: 0 auto; border: 1px solid #ccc;">
        <div style="text-align: left;">
            <img src="../Image/logo.png" alt="XCompany Logo" style="height: 40px; vertical-align: middle;">
            <div style="float: right;">
                <a href="Publichome.php" ">Home</a> |
                <a href="Login.php" ">Login</a> |
                <a href="Registration.php" ">Registration</a>
            </div>
        </div>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="width: 50%; margin: 0 auto; text-align: left;">
            <fieldset>
                <legend>FORGOT PASSWORD</legend>
                Enter Email: <input type="email" name="email" value="<?php echo $email; ?>" style="width: auto; margin-top: 20px;margin-bottom: 20px;"><br>
                <hr>
                <p style="color: red;"><?php echo $email_err; ?></p><br>
                <input type="submit" value="Submit">
            </fieldset>
        </form>
        <hr>
        <div style="text-align: center; margin-top: 20px;">
            Copyright © 2017
        </div>
    </div>
</body>
</html>