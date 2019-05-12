<!-- Login Process -->

<?php
  //Initialize a session.
  session_start();
  
  //Check for already logged in.
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	  header("location: dashboard.php");
	  exit;
  }
  
  //Include database setup.
  require_once("tablefunctions.php");
  
  //Variable Definitions.
  $user = $pswd = "";
  $user_err = pswd_err = "";
  
  //Processing form data.
if($_SERVER["REQUEST_METHOD"] == "POST") {
	//Check for emptyness.
	if(empty(trim($_POST["username"]))) {
		$user_err = "Please enter a username.";
	}
	else {
	  $user = trim($_POST["username"]);
	}
	if(empty(trim($_POST["password"]))) {
	  $pswd_err = "Please enter your password.";
	}
	else {
	  $pswd = trim($_POST["password"]);
	}
	  
	//Credential Validation.
	if(empty($user_err) && empty($pswd_err)) {
	  $login_query = "SELECT driver_id FROM logbookUsers
		                WHERE username = '$user' and password = '$pswd'";		
      $result = mysqli_query($conn, $login_query);
	  $count = mysqli_num_rows($result);
		
	  //Login
	  if($count == 1) {
	    session_start(); //?
	    $_SESSION["loggedin"] = true;
	    $_SESSION["id"] = $id; //set $id.
	    $_SESSION["username"] = $username; //set $username;
	    header("location: dashboard.php"); 
	  }
	  else {
		  echo "<p>No account matching with that username and password.</p>";
	  }
	}
	mysqli_free_result($result);
}
//Close the connection.
?>