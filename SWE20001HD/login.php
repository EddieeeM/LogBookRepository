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

<div class="modal_container" id = "modal">
    <div class="modal">
        <a href="#" class="close">X</a>
        <span class="modal_heading">
            LOGIN
        </span>
        <form action = "login.php" method="post">
            <p>Username: </p>
            <input class="inputLogin" type = "text" id = "UserName" name = "UserName" placeholder = "Username"/>
            <p>Password: </p>
            <input class="inputLogin" type = "password" id = "UserPwd" name = "UserPwd" placeholder = "Password"/>
            <input type = "submit" class = "btnLogin" value = "LOGIN"/>    
        </form>
    </div>
</div>

<div class="header">
    <!-- Image of the Header, No Content Required -->
</div>

<div class="loginform">

    <img id="loginlogo" src="images/logo.jpg" alt="logo" />
    
    <button class="login">
        <a href="#modal" class="loginLink">LOGIN</a>
    </button>
    
    <button class="btn-forpass">
        <a href="forgotpswd.php" class="forgotpassLink">FORGOT PASSWORD</a>
    </button>

    <button class="btn-register">
        <a href="registration.php" class="registerLink">New user? Click here</a>
    </button>   
	
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
			  header("location:dashboard.html");
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



</div>

</body>
</html>