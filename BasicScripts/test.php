//Test for database functions
<?php
  require_once("tablefunctions.php");
  
  //openDatabase();
  
  //createTableUserDetails();
  
  //deleteTables();
  
  /*if(!existsUserDetailsTable()) {
	  createTableUserDetails();
	  echo "Successfully created";
  }
  else {
	  echo "Already Exists (Users)";
  }*/
  
  if(!existsLogDataTable()) {
	  createTableLogData();
	  echo "Successfully created";
  }
  else {
	  echo "Already Exists (Data)";
  }
  
  //enterUserDetails ('Brock', 'Giller', '1998-04-06', 'M', '0458726915', '101624498@student.swin.edu.au', '1295838262', 'brobro', 'ic3cr3am');
  
  /*if(checkUsernameExistance('bigbrocky5')) {
	  echo "Username doesn't exist.";
  }
  else {
	  echo "Username does exist.";
  }*/
?>
