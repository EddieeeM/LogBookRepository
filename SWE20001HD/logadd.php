<?php
  //Session Script.
  session_start();
  if(!isset($_SESSION["loggedin"])) {
	  $_SESSION["loggedin"] = false;
	  $_SESSION["driverId"] = "";
  }
  $driverId = $_SESSION["driverId"];
  $loggedInStatus = $_SESSION["loggedin"];
  if($loggedInStatus == false) {
	  header("location:login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="logs of website" />
  <meta name="author" content="Edeser III Monserrate, 102347754" />
  <meta name="keywords" content="logs, SWE20001, logbook" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Learners Logbook</title>
  <link href= "styles/styleFinal.css" rel="stylesheet" />
</head>
<body>
  <div class="header">
    <section id="logo">
      <img src="images/logo.jpg" alt="logo" class="vicroads_logo" />
    </section>
  </div>
  <?php
  //Checks if all inputs have been entered so as no fields get missed.
  if (isset ($_POST["dateLog"]) && isset ($_POST["rego"]) && isset ($_POST["starttime"]) && isset ($_POST["endtime"]) && isset ($_POST["nighttime"]) && isset ($_POST["startOdometer"]) && isset ($_POST["endOdometer"]) && isset ($_POST["weatherConditions"]) && isset ($_POST["trafficConditions"]))
  {
    require ("settings.php");
    require ("tablefunctions.php");

    $conn = @mysqli_connect(DB_HOST, DB_USER, DB_PSWD)
    or die('Failed to connect to server.');

    @mysqli_select_db($conn, DB_NAME)
    or die('Database not available');



    $exists = mysqli_query($conn, "SELECT * from logbookData");

    $date = $_POST["dateLog"];
    $rego = $_POST["rego"];
    $stime = $_POST["starttime"];
    $etime = $_POST["endtime"];
    $ntime = $_POST["nighttime"];
    $sodo = $_POST["startOdometer"];
    $eodo = $_POST["endOdometer"];
    $wconditions = $_POST["weatherConditions"];
    $tconditions = $_POST["trafficConditions"];
    $triptime = dateDifference($stime,$etime);

    $input = "INSERT INTO logbookData (driver_id, date, registrationNumber, startTime , finishTime, tripTime, nightTime, odometerStart, odometerFinish, weatherCondition, trafficCondition) VALUES ('$driverId', '$date', '$rego', '$stime', '$etime', '$triptime', '$ntime', '$sodo', '$eodo', '$wconditions', '$tconditions')";
    $create = createTableLogData();

    if($exists == FALSE)
    {
      mysqli_query($conn, $create);
      echo "<p>Table created</p>";
    }

    mysqli_query($conn, $input)
    or die ("Error in input query");
    echo "Data added!";
    echo "";
    echo "<a href=\"logs.php\">Back to logs</a>";
    closeDatabase();
  }
  else
  {
    echo "<p>All fields need to be entered!</p>";
    echo "<a href=\"logs.php\">Try again</a>";
  }
  ?>
  <div class="navbar">
    <a href="dashboard.php" >My Dashboard</a>
    <a href="about.php" >About</a>
    <a href="account.php" >My Account</a>
    <a href="logs.php" >My Logs</a>
  </div>
</body>
</html>
