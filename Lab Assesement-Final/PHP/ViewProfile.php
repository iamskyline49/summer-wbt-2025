<?php
$name = $email = $username = $password = $confirm_password = $gender = $dob = "";
$name_err = $email_err = $username_err = $password_err = $confirm_password_err = $gender_err = $dob_err = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }
 
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format.";
    } else {
        $email = trim($_POST["email"]);
    }
 
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }
 
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }
 
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Passwords do not match.";
        }
    }
 
    if (empty($_POST["gender"])) {
        $gender_err = "Please select a gender.";
    } else {
        $gender = $_POST["gender"];
    }
 
    if (empty($_POST["dob"])) {
        $dob_err = "Please enter your date of birth.";
    } else {
        $dob = $_POST["dob"];
    }
 
    if (empty($name_err) && empty($email_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($gender_err) && empty($dob_err)) {
        echo "<p style='color: green;'>Registration successful!</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>
<body style="font-family: Arial, sans-serif; text-align: center;">
    <div style="width: 80%; margin: 0 auto; border: 1px solid #ccc; padding: 20px;">
        <div style="text-align: left;">
            <img src="logo.png" alt="XCompany Logo" style="height: 24px; vertical-align: middle;">
            <div style="float: right;">
                <a href="public_home.php" style="color: purple;">Home</a> |
                <a href="login.php" style="color: purple;">Login</a> |
                <a href="registration.php" style="color: purple;">Registration</a>
            </div>
        </div>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="width: 50%; margin: 0 auto; text-align: left;">
            <fieldset>
                <legend>REGISTRATION</legend>
                Name: <input type="text" name="name" value="<?php echo $name; ?>" style="width: 100%;"><br>
                <p style="color: red;"><?php echo $name_err; ?></p><br>
                Email: <input type="email" name="email" value="<?php echo $email; ?>" style="width: 100%;"><br>
                <p style="color: red;"><?php echo $email_err; ?></p><br>
                User Name: <input type="text" name="username" value="<?php echo $username; ?>" style="width: 100%;"><br>
                <p style="color: red;"><?php echo $username_err; ?></p><br>
                Password: <input type="password" name="password" style="width: 100%;"><br>
                <p style="color: red;"><?php echo $password_err; ?></p><br>
                Confirm Password: <input type="password" name="confirm_password" style="width: 100%;"><br>
                <p style="color: red;"><?php echo $confirm_password_err; ?></p><br>
                Gender:
                <input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>> Male
                <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>> Female
                <input type="radio" name="gender" value="Other" <?php if ($gender == "Other") echo "checked"; ?>> Other<br>
                <p style="color: red;"><?php echo $gender_err; ?></p><br>
                Date of Birth: <input type="date" name="dob" value="<?php echo $dob; ?>" style="width: 100%;"><br>
                <p style="color: red;"><?php echo $dob_err; ?></p><br>
                <input type="submit" value="Submit" style="margin-right: 10px;">
                <input type="reset" value="Reset">
            </fieldset>
        </form>
        <hr>
        <div style="text-align: center; margin-top: 20px;">
            Copyright © 2017
        </div>
    </div>
</body>
</html>
 