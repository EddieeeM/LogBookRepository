<!-- PHP Functions for generating tables -->

<?php
require_once("settings.php");
//-----------------------------------------------------------------//
//----------- Database Connection Functions ----------------------//

//Open Database connection and test for existance.
function openDatabase() {
  //Setting up the database and server, initial check.
  $conn = @mysqli_connect(DB_HOST, DB_USER, DB_PSWD)
  or die('Failed to connect to server.');

  @mysqli_select_db($conn, DB_NAME)
  or die('Database not available');

}

//Closing the database after use.
function closeDatabase() {
  //Might not be needed.
  $conn = new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
  $conn->close();
}

//------------------------------------------------------------------//
//------------  Table Existance, Creation and Deletion ------------//

//Checking if logbookUsers Already Exists.
function existsUserDetailsTable() {
	$conn = new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
	$query = "SELECT 1 FROM logbookUsers";
	$existsUserDetails = $conn->query($query);
	if($existsUserDetails) {
		return true;
	}
	else {
		return false;
	}
	$conn->close();
}

//Checking if logbookData Already Exists.
function existsLogDataTable() {
	$conn = new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
	$query = "SELECT 1 FROM logbookData";
	$existsLogData = $conn->query($query);
	if($existsLogData) {
		return true;
	}
	else {
		return false;
	}
	$conn->close();
}

function existsUserDetailsUpdate() {
	$conn = new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
	$query = "SELECT 1 FROM userUpdate";
	$existsUpdate = $conn->query($query);
	if($existsUpdate) {
		return true;
	}
	else {
		return false;
	}
	$conn->close();
}

//Creation of the User's Profile.
function createTableUserDetails() {
  $conn = new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
  $tableContents = "CREATE TABLE logbookUsers (
      driver_id INT,
      fname VARCHAR(40),
      lname VARCHAR(40),
	  dob DATE,
	  gender VARCHAR(1),
      email VARCHAR(40),
      phone VARCHAR(20),
	  username VARCHAR(40),
	  password VARCHAR(40))";
    $conn->query($tableContents);
    $conn->close();
    echo "<p>Done</p>";
  }

  //Creation of a user's personal log table.
  function createTableLogData() {
    //Want to have user id passed into this function for table name creation.
    $conn = new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
    $tableContents = "CREATE TABLE logbookData (
	    driver_id INT,
      date VARCHAR(10),
      registrationNumber VARCHAR(10),
      startTime TIME,
      finishTime TIME,
      tripTime TIME,
      nightTime INT,
      odometerStart INT UNSIGNED,
      odometerFinish INT UNSIGNED,
      weatherCondition VARCHAR(10),
      trafficCondition VARCHAR(30))";
	  //Not finnished, need creation for each user and add checkbox criteria, etc.
    $conn->query($tableContents);
    $conn->close();
  }

  function createUserDetailsUpdate() {
	  $conn = new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
	  $tableContents = "CREATE TABLE userUpdate (
	                    driver_id INT,
						street_address VARCHAR(30),
						suburb VARCHAR(20),
						state VARCHAR(20),
						postcode SMALLINT,
						contactprefs VARCHAR(20))";
	  $conn->query($tableContents);
	  $conn->close();
  }

  function deleteTables() {
    //Currently only deletes Users Table.
    $conn = new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
    //$query = "DROP TABLE logbookUsers";
	$query2 = "DROP TABLE logbookData";
    //$conn->query($query);
	$conn->query($query2);
    $conn->close();
  }

//----------------------------------------------------------------------------------------------//
//------------------------- Data Display Page Functions ---------------------------------------//

//Function Related to Data Usage
function dateDifference($date_1 , $date_2 , $differenceFormat = '%h:%m:%s' )
{
  $datetime1 = date_create($date_1);
  $datetime2 = date_create($date_2);

  $interval = date_diff($datetime1, $datetime2);

  return $interval->format($differenceFormat);

}

//----------------------------------------------------------------------------------------------//
//------------------------ Registration, LogIn & Forgot Pswd Functions ------------------------//

  //Registration into db.
  function enterUserDetails ($fname, $lname, $dob, $gender, $mobile, $email, $id, $user, $pswd) {
	  $conn = new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
	  $query = "INSERT INTO logbookUsers (driver_id, fname, lname, dob, gender, email, phone, username, password)
	            VALUES ('$id', '$fname', '$lname', '$dob', '$gender', '$email', '$mobile', '$user', '$pswd')";
	  $conn->query($query);
	  $conn->close();
  }

  //To ensure a username isn't entered more than once into a database.
  function checkUsernameExistance($username) {
	  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
	  $query = "SELECT driver_id FROM logbookUsers WHERE username = '$username'";
	  $result = mysqli_query($conn, $query);
	  $row_cnt = mysqli_num_rows($result);
	  if($row_cnt == 0) {
		  return true;
	  }
	  else {
		  return false;
	  }
	  mysqli_free_result($result);
	  mysqli_close($conn);
  }

  //Allows the user to login into the service if their account exists.
  function loginScript($user, $pswd) {
	  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
	  $login_query = "SELECT driver_id FROM logbookUsers
		              WHERE username = '$user' and password = '$pswd'";
	  $result = mysqli_query($conn, $login_query);
	  $rowCount = mysqli_num_rows($result);
	  return $rowCount;
	  mysqli_free_result($result);
	  mysqli_close($conn);
  }

  //Retrieve the driver id for use in the session variables.
  function getDriverId($user, $pswd) {
	  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
	  $query = "SELECT driver_id FROM logbookUsers WHERE username = '$user' and password = '$pswd'";
	  $result = mysqli_query($conn, $query);
	  $id = mysqli_fetch_row($result);
	  return $id[0];
	  mysqli_free_result($result);
	  mysqli_close($conn);
  }

  //----------------------------------------------------------------------------------------------//
  //-------------------------------- Forgot Password Functions ----------------------------------//

  //Checks DB for an account with the
  function forgotpswd_profileexists($username) {
	  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
	  $query = "SELECT driver_id FROM logbookUsers WHERE username = '$username'";
	  $result = mysqli_query($conn, $query);
	  $row_cnt = mysqli_num_rows($result);
	  if($row_cnt == 1) {
		  return true;
	  }
	  else {
		  return false;
	  }
	  mysqli_free_result($result);
	  mysqli_close($conn);
  }

  function resetpassword($username, $password) {
	  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
	  $query = "UPDATE logbookUsers SET password = '$password' WHERE username = '$username'";
	  $result = mysqli_query($conn, $query);
	  mysqli_close($conn);
  }

  //----------------------------------------------------------------------------------------------//
  //--------------------------------------Account -----------------------------------------------//

  //Adds a record for the user if not present.
  function addUpdaterecord($id) {
	  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
	  $query = "SELECT 1 FROM userUpdate WHERE driver_id = $id";
	  $existsuserrecord = mysqli_query($conn, $query);
	  $result = mysqli_fetch_row($existsuserrecord);
	  if($result == 0) {
		  $queryadd = "INSERT INTO userUpdate (driver_id, street_address, suburb, state, postcode, contactprefs) VALUES ($id, NULL, NULL, NULL, NULL, NULL)";
		  mysqli_query($conn, $queryadd);
	  }
  }
  ?>
