<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donation Form</title>
    <link rel="stylesheet" href="index.css" />
<style>.error {
  color: #ff0000;
}</style>
  </head>
  <body>
    <?php
$first_name = $last_name = $address1 = $address2 = $company = "";
$city = $state = $zip_code = $country = $phone = $email = $fax = "";
$monthly_donation_amount = $monthly_donation_duration = "";
$honorarium_acknowledge = $honorarium_address = $honorarium_name = "";
$honorariumamount = $donationamount = "";


$first_name_err = $last_name_err = $address1_err = $address2_err = $company_err = "";
$city_err = $state_err = $zip_code_err = $country_err = $phone_err = "";
$email_err = $fax_err = $monthly_donation_amount_err = $monthly_donation_duration_err = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    if (empty($_POST["first_name"])) {
        $first_name_err = "First name cannot be empty ";
    } else {
        $first_name = test_input($_POST["first_name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
            $first_name_err = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["last_name"])) {
        $last_name_err = "Last name cannot be empty ";
    } else {
        $last_name = test_input($_POST["last_name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
            $last_name_err = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["company"])) {
        $company_err = "Company cannot be empty ";
    } else {
        $company = test_input($_POST["company"]);
    }

    if (empty($_POST["address1"])) {
        $address1_err = "Address cannot be empty ";
    } else {
        $address1 = test_input($_POST["address1"]);
    }

    if (!empty($_POST["address2"])) {
        $address2 = test_input($_POST["address2"]);
    }

    if (empty($_POST["city"])) {
        $city_err = "City cannot be empty ";
    } else {
        $city = test_input($_POST["city"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
            $city_err = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["state"])) {
        $state_err = "State cannot be empty ";
    } else {
        $state = test_input($_POST["state"]);
    }

    if (!empty($_POST["zip_code"])) {
        $zip_code = test_input($_POST["zip_code"]);
        if (!preg_match("/^[0-9]{5}(-[0-9]{4})?$/",$zip_code)) {
            $zip_code_err = "Invalid zip code format";
        }
    }

    if (!empty($_POST["country"])) {
        $country = test_input($_POST["country"]);
    }

    
    if (empty($_POST["phone"])) {
        $phone_err = "Phone number cannot be empty ";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[\+]?[1-9][\d]{0,11}$/",$phone)) {
            $phone_err = "Invalid phone number format";
        }
    }

    if (empty($_POST["email"])) {
        $email_err = "Email cannot be empty ";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format";
        }
    }

    if (!empty($_POST["fax"])) {
        $fax = test_input($_POST["fax"]);
        if (!preg_match("/^[\+]?[1-9][\d]{0,15}$/",$fax)) {
            $fax_err = "Invalid fax number format";
        }
    }
    if (!empty($_POST["monthly_donation_amount"])) {
        $monthly_donation_amount = test_input($_POST["monthly_donation_amount"]);
        if (!is_numeric($monthly_donation_amount) || $monthly_donation_amount <= 0) {
            $monthly_donation_amount_err = "Invalid donation amount";
        }
    }

    if (!empty($_POST["monthly_donation_duration"])) {
        $monthly_donation_duration = test_input($_POST["monthly_donation_duration"]);
        if (!is_numeric($monthly_donation_duration) || $monthly_donation_duration <= 0) {
            $monthly_donation_duration_err = "Invalid duration";
        }
    }

}
?>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div class="form-container">
      <div class="progress-nav">
        <a href="index.html" class="progress-step active">
          <span class="step-number"> >1</span>
          <span>Donation</span>
        </a>
        <a href="" class="progress-step">
          <span class="step-number"> >2</span>
          <span>Confirmation</span>
        </a>
        <a href="" class="progress-step">
          <span class="step-number">3</span>
          <span>Thank You!</span>
        </a>
      </div>
      <h3>Donor Information</h3>
        <div class="form-row">
          <label>First Name *:</label>
          <input type="text" name="first_name" value="<?php echo $first_name; ?>" />
          <span class="error">* <?php echo $first_name_err; ?></span>
        </div>
        <div class="form-row">
          <label>Last Name *:</label>
          <input type="text" name="last_name" value="<?php echo $last_name; ?>" />
          <span class="error">* <?php echo $last_name_err; ?></span>
        </div>
        <div class="form-row">
          <label>Company *:</label>
          <input type="text" name="company" value="<?php echo $company; ?>" />
          <span class="error">* <?php echo $company_err; ?></span>
        </div>
        <div class="form-row">
          <label>Address 1* :</label>
          <input type="text" name="address1" value="<?php echo $address1; ?>"  />
          <span class="error">* <?php echo $address1_err; ?></span>
        </div>
        <div class="form-row">
          <label>Address 2 :</label>
          <input type="text" name="address2" value="<?php echo $address2; ?>" />
          <span class="error"><?php echo $address2_err; ?></span>
        </div>
        <div class="form-row">
          <label>City* :</label>
          <input type="text" name="city" value="<?php echo $city; ?>" />
          <span class="error">* <?php echo $city_err; ?></span>
        </div>
        <div class="form-row">
          <label>State* :</label>
          <select name="state" >
            <option value="">Select State</option>
            <option value="Dhaka" <?php echo ($state == "Dhaka") ? "selected" : ""; ?>>Dhaka</option>
            <option value="Washington DC" <?php echo ($state == "Washington DC") ? "selected" : ""; ?>>Washington DC</option>
            <option value="New York" <?php echo ($state == "New York") ? "selected" : ""; ?>>New York</option>
            <option value="California" <?php echo ($state == "California") ? "selected" : ""; ?>>California</option>
            <option value="Texas" <?php echo ($state == "Texas") ? "selected" : ""; ?>>Texas</option>
            <option value="Khulna" <?php echo ($state == "Khulna") ? "selected" : ""; ?>>Khulna</option>
            <option value="Barishal" <?php echo ($state == "Barishal") ? "selected" : ""; ?>>Barishal</option>
            <option value="Chattogram" <?php echo ($state == "Chattogram") ? "selected" : ""; ?>>Chattogram</option>
          </select>
          <span class="error">* <?php echo isset($state_err) ? $state_err : ''; ?></span>
        </div>
        <div class="form-row">
          <label>Zip Code:</label>
          <input type="text" name="zip_code" value="<?php echo $zip_code; ?>" />
          <span class="error"><?php echo $zip_code_err; ?></span>
        </div>
        <div class="form-row">
          <label>Country:</label>
          <select name="country">
            <option value="">Select Country</option>
            <option value="Bangladesh" <?php echo ($country == "Bangladesh") ? "selected" : ""; ?>>Bangladesh</option>
            <option value="USA" <?php echo ($country == "USA") ? "selected" : ""; ?>>USA</option>
          </select>
        </div>
        <div class="form-row">
          <label>Phone* :</label>
          <input type="tel" name="phone" value="<?php echo $phone; ?>" />
          <span class="error">* <?php echo $phone_err; ?></span>
        </div>
        <div class="form-row">
          <label>Fax:</label>
          <input type="text" name="fax" value="<?php echo $fax; ?>" />
          <span class="error"><?php echo $fax_err; ?></span>
        </div>
        <div class="form-row">
          <label>Email* :</label>
          <input type="email" name="email" value="<?php echo $email; ?>" />
          <span class="error">* <?php echo $email_err; ?></span>
        </div>

        <div class="form-row">
          <label>Donation Amount:</label>
          <div class="radio-group">
            <label><input type="radio" name="donation" value="none" <?php echo ($donationamount == "none") ? "checked" : ""; ?> />None</label>
            <label><input type="radio" name="donation" value="50" <?php echo ($donationamount == "50") ? "checked" : ""; ?> />$50</label>
            <label><input type="radio" name="donation" value="75" <?php echo ($donationamount == "75") ? "checked" : ""; ?> />$75</label>
            <label><input type="radio" name="donation" value="100" <?php echo ($donationamount == "100") ? "checked" : ""; ?> />$100</label>
            <label><input type="radio" name="donation" value="250" <?php echo ($donationamount == "250") ? "checked" : ""; ?> />$250</label>
            <label><input type="radio" name="donation" value="other" <?php echo ($donationamount == "other") ? "checked" : ""; ?> />Other</label>
            <input type="number" placeholder="Amount" name="donationamount" value="<?php echo $donationamount; ?>" />
          </div>
        </div>
        <p class="note">(Check a button or type in your amount)</p>

        <div class="form-row checkbox-row">
          
          <input type="checkbox" name="monthly_donation" /><label for="">Monthly credit card
          $</label>  <input type="number" name="monthly_donation_amount" value="<?php echo $monthly_donation_amount; ?>" /> for <input type="number" name="monthly_donation_duration" value="<?php echo $monthly_donation_duration; ?>" /> Months
          <span class="error"><?php echo isset($monthly_donation_amount_err) ? $monthly_donation_amount_err : ''; ?></span>
          <span class="error"><?php echo isset($monthly_donation_duration_err) ? $monthly_donation_duration_err : ''; ?></span>
        </div>

        <h3>Honorarium and Memorial Donation Information</h3>
        <div class="form-row">
          <label>I would like to make this donation:</label>
          <label><input type="radio" name="tribute" value="honor" <?php echo ($honorariumamount == "honor") ? "checked" : ""; ?> /> To honor</label>
          <label><input type="radio" name="tribute" value="memory" <?php echo ($honorariumamount == "memory") ? "checked" : ""; ?> /> In memory of</label>
        </div>
        <div class="form-row">
          <label>Name:</label>
          <input type="text" name="honorarium_name" value="<?php echo $honorarium_name; ?>" />
        </div>
        <div class="form-row">
          <label>Acknowledge Donation To:</label>
          <input type="text" name="honorarium_acknowledge" value="<?php echo $honorarium_acknowledge; ?>" />
        </div>
        <div class="form-row">
          <label>Address:</label>
          <input type="text" name="honorarium_address" value="<?php echo $honorarium_address; ?>" />
        </div>
        <div class="form-row">
          <label>City:</label>
          <input type="text" name="honorarium_city" />
        </div>
        <div class="form-row">
          <label>State:</label>
          <select name="honorarium_state">
            <option value="">Select State</option>
            <option value="Dhaka">Dhaka</option>
            <option value="Washington DC">Washington DC</option>
            <option value="New York">New York</option>
            <option value="California">California</option>
            <option value="Texas">Texas</option>
            <option value="Khulna">Khulna</option>
            <option value="Barishal">Barishal</option>
            <option value="Chattogram">Chattogram</option>
          </select>
        </div>
        <div class="form-row">
          <label>Zip:</label>
          <input type="number" name="honorarium_zip" />
        </div>

        <h3>Additional Information</h3>
        <p class="note">
          Please enter your name, company or organization as you would like it
          to appear in our publications:
        </p>
        <div class="form-row">
          <label>Name:</label>
          <input type="text" name="additional_name" />
        </div>
        
        <div class="form-row checkbox-row">
          <input type="checkbox" name="anonymous_gift" /> I would like my gift to remain anonymous
        </div>
        <div class="form-row checkbox-row">
          <input type="checkbox" name="matching_gift" /> My employer offers a matching gift program.
          I will mail the matching gift form.
        </div>
        <div class="form-row checkbox-row">
          <input type="checkbox" name="no_thank_you_letter" /> Please save the cost of acknowledging this
          gift by not mailing a thank you letter.
        </div>
        <div class="form-row">
          <label>Comments:</label>
          <textarea placeholder="Comment Here" name="comments"></textarea>
        </div>

        <div class="form-row checkbox-row">
          How may we contact you:
          <label><input type="checkbox" name="contact_email" /> Email</label>
          <label><input type="checkbox" name="contact_postal_mail" /> Postal Mail</label>
          <label><input type="checkbox" name="contact_telephone" /> Telephone</label>
          <label><input type="checkbox" name="contact_fax" /> Fax</label>
        </div>
        <p>
          I would like to receive newsletters and information about special
          events by:
        </p>
        <div class="form-row checkbox-row">
          <label><input type="checkbox" name="newsletter_email" /> Email</label>
          <label><input type="checkbox" name="newsletter_postal_mail" /> Postal Mail</label>
        </div>

        <p class="note">I would like information about volunteering</p>

        <div class="buttons">
          <button type="reset">Reset</button>
          <button type="submit">Continue</button>
        </div>
      </div>
    </form>
  </body>
</html>
