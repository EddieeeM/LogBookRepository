<!-- PHP Functions for generating tables -->

<?php
  //Database connection details.
  $host = "feenix-mariadb.swin.edu.au";
  $user = "s101624498";
  $pswd = "verstappen";
  $dbnm = "s101624498_db";
  //------------------------------------//
  
  //Open Database connection and test for existance.
  function openDatabase() {
	//Setting up the database and server.
	$conn = @mysqli_connect($host, $user, $pswd) 
	  or die('Failed to connect to server.');
	  
	@mysqli_select_db($conn, $dbnm)
	  or die('Database not available');
	  
  }
  
  //Closing the database after use.
  function closeDatabase() {
	  $conn = mysqli_connect($host, $user, $pswd);
	  mysqli_close($conn);
  }
  
  //Creation of the User's Profile.
  function createTableUserDetails() {
	  $conn = openDatabase();
	  $tableContents = "CREATE TABLE logbookUsers
	                    driver_id INT AUTO_INCREMENT PRIMARY KEY,
	                    fname VARCHAR(40),
						lname VARCHAR(40),
						email VARCHAR(40),
						gender VARCHAR(1),
						phone VARCHAR(20))";
						
	  mysqli_query($conn, $tableContents);
	  closeDatabase();
  }
  
  //Creation of a user's personal log table.
  function createTableLogData() {
	  
  }
?>
