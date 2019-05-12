
<?php
  //Initializing the session.
  session_start();
  
  //Unset session variables and destroy session.
  $_SESSION = array();
  session_destroy();
  
  //Redirect to required page.
  header("location: login.php");
  exit;
?>