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

    <div class="main">
      <h1>MY LOGS</h1>
      <h4>Tracked Hours for the Week</h4>
        <div class="graphSecondary">
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

      <form method="post" action="logadd.php">
      <fieldset>
          <legend>Update Logs</legend>
          </br>
              <span>
                  <label for="Date">Date: </label>
                  <input type="date" name="dateLog" id="dateLog"
                  maxlength="25" placeholder="e.g 20/07/2012" />
              </span>
              <span>
                  <label for="rego">Registration: </label>
                  <input type="text" name="rego" id="rego"
                  maxlength="10"/>
              </span>
              <span>
                  <label for="Time">Starting Time: </label>
                  <input type="time" name="starttime" id="starttime"/>
              </span>

              <span>
                  <label for="Time">End Time: </label>
                  <input type="time" name="endtime" id="endtime" />
              </span>

              <p>
                <span>
                    <label for="nighttime">Nightime Hours: </label>
                    <input type="number" name="nighttime" id="nighttime" />
                </span>
              <span>
                  <label for="startOdometer">Starting Odometer: </label>
                  <input type="text" name="startOdometer" id="startOdometer"/>
              </span>

              <span>
                  <label for="endOdometer">Ending Odometer: </label>
                  <input type="text" name="endOdometer" id="endOdometer" />
              </span>

              </p>

          <div id="Conditions">
          <span>
              <label for="dry">Dry </label>
              <input type="radio" name="weatherConditions" id="dry" value="Dry" />
          </span>
          <span>
              <label for="wet">Wet</label>
              <input type="radio" name="weatherConditions" id="wet" value="Wet" />
          </span>
          <span>
              <label for="lighttraffic">Light Traffic</label>
              <input type="radio" name="trafficConditions" id="lighttraffic" value="Light Traffic" />
          </span>
          <span>
              <label for="moderatetraffic">Moderate Traffic</label>
              <input type="radio" name="trafficConditions" id="moderatetraffic" value="Moderate Traffic" />
          </span>
          <span>
              <label for="heavytraffic">Heavy Traffic</label>
              <input type="radio" name="trafficConditions" id="heavytraffic" value="Heavy Traffic" />
          </span>
          </div>

          <button type="submit">Submit</button>
      </br>

      </fieldset>
      </form>

      <fieldset>
        <legend>LOGBOOK HISTORY</legend>
        <div class="graphSecondary">
          <?php
          require_once ("settings.php");
          require_once ("tablefunctions.php");
          $conn = @mysqli_connect(DB_HOST, DB_USER, DB_PSWD)
          or die('Failed to connect to server.');

          @mysqli_select_db($conn, DB_NAME)
          or die('Database not available');


          $query = "SELECT * FROM logbookData WHERE driver_id = $driverId ORDER BY date DESC";
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

      <h2>Insert Instructor Comments Here</h2>


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
