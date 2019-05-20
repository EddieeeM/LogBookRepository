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
      <h1>MY LOGS</h1>
      <h4>Tracked Hours for the Week</h4>
        <div class="graphSecondary">
            <p>Insert Graph Here</p>
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
                  <label for="DrivingTime">Day or Nightime: </label>
                  <select name="DrivingTime" id="DrivingTime">
                    <option value="">Please Select...</option>
                    <option value="Dawn" name="Dawn" id="Dawn">Dawn</option>
                    <option value="DayTime" name="DayTime" id="DayTime">Day</option>
                    <option value="Dusk" name="Dusk" id="Dusk">Dusk</option>
                    <option value="NightTime" name="NightTime" id="NightTime">Night</option>
                  </select>

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
            <table>
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Time Started</th>
                  <th>Time Ended</th>
                  <th>Car Used/Car Rego</th>
                  <th>Starting Odometer</th>
                  <th>Ending Odometer</th>
                  <th>Day or Nightime?</th>
                  <th>Conditions of the Road</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>06/05/2019</td>
                      <td>5:23pm</td>
                      <td>6:45pm</td>
                      <td>1TR6XY - Civic</td>
                      <td>103478</td>
                      <td>103510</td>
                      <td>Nighttime</td>
                      <td>Wet, Heavy Traffic</td>
                    </tr>
                    <tr>
                        <td>05/05/2019</td>
                        <td>10:41am</td>
                        <td>12:45pm</td>
                        <td>1TR6XY - Civic</td>
                        <td>103358</td>
                        <td>103450</td>
                        <td>Daytime</td>
                        <td>Dry, Light Traffic</td>
                    </tr>
                    <tr>
                        <td>31/04/2019</td>
                        <td>9:01am</td>
                        <td>9:42am</td>
                        <td>8PV9RT - i30</td>
                        <td>145870</td>
                        <td>145895</td>
                        <td>Daytime</td>
                        <td>Dry, Moderate Traffic</td>
                    </tr>
                    <tr>
                        <td>30/04/2019</td>
                        <td>8:21pm</td>
                        <td>9:30pm</td>
                        <td>1TR6XY - Civic</td>
                        <td>103208</td>
                        <td>103239</td>
                        <td>Nighttime</td>
                        <td>Wet, Light Traffic</td>
                    </tr>
                    <tr>
                        <td>30/04/2019</td>
                        <td>4:20pm</td>
                        <td>5:45pm</td>
                        <td>1TR6XY - Civic</td>
                        <td>103189</td>
                        <td>103208</td>
                        <td>Dusk</td>
                        <td>Wet, Moderate Traffic</td>
                    </tr>
              </tbody>
            </table>
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
    <a href="dashboard.html" >My Dashboard</a>
    <a href="about.html" >About</a>
    <a href="account.html" >My Account</a>
    <a href="logs.html" >My Logs</a>
</div>


</body>
</html>
