<!-- Account Page -->

<?php
  //Session Script.
  session_start();
  if(!isset($_SESSION["loggedin"])) {
	  $_SESSION["loggedin"] = false;
	  $_SESSION["driverId"] = "";
  }
  $driverId = $_SESSION["driverId"];
  $loggedInStatus = $_SESSION["loggedin"];
  $log = 0;
  if($loggedInStatus == true) {
	  //header("location:dashboard.php");
	  $log = 1;
  }
  
  echo "Log In Status is: " . $log . " the id of the user is: " . $driverId;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Account Page of website" />
        <meta name="author" content="Edeser III Monserrate, 102347754" />
        <meta name="keywords" content="Account, SWE20001, logbook" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>My Account</title>
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

    <fieldset>
	    <?php
		  //PHP Script for displaying the users updated data.
		  
		  //Variables
		  $user_id = $_SESSION["driverId"];
		  //Get Data from users.
		  require_once("settings.php");
		  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
		  $usergetquery = "SELECT driver_id, fname, lname, dob, email, phone FROM logbookUsers WHERE driver_id = '$user_id'";
		  $getUserDetails = mysqli_query($conn, $usergetquery);
		  $userdetResults = mysqli_fetch_row($getUserDetails);
		  
		  //Get Data from update.
		  
		  //Variables for data
		  $user_name = $userdetResults[1] . $userdetResults[2]; $user_dob = $userdetResults[3]; $user_licnum = $userdetResults[0];
		  $user_contactprefs = "Email, Mobile"; $user_mobile = $userdetResults[5]; $user_email = $userdetResults[4];
		  $user_address = "10 rockstar way"; $user_suburb = "bundoora"; $user_state = "Victoria";
		  $user_postcode = "3556";
		?>
		
        <legend>MY ACCOUNT</legend>
            <label for="learnergivenname">Name: </label>
            <span><?php echo $user_name; ?></span> 
            &nbsp;
            <label for="learnerage">D.O.B: </label>
            <span><?php echo $user_dob; ?></span>
            &nbsp;
            <label for="learnerlicencenum">Licence Number: </label>
            <span><?php echo $user_licnum; ?></span>
        </br>
            <label for="learnercontactpref">Preferred Contact Details: </label>
            <span><?php echo $user_contactprefs; ?></span> 
            &nbsp;
            <label for="learnerphone">Mobile: </label>
            <span><?php echo $user_mobile; ?></span> 
            &nbsp;
            <label for="learneremail">Email: </label>
            <span><?php echo $user_email; ?></span> 
            &nbsp;
        </br>
            <label for="street_address">Address: </label>
            <span><?php echo $user_address; ?></span> 
            &nbsp;
            <label for="suburb">Suburb: </label>
            <span><?php echo $user_suburb; ?></span> 
            &nbsp;
            <label for="state">State: </label>
            <span><?php echo $user_state; ?></span> 
            &nbsp;
            <label for="postcode">Postcode: </label>
            <span><?php echo $user_postcode; ?></span> 
            &nbsp;
    </fieldset>
<form method="post" action="update.html">
        
    </br>    
    <fieldset>
        <legend>Update Personal Details</legend>
        </br>
            <span>
                <label for="learnergivenname">Given Name: </label>
                <input type="text" name="givenname" id="givenname"
                maxlength="25" placeholder="e.g John" />
            </span>
            <span>
                <label for="learnerfamilyname">Family Name: </label>
                <input type="text" name="familyname" id="familyname"
                maxlength="25" placeholder="e.g Smith" />
            </span>

            <p>
                <label for="learneremail">Email Address: </label>
                <input type="text" name="email" id="email" placeholder="e.g someone@outlook.com" />
            </p>

            <p>
                <label for="learnerphone">Mobile: </label>
                <input type="tel" name="phone" id="phone" placeholder="0987-654-321" />
            </p>
    
        <div id="learnercontactpref">
        <span>
            <label for="e_mail">E-Mail </label>
            <input type="checkbox" name="contactpref" id="e_mail" value="E-Mail" />
        </span>
        <span>
            <label for="post_mail">Post/Mail </label>
            <input type="checkbox" name="contactpref" id="post_mail" value="Post Mail" />
        </span>
        <span>
            <label for="mobile">Mobile Phone</label>
            <input type="checkbox" name="contactpref" id="mobile" value="Mobile" />
        </span>
        </div>

    </br>
        <!--HOME ADDRESS-->
        <span><label for="street_address">Street Address</label>
            <input type="text" name="street_address" id="street_address"
            placeholder="e.g 123 Station St" maxlength="40" />
          </span>
          <span><label for="suburb">Suburb</label>
            <input type="text" name="suburb" id="suburb" placeholder="e.g St Kilda" />
          </span>
      
          <p>
            <label for="state">State: </label>
            <select name="state" id="state">
              <option value="">Please Select...</option>
              <option value="VIC" name="VIC" id="VIC">Victoria</option>
              <option value="NSW" name="NSW" id="NSW">New South Wales</option>
              <option value="QLD" name="QLD" id="QLD">Queensland</option>
              <option value="NT" name="NT" id="NT">Northern Territory</option>
              <option value="WA" name="WA" id="WA">Western Australia</option>
              <option value="SA" name="SA" id="SA">South Australia</option>
            </select>
          </p>
      
          <p>
            <label for="postcode">Postcode: </label>
            <input type="text" name="postcode" id="postcode" maxlength="4" />
          </p>

          <button type="submit">Submit</button>
		  
		  <?php
		    //PHP Script for processing user details and updating them in db.
			
			//Variables
		  ?>
		  
    </fieldset>

</br>
    
	<!-- Instructor Details (NOT TO BE TOUCHED) -->
    <fieldset>
        <legend>Instructor Details</legend>
        <label for="instructorgivenname">Name: </label>
            <span>[TestName]</span> 
            &nbsp;
            <label for="instructorage">Age: </label>
            <span>[TestAge]</span>
            &nbsp;
            <label for="instructorlicencenum">Licence Number: </label>
            <span>[TestLicence Num]</span>
        </br>
            <label for="instructorcontactpref">Preferred Contact Details: </label>
            <span>[TestContactPrefs]</span> 
            &nbsp;
            <label for="instructorphone">Mobile: </label>
            <span>[TestName]</span> 
            &nbsp;
            <label for="instructoremail">Email: </label>
            <span>[TestName]</span> 
            &nbsp;
        </br>  
    </fieldset> 

        </br>
        <fieldset>
        <legend>Update Instructor & Vehicle Details</legend>
        </br>
        
            <span>
                <label for="earnerlgivenname">Given Name: </label>
                <input type="text" name="givenname" id="givenname"
                maxlength="25" placeholder="e.g John" />
            </span>
            <span>
                <label for="instructorfamilyname">Family Name: </label>
                <input type="text" name="familyname" id="familyname"
                maxlength="25" placeholder="e.g Smith" />
            </span>

            <p>
                <label for="instructoremail">Email Address: </label>
                <input type="text" name="email" id="email" placeholder="e.g someone@outlook.com" />
            </p>

            <p>
                <label for="instructorphone">Mobile: </label>
                <input type="tel" name="phone" id="phone" placeholder="0987-654-321" />
            </p>
    
        <div id="instructorcontactpref">
        <span>
            <label for="e_mail">E-Mail </label>
            <input type="checkbox" name="contactpref" id="e_mail" value="E-Mail" />
        </span>
        <span>
            <label for="post_mail">Post/Mail </label>
            <input type="checkbox" name="contactpref" id="post_mail" value="Post Mail" />
        </span>
        <span>
            <label for="mobile">Mobile Phone</label>
            <input type="checkbox" name="contactpref" id="mobile" value="Mobile" />
        </span>
        </div>
        <button type="submit">Submit</button>

    </br>
        <fieldset>
            <legend>Register New Car</legend>
            <table>
                <thead>
                <tr>
                  <th>Make & Model</th>
                  <th>Year</th>
                  <th>Drivetrain</th>
                  <th>Electronic Driver Aides</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="carmake" id="carmake"
                            maxlength="20" placeholder="e.g Toyota" />
                        </td>
                        <td><input type="text" name="caryear" id="caryear"
                            maxlength="4" placeholder="e.g 2012" />
                        </td>
                        <td>
                            <p id="drivetrain">
                                <label for="Automatic">Automatic: </label>
                                  <input type="checkbox" id="Automatic" name="drivetrain" value="Automatic" />
                            </p>
                            <p>
                                <label for="Manual">Manual: </label>
                                  <input type="checkbox" id="Manual" name="drivetrain" value="Manual" /> 
                            </p>
                        </td>
                        
                        <td>
                            <p id="aides">
                                <span><label for="cruisecontrol">Cruise Control:</label>
                                  <input type="checkbox" id="c.Control" name="aides" value="c.Control" /> </span>
                            
                                <span><label for="reversecam">Reverse Camera: </label>
                                  <input type="checkbox" id="r.Cam" name="aides" value="r.Cam" /> </span>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit">Submit</button>
        </fieldset>
    </fieldset>
</form>
</div> <!--main end-->

    <div class="rightside">
        <h2>Registered Vehicle(s)</h2>
            <div class="space" >Image</div>
        </br>
            <div class="space" >Image</div>
        </br>
            <div class="space" >Image</div>
        </br>
    </div>

</div>  <!--row end-->



<div class="navbar">
    <a href="dashboard.html" >My Dashboard</a>
    <a href="about.html" >About</a>
    <a href="account.html" >My Account</a>
    <a href="logs.html" >My Logs</a>
</div>


</body>
</html>