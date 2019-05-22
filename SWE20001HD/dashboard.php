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
        <meta name="description" content="dashboard of website" />
        <meta name="author" content="Edeser III Monserrate, 102347754" />
        <meta name="keywords" content="dashboard, SWE20001, logbook" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>My Learners Logbook - Dashboard</title>
        <link href= "styles/styleFinal.css" rel="stylesheet" />
    </head>
<body>

<div class="header">
    <section id="logo">
        <img src="images/logo.jpg" alt="logo" class="vicroads_logo" />
    </section>
</div>

<div class="row">
    <div class="leftside">
      <!-- Goals for the week can open a text area to list them & have a dropdown to choose the category-->
      <h2>Goals for the Week:
        <span>
            <button value="Edit">Edit Goals</button>
        </span>
      </h2>

      <h3>Parking</h3>
      <div class="graphSecondary" >BarGraph on Progression</div>
      <ol>
        <li>Improve on Reverse Parking</li>
          <ul>
            <li>Preferrably at a Shopping Centre</li>
            <li>Reminder - Don't User Reverse Cameras!</li>
          </ul>
        <li>Parallel Parking</li>
        <ul>
          <li>Preferrably at a Shopping Centre</li>
        </ul>
      </ol>

      <h3>Road Rules</h3>
      <div class="graphSecondary" >BarGraph on Progression</div>
      <ol>
        <li>Go Through More Roundabouts</li>
          <ul>
            <li>Always remember to let the person/vehicle at the right go first</li>
            <li>Middle Lane - Straight & Right only, Outer Lane - Straight & Left only</li>
          </ul>
        <li>Highway Driving</li>
        <ul>
          <li>M1 (Monash Freeway)</li>
          <li>M3 (Eastlink)</li>
        </ul>
      </ol>
      </br>
    </div>

    <div class="main">
      <h1>DASHBOARD</h1>
      <h4>Tracked Hours for the Week</h4>
        <div class="graphMain">
          <?php
          require_once ("settings.php");
          require_once ("tablefunctions.php");
          $conn = @mysqli_connect(DB_HOST, DB_USER, DB_PSWD)
          or die('Failed to connect to server.');

          @mysqli_select_db($conn, DB_NAME)
          or die('Database not available');


          $query = "SELECT SUM(tripTime)/10000 FROM logbookData WHERE driver_id = $driverId";
          $results = mysqli_query($conn, $query);
          $queryn = "SELECT SUM(nightTime) FROM logbookData WHERE driver_id = $driverId";
          $resultsn = mysqli_query($conn, $queryn);

          echo "<table>";
          echo "<tr><th>Total Hours Driven</th><th>Total Night Hours Driven</th></tr>";
          $rowt = mysqli_fetch_row($results);
          $rown = mysqli_fetch_row($resultsn);
          while ($rowt && $rown)
          {
            echo "<tr><td>{$rowt[0]}</td><td>{$rown[0]}</td></tr>";
            $rowt = mysqli_fetch_row($results);
            $rown = mysqli_fetch_row($resultsn);

          }
          echo "</table>";

            ?>
        </div>
      <br>

      <fieldset>
        <legend>Last 5 Logs</legend>
        <div class="graphSecondary">
          <?php
          require_once ("settings.php");
          require_once ("tablefunctions.php");
          $conn = @mysqli_connect(DB_HOST, DB_USER, DB_PSWD)
          or die('Failed to connect to server.');

          @mysqli_select_db($conn, DB_NAME)
          or die('Database not available');


          $query = "SELECT * FROM logbookData WHERE driver_id = $driverId ORDER BY date DESC LIMIT 5";
          $results = mysqli_query($conn, $query);

          echo "<table>";
          echo "<tr><th>Date</th><th>Registration Number</th><th>Start Time</th><th>Finish Time</th><th>Trip Time</th><th>Hours driven at night</th><th>Odometer Start</th><th>Odometer Finish</th><th>Weather Conditions</th><th>Traffic Conditions</th></tr>";
          $row = mysqli_fetch_row($results);
          while ($row)
          {
            echo "<tr><td>{$row[1]}</td>";
            echo "<td>{$row[2]}</td>";
            echo "<td>{$row[3]}</td>";
            echo "<td>{$row[4]}</td>";
            echo "<td>{$row[5]}</td>";
            echo "<td>{$row[6]}</td>";
            echo "<td>{$row[7]}</td>";
            echo "<td>{$row[8]}</td>";
            echo "<td>{$row[9]}</td>";
            echo "<td>{$row[10]}</td></tr>";
            $row = mysqli_fetch_row($results);
          }
          echo "</table>";
            ?>
        </div>
      </fieldset>

      <h2>Latest Instructor Comments/Suggestions</h2>

    </div>

    <div class="rightside">
        <div class="space" >Image</div>
      </br>
        <div class="space" >Image</div>
      </br>
        <div class="space" >Image</div>
      </br>
        <div class="space " >Image</div>
    </div>

  </div>



<div class="navbar">
    <a href="dashboard.php" >My Dashboard</a>
    <a href="about.php" >About</a>
    <a href="account.php" >My Account</a>
    <a href="logs.php" >My Logs</a>
</div>


</body>
</html>
