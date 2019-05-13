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
  
  //Creation of the User's Profile.
  function createTableUserDetails() {
	  $conn = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pswd'], $GLOBALS['dbnm']);
	  $tableExists = $conn->query("SELECT 1 FROM logbookUsers"); 
	  if($tableExists == FALSE) {
	    $tableContents = "CREATE TABLE logbookUsers (
	                      driver_id INT AUTO_INCREMENT PRIMARY KEY,
	                      fname VARCHAR(40),
						  lname VARCHAR(40),
						  email VARCHAR(40),
						  gender VARCHAR(1),
						  phone VARCHAR(20))";
		$conn->query($tableContents);
		echo "<p>Table doesn't already exists.</p>";
	  }
	  $conn->close();
	  echo "<p>Done</p>";
  }
  
  //Creation of a user's personal log table.
  function createTableLogData() {
	  //Want to have user id passed into this function for table name creation.
	  $conn = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pswd'], $GLOBALS['dbnm']);
	  $tableContents = "CREATE TABLE logbookData (
	                    date VARCHAR(10),
						startTime TIME,
						finnishTime TIME,
						tripTime TIME,
						totalTime TIME,
						tripnightTime TIME,
						totalnightTime TIME,
						odometerStart INT UNSIGNED,
						odometerFinnish INT UNSIGNED,
						registrationNumber VARCHAR(10),
						checkParking )"; //Not finnished, need creation for each user and add checkbox criteria, etc.
	  $conn->query($tableContents);
	  $conn->close();
  }
  
  function deleteTables() {
	  //Currently only deletes Users Table.
	  $conn = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pswd'], $GLOBALS['dbnm']);
	  $query = "DROP TABLE logbookUsers";
	  $conn->query($query);
	  $conn->close();
  }
?>
