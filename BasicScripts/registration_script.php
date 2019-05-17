
<?php
  //SCRIPT FOR REGISTRATION PAGE
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
	}
	else {
		echo "<p>Not all data has been entered on the Registration page.</p>";
	}
	  
?>