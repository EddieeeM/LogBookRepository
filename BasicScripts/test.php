
<?php
  require_once("tablefunctions.php");
  
  openDatabase();
  
  //createTableUserDetails();
  
  //deleteTables();
  
  if(!existsUserDetailsTable()) {
	  createTableUserDetails();
  }
  else {
	  echo "Already Exists (Users)";
  }
  
  if(!existsLogDataTable()) {
	  createTableLogData();
  }
  else {
	  echo "Already Exists (Data)";
  }
  
?>