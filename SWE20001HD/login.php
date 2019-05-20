<!--Login and Script -->

<?php
  session_start();
  if(!isset($_SESSION["loggedin"])) {
	  $_SESSION["loggedin"] = false;
	  $_SESSION["driverId"] = "";
  }
  $driverId = $_SESSION["driverId"];
  $loggedInStatus = $_SESSION["loggedin"];
  $log = 0;
  if($loggedInStatus == true) {
	  //header("location:dashboard.php");
	  $log = 1;
  }
  
  echo "Log In Status is: " . $log . " the id of the user is: " . $driverId;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Login Page for the Logbook" />
        <meta name="author" content="Edeser III Monserrate, 102347754" />
        <meta name="keywords" content="Login, SWE20001, logbook" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login Page</title>
        <link href= "styles/styleFinal.css" rel="stylesheet" />
    </head>
<body>

<div class="header">

</div>

<div class="loginform">

    <img id="loginlogo" src="images/logo.jpg" alt="logo" />
    
    <h2>LOGIN</h2>
	<form action="login.php" method="POST">
      <p>Username: </p>
          <input type = "text" id = "UserName" name = "UserName" />
      <p>Password: </p>
          <input type = "password" id = "UserPwd" name = "UserPwd" />
        
</br>
</br>

      <button type="submit" class="btn-text">LOGIN TO PROFILE</button>
	</form>
      <a href="forgotpwd.html">
          <button class="btn-text">FORGOT PASSWORD</button></a>

</br>
      <a href="registration.php">
	  <button href="registration.php" class="btn-forpass" >New user? Click here</button>
	  </a>
	  
	  <?php
		  //Login Script.
		  require_once("tablefunctions.php");
		  
		  //Variables
		  $driver_id = "";
		  $found = 0;
		  $user = "";
		  $pswd = "";
		  $login_err = $pswd_err = "";
		  
		  if(isset($_POST["UserName"]) && isset($_POST["UserPwd"]) && $_POST["UserName"] != "" && $_POST["UserPwd"] != "") {
			  $user = $_POST["UserName"];
			  $pswd = $_POST["UserPwd"];
			  $found = loginScript($user, $pswd);
			  if($found == 1) {
				  echo "Successfully logged in.";
				  $driver_id = getDriverId($user, $pswd);
				  $_SESSION["loggedin"] = true;
				  $_SESSION["driverId"] = $driver_id;
				  //header("location:dashboard.php");
			  }
			  else {
				  echo "<p>Username and password do not match.</p>";
				  echo "<p>LogIn Failed</p>";
			  }
		  }
		  else {
			  echo "<p>Please enter a username and password.</p>";
		  }
       ?>

</div>

</body>
</html>