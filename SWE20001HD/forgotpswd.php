<!-- Forgot Password -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Login Page for the Logbook" />
        <meta name="author" content="Edeser III Monserrate, 102347754" />
        <meta name="keywords" content="Login, SWE20001, logbook" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Forgot Password</title>
        <link href= "styles/styleFinal.css" rel="stylesheet" />
    </head>
	
	<body>
	  <div class="header">
	  
	  </div>
	  
	  <div class="loginform">
	    <img id="loginlogo" src="images/logo.jpg" alt="logo" />
    
        <h2>Reset Password</h2>
	    <form action="forgotpswd.php" method="POST">
          <p>Username: </p>
            <input type = "text" id = "UserName" name = "UserName" />
          <p>New Password: </p>
            <input type = "password" id = "UserPwd" name = "UserPwd" />
		  <p>New Password Confirm: </p>
			<input type = "password" id = "UserPwdConf" name = "UserPwdConf" />
        
        </br>
        </br>
		
          <button type="submit" class="btn-text">Change PASSWORD</button>
	    </form>

        </br>
        <a href="login.php">
	    <button href="login.php" class="btn-forpass" >Return to LogIn</button>
	    </a>
		
		<?php
		  //Checking
		  if(isset($_POST["UserName"]) && isset($_POST["UserPwd"]) && isset($_POST["UserPwdConf"]) && $_POST["UserName"] != ""
		           && $_POST["UserPwd"] != "" && $_POST["UserPwdConf"] != "") {
				
				//Variables.
				$user_err = $match_err = "";
				$user = $_POST["UserName"];
				$pswd = $_POST["UserPwd"];
				$confpswd = $_POST["UserPwdConf"];
				$valid = 0;
				
				//Check Passwords match
				if(strcmp($pswd, $confpswd) == 0) {
					$valid++;
				}
				else {
					$match_err = "The passwords entered do not match.";
				}
				
				//Check for a row using the specified email exists
				require_once("tablefunctions.php");
				if(forgotpswd_profileexists($user)) {
					$valid++;
				}
				else {
					$user_err = "The Username does not exist within our database.";
				}
				
				//If all data validated update users password to the new one
				if($valid == 2) {
					resetpassword($user, $pswd);
					echo "<p>Your Password has been successfully reset.</p>";
				}
				else {
					echo "<p>{$match_err} <br> {$user_err}</p>";
				}
		  }
		  else {
			  echo "<p>Please enter a username and new password<br>for your account.</p>";
		  }
		?>

      </div>
	</body>
</html>