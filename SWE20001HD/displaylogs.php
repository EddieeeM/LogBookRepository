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
    require_once ("settings.php");
    require_once ("tablefunctions.php");
    $conn = @mysqli_connect($host, $user, $pswd)
    or die('Failed to connect to server');
    @mysqli_select_db($conn, $dbnm)
    or die('Database not available');

      $query = 'SELECT * FROM logbookData;';
      $results = mysqli_query($conn, $query);

      echo "<table width = '100%' border = '1'>";
      echo "<tr><th>Date</th><th>Registration Number</th><th>Start Time</th><th>Finish Time</th><th>Trip Time</th><th>Total Time</th><th>Odometer Start</th><th>Odometer Finish</th><th>Weather Conditions</th<th>Traffic Conditions</th></tr>";
      $row = mysqli_fetch_row($results);
      while ($row)
      {
        echo "<tr><td>{$row[0]}</td>";
        echo "<td>{$row[1]}</td>";
        echo "<td>{$row[2]}</td>";
        echo "<td>{$row[3]}</td></tr>";
        $row = mysqli_fetch_row($results);
      }
      echo "</table>";

      mysqli_free_result($results);
      mysqli_close($conn);

    ?>

  </body>
</html>
