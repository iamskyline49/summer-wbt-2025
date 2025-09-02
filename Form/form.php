<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4d7da;
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #f4d7da;
            padding: 40px;
        }
        
        h1 {
            text-align: center;
            font-size: 48px;
            font-weight: bold;
            color: #000;
            margin-bottom: 40px;
            font-family: serif;
        }
        
        .form-row {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            min-height: 40px;
        }
        
        .form-label {
            font-size: 24px;
            color: #000;
            width: 200px;
            text-align: left;
            font-weight: normal;
        }
        
        .form-input {
            flex: 1;
            margin-left: 20px;
        }
        
        input[type="text"], input[type="email"], input[type="password"], select, textarea {
            padding: 8px 12px;
            border: 2px solid #999;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
        }
        
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            max-width: 500px;
            height: 20px;
        }
        
        .name-inputs {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        
        .name-inputs input {
            width: 200px;
        }
        
        .name-inputs span {
            font-size: 20px;
            font-weight: bold;
        }
        
        .date-inputs {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        
        .date-inputs input, .date-inputs select {
            width: 80px;
        }
        
        .date-format {
            font-style: italic;
            margin-left: 10px;
            font-size: 20px;
        }
        
        .phone-inputs {
            display: flex;
            gap: 10px;
            align-items: center;
            
            
        }
        .phone-inputs input {
            width: 415px;
        }

        .phone-inputs .country-code {
            width: 30px;
        }
        
        
        .phone-inputs span {
            font-size: 20px;
            font-weight: bold;
        }
        
        .radio-group {
            display: flex;
            gap: 30px;
            align-items: center;
        }
        
        .radio-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        input[type="radio"] {
            width: 20px;
            height: 20px;
        }
        
        .radio-item label {
            font-size: 24px;
            color: #000;
        }
        
        .checkbox-group {
            display: flex;
            gap: 30px;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        input[type="checkbox"] {
            width: 20px;
            height: 20px;
        }
        
        .checkbox-item label {
            font-size: 24px;
            color: #000;
        }
        
        select {
            width: 100%;
            max-width: 500px;
            height: 40px;
        }
        
        .file-input {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        input[type="file"] {
            font-size: 16px;
        }
        
        textarea {
            width: 100%;
            max-width: 500px;
            height: 80px;
            resize: vertical;
        }
        
        .submit-container {
            text-align: center;
            margin-top: 40px;
        }
        
        .submit-btn {
            padding: 10px 30px;
            font-size: 18px;
            background-color: #f0f0f0;
            border: 2px solid #999;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .submit-btn:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <?php
$firstname = "";$lastname = "";$fathername = "";$dob = "";$mobile = "";$email = "";$password = "";$gender = "";$department = "";$city = "";$address = ""; $rollno = "";

$firstnameErr = "";$lastnameErr = "";$fathernameErr = "";$dobErr = "";$mobileErr = "";$emailErr = "";$passwordErr = "";$genderErr = "";$departmentErr = "";$cityErr = "";$addressErr = "";$rollnoErr = "";

function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["rollno"])) {
        $rollnoErr = "Roll no. is required";
    } else {
        $rollno = test_input($_POST["rollno"]);
    }
    if (empty($_POST["firstname"])) {
    $nameErr = "Name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $firstnameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["lastname"])) {
    $lastnameErr = "Name is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $lastnameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["$fathername"])) {
    $fathernameErr = "Name is required";
  } else {
    $fathername = test_input($_POST["$fathername"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $fathernameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["$dob"])) {
    $dobErr = "Date of birth is required";
  } else {
    $dob = test_input($_POST["$dob"]);
    if (!preg_match("/^\d{2}-\d{2}-\d{4}$/",$dob)) {
      $dobErr = "Invalid date format";
    }
  }
  if (empty($_POST["$mobile"])) {
    $mobileErr = "Mobile number is required";
  } else {
    $mobile = test_input($_POST["$mobile"]);
    if (!preg_match("/^\+91-\d{10}$/",$mobile)) {
      $mobileErr = "Invalid mobile number format";
    }
  }
  if (empty($_POST["$email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["$email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["$password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["$password"]);
    if (strlen($password) < 6) {
      $passwordErr = "Password must be at least 6 characters long";
    }
  }
  if (empty($_POST["$gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["$gender"]);
  }
  if (empty($_POST["$department"])) {
    $departmentErr = "Department is required";
  } else {
    $department = test_input($_POST["$department"]);
  }
  if (empty($_POST["$city"])) {
    $cityErr = "City is required";
  } else {
    $city = test_input($_POST["$city"]);
  }
  if (empty($_POST["$address"])) {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["$address"]);
  }
}



    ?>
    <div class="container">
        <h1>Student Registration Form</h1>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-row">
                <label class="form-label">Roll no. :</label>
                <div class="form-input">
                    <input type="text" name="rollno">
                    <span class="error"> <?php echo $rollnoErr; ?></span><br><br>
                </div>
            </div>
            
            <div class="form-row">
                <label class="form-label">Student name :</label>
                <div class="form-input">
                    <div class="name-inputs">
                        <input type="text" placeholder="First Name" name="firstname"value="<?php echo $firstname; ?>">
                        <span class="error"> <?php echo $firstnameErr; ?></span><br><br>
                        <input type="text" placeholder="Last Name" name="lastname"value="<?php echo $lastname; ?>">
                        <span class="error"> <?php echo $lastnameErr; ?></span><br><br>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <label class="form-label">Father's name :</label>
                <div class="form-input">
                    <input type="text" name="fathername">
                    <span class="error"> <?php echo $fathernameErr; ?></span><br><br>
                </div>
            </div>
            
            <div class="form-row">
                <label class="form-label">Date of birth :</label>
                <div class="form-input">
                    <div class="date-inputs">
                        <input type="text" placeholder="Day" name="dob">
                        <span>-</span>
                        <input type="text" placeholder="Month" name="dob">
                        <span>-</span>
                        <input type="text" placeholder="Year" name="dob">
                        <span class="error"> <?php echo $dobErr; ?></span><br><br>
                        <span class="date-format">(DD-MM-YYYY)</span>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <label class="form-label">Mobile no. :</label>
                <div class="form-input">
                    <div class="phone-inputs">
                        <input type="text" value="+91" class="country-code" >
                        <span>-</span>
                        <input type="text" class="phone-number" name="mobile">
                        <span class="error"> <?php echo $mobileErr; ?></span><br><br>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <label class="form-label">Email id :</label>
                <div class="form-input">
                    <input type="email" name="email">
                    <span class="error"> <?php echo $emailErr; ?></span><br><br>
                </div>
            </div>
            
            <div class="form-row">
                <label class="form-label">Password :</label>
                <div class="form-input">
                    <input type="password" name="password">
                    <span class="error"> <?php echo $passwordErr; ?></span><br><br>
                </div>
            </div>
            
            <div class="form-row">
                <label class="form-label">Gender :</label>
                <div class="form-input">
                    <div class="radio-group">
                        <div class="radio-item">
                            <input type="radio" id="male" name="gender" value="male">
                            <span>-</span>
                            <label for="male">Male</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="female" name="gender" value="female">
                            <span>-</span>
                            <label for="female">Female</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <label class="form-label">Department :</label>
                <div class="form-input">
                    <div class="checkbox-group">
                        <div class="checkbox-item">
                            <input type="checkbox" id="cse" name="department" value="cse">
                            <span>-</span>
                            <label for="cse">CSE</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="it" name="department" value="it">
                            <label for="it">IT</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="ece" name="department" value="ece">
                            <span>-</span>
                            <label for="ece">ECE</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="civil" name="department" value="civil">
                            <span>-</span>
                            <label for="civil">Civil</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="mech" name="department" value="mech">
                            <label for="mech">Mech</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <label class="form-label">Course :</label>
                <div class="form-input">
                    <select name="course">
                        <option value="">---------------------- Select Current Course's -----------------------</option>
                        <option value="btech">B.Tech</option>
                        <option value="mtech">M.Tech</option>
                        <option value="phd">PhD</option>
                    </select>
                </div>
            </div>
            
            <div class="form-row">
                <label class="form-label">Student photo :</label>
                <div class="form-input">
                    <input type="file" name="photo" accept="image/*">
                    
                </div>
            </div>
            
            <div class="form-row">
                <label class="form-label">City :</label>
                <div class="form-input">
                    <input type="text" name="city">
                    <span class="error"> <?php echo $cityErr; ?></span><br><br>
                </div>
            </div>
            
            <div class="form-row">
                <label class="form-label">Address :</label>
                <div class="form-input">
                    <textarea name="address" rows="4"></textarea>
                    <span class="error"> <?php echo $addressErr; ?></span><br><br>
                </div>
            </div>
            
            <div class="submit-container">
                <button type="submit" class="submit-btn">Register</button>
            </div>
        </form>
    </div>
</body>
</html>