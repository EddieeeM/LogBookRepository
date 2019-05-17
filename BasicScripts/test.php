
<?php
  //require_once("tablefunctions.php");
  
  //openDatabase();
  
  //createTableUserDetails();
  
  //deleteTables();
  
  /*if(!existsUserDetailsTable()) {
	  createTableUserDetails();
  }
  else {
	  echo "Already Exists (Users)";
  }
  
  if(!existsLogDataTable()) {
	  createTableLogData();
  }
  else {
	  echo "Already Exists (Data)";
  }*/
  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="registration Page for the Logbook" />
        <meta name="author" content="Edeser III Monserrate, 102347754" />
        <meta name="keywords" content="Register, SWE20001, logbook" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Registration Page</title>
        <link href= "styles/styleFinal.css" rel="stylesheet" />
    </head>
<body>

<div class="header">
  
</div>

<form method="POST" action="test.php">        <!-- newuser.php -->
<div class="loginform">

    <h2>SIGN UP/REGISTER</h2>
    <p>First Name: <input type = "text" id = "UserFirstname" name = "UserFirstname" placeholder = "E.g. John"/> </p>
    <p>Last Name: <input type = "text" id = "UserLastname" name = "UserLastname" placeholder = "E.g. Smith"/> </p>
    <p>Age: <input type="number" id="UserAge" name= "UserAge" /> 
    <span>
        Mobile: <input type="text" id="UserMobile" name="UserMobile" /> 
    </span>
    </p>
    <p>Email: <input type="email" id="UserEmail" name="UserEmail" placeholder="E.g. Someone@somewhere.com"/> </p>
    <p>Licence Number: <input type="text" id="UserIdNum" name="UserIdNum" /> </p>

</br>
    <p>Username: <input type="text" id="UserName" name = "UserName" placeholder="Enter Username"/> </p>
    <p>Password: <input type="password" id="UserPwd" name = "UserPwd" placeholder="Enter Password"/> </p>
    <p>Re-Password: <input type="password" id="ConfimUserPwd" name = "ConfirmUserPwd" placeholder="Re-Enter Password"/> </p>
        

    <button type="submit" class="btn-text">SUBMIT</button>

</div>
</form>

  <?php
    //Add login script.
	if(isset($_POST["UserFirstname"]) && isset($_POST["UserLastname"]) && isset($_POST["UserAge"])
	  && isset($_POST["UserMobile"]) && isset($_POST["UserEmail"]) && isset($_POST["UserIdNum"])
      && isset($_POST["UserName"]) && isset($_POST["UserPwd"]) && isset($_POST["ConfirmUserPwd"])) {
		
		//Error variables for display messages.
		//Maybe add Id?
        $confirm_err = $mobile_err = $date_err = $age_err = $email_err = "";
		//For registering.
		$valid = 0;
		
		//Data Variables
		$fname = $_POST["UserFirstname"]; $lname = $_POST["UserLastname"]; $age = $_POST["UserAge"];
		$mobileNum = $_POST["UserMobile"]; $email = $_POST["UserEmail"]; $driver_id = $_POST["UserIdNum"];
		$username = $_POST["UserName"]; $pswd = $_POST["UserPwd"]; $confirmPswd = $_POST["ConfirmUserPwd"];
		
		//Validation if needed //
		//Password confirmation
		if(strcmp($pswd, $confirmPswd) == 0) {
			$valid++;
		}
		else {
			$confirm_err = "The Passwords do not match.";
		}
		
		//Mobile validation
		if(preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/", $mobileNum)) {
			$valid++;
		}
		else {
			$mobile_err = "Mobile Number is not of a common format.";
		}
		
		//Age verification
		/*if(checkdate()) {
			//TODO
		}
		else {
			$date_err = "This an invalid date format.";
		}*/
		
		//Email validation
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$valid++;
		}
		else {
			$email_err = "Email does not comply with verifciation standards.";
		}
		
		//Adding to db, once data validated.
		if($valid == 3) {
			//ATM
			echo "It Saved to db";
		}
		else {
			echo $confirm_err;
			echo $mobile_err;
			echo $email_err;
		}
	}
	else {
		echo "<p>Not all data has been entered on the Registration page.</p>";
	}
  ?>
</body>
</html>