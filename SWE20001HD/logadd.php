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
  if (isset ($_POST["dateLog"]) && isset ($_POST["rego"]) && isset ($_POST["starttime"]) && isset ($_POST["endtime"]) && isset ($_POST["DrivingTime"]) && isset ($_POST["startOdometer"]) && isset ($_POST["endOdometer"]) && isset ($_POST["weatherConditions"]) && isset ($_POST["trafficConditions"]))
  {
    require ("settings.php");

    $conn = @mysqli_connect($host, $user, $pswd)
    or die('Failed to connect to server');

    @mysqli_select_db($conn, $dbnm)
    or die('Database not available');
    require ("tablefunctions.php");

    $exists = mysqli_query($conn, "SELECT * from logbookData");

    if($exists == FALSE)
    {
      mysqli_query($conn, $create);
    }

    $date = $_POST["dateLog"];
    $rego = $_POST["rego"];
    $stime = $_POST["starttime"];
    $etime = $_POST["endtime"];
    $sodo = $_POST["startOdometer"];
    $eodo = $_POST["endOdometer"];
    $wconditions = $_POST["weatherConditions"];
    $tconditions = $_POST["trafficConditions"];
    $triptime = timeDiff($stime,$etime);
    if($exists == FALSE)
    {
      $totaltime = mysqli_query('SELECT SUM(tripTime) FROM logbookData');
    }
    else
    {
      $totaltime = "";
    }


    $input = "INSERT INTO logbookData (date, registrationNumber, startTime , finishTime, tripTime, totalTime, odometerStart, odometerFinish, weatherCondition, trafficCondition) VALUES ('$date', '$rego', '$stime', '$etime', '$triptime', '$totaltime', '$sodo', '$eodo', '$wconditions', '$tconditions');";
    $create = createTableLogData();

    mysqli_query($conn, $input);
    echo "<p>Table Created and data added!</p>";
    echo "<a href=\"logs.html\">Home</a>";
  }
  else
  {
    echo "<p>All fields need to be entered!</p>";
    echo "<a href=\"logs.html\">Try again</a>";
  }
  ?>
  <div class="navbar">
    <a href="dashboard.html" >My Dashboard</a>
    <a href="about.html" >About</a>
    <a href="account.html" >My Account</a>
    <a href="logs.html" >My Logs</a>
  </div>
</body>
</html>
