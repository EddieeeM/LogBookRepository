<!-- PHP Functions for generating tables -->

<?php
require_once("settings.php");

//Open Database connection and test for existance.
function openDatabase() {
  //Setting up the database and server, initial check.
  $conn = @mysqli_connect($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pswd'])
  or die('Failed to connect to server.');

  @mysqli_select_db($conn, $GLOBALS['dbnm'])
  or die('Database not available');

}

//Closing the database after use.
function closeDatabase() {
  //Might not be needed.
  $conn = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pswd'], $GLOBALS['dbnm']);
  $conn->close();
}

//Checking if logbookUsers Already Exists.
function existsUserDetailsTable() {
	$conn = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pswd'], $GLOBALS['dbnm']);
	$query = "SELECT 1 FROM logbookUsers";
	$existsUserDetails = $conn->query($query);
	if($existsUserDetails) {
		return true;
	}
	else {
		return false;
	}
}

//Checking if logbookData Already Exists.
function existsLogDataTable() {
	$conn = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pswd'], $GLOBALS['dbnm']);
	$query = "SELECT 1 FROM logbookData";
	$existsLogData = $conn->query($query);
	if($existsLogData) {
		return true;
	}
	else {
		return false;
	}
}

//Creation of the User's Profile.
function createTableUserDetails() {
  $conn = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pswd'], $GLOBALS['dbnm']);
  $tableContents = "CREATE TABLE logbookUsers (
      driver_id INT AUTO_INCREMENT PRIMARY KEY,
      fname VARCHAR(40),
      lname VARCHAR(40),
      email VARCHAR(40),
      gender VARCHAR(1),
      phone VARCHAR(20))";
      $conn->query($tableContents);
    $conn->close();
    echo "<p>Done</p>";
  }

  //Creation of a user's personal log table.
  function createTableLogData() {
    //Want to have user id passed into this function for table name creation.
    $conn = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pswd'], $GLOBALS['dbnm']);
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
    $conn = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pswd'], $GLOBALS['dbnm']);
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
  ?>
