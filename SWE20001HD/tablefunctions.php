<!-- PHP Functions for generating tables -->

<?php
require_once("settings.php");

//$GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pswd'], $GLOBALS['dbnm']

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
      date VARCHAR(10),
      registrationNumber VARCHAR(10),
      startTime TIME,
      finishTime TIME,
      tripTime TIME,
      totalTime TIME,
      odometerStart INT UNSIGNED,
      odometerFinish INT UNSIGNED,
      weatherCondition VARCHAR(10),
      trafficCondition VARCHAR(30))"; 
	  //Not finnished, need creation for each user and add checkbox criteria, etc.
    $conn->query($tableContents);
    $conn->close();
  }

  function deleteTables() {
    //Currently only deletes Users Table.
    $conn = new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
    $query = "DROP TABLE logbookUsers";
	$query2 = "DROP TABLE logbookData";
    $conn->query($query);
	$conn->query($query2);
    $conn->close();
  }

/*----------------------------------------------------------------------------------------------*/
//Function Related to Data Usage
  function timeDiff($firstTime,$lastTime)
  {

    // convert to unix timestamps
    $firstTime=strtotime($firstTime);
    $lastTime=strtotime($lastTime);

    // perform subtraction to get the difference (in seconds) between times
    $timeDiff=$lastTime-$firstTime;

    // return the difference
    return $timeDiff;
  }
  
  //Registration into db.
  function enterUserDetails ($fname, $lname, $dob, $gender, $mobile, $email, $id, $user, $pswd) {
	  $conn = new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
	  $query = "INSERT INTO logbookUsers (driver_id, fname, lname, dob, gender, email, phone, username, password)
	            VALUES ('$id', '$fname', '$lname', '$dob', '$gender', '$email', '$mobile', '$user', '$pswd')";
	  $conn->query($query);
	  $conn->close();
  }
  
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
	  $conn->close();
  }
  ?>
