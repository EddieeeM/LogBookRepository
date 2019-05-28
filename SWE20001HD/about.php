<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="About Page of website" />
        <meta name="author" content="Edeser III Monserrate, 102347754" />
        <meta name="keywords" content="About, SWE20001, logbook" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>About</title>
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
	  <a href="logout_script.php"><button name="logout">LOGOUT</button></a>
      <h2>Benefits from switching to a digital logbook</h2>
      <div class="graphSecondary"><img src = "images/passrategraph.png" ></img></div>
        <h5>Since 2016, the average pass rate has increased by 45%!</h5>
        <ul>
            <li>Learners are more confident coming into the test</li>
            <li>Studies have shown learners getting through the compulsory 150 hours more diligently</li>
            <li>Overall crash statistic for red P drivers have decreased by 60%!</li>
        </ul>
      <div class="graphSecondary"><img src = "images/graphcrashrate.png" ></img></div>
      <br>
  </div>

    <div class="main">
      <h1>ABOUT</h1>
      <h4>How to use VicRoads' Digital Logbook</h4>
        <!-- <div class="graphMain">
            <p>Insert Graph Here</p>
        </div> -->
        <p>Moving on from the traditional paper and pen method of logging your learner hours. </br>
        This website will allow you as an instructor/parent to easily monitor your student/child's progress.</p>
        <p>Below are the requirements from yourself and the learner...</p>

        <fieldset>
        <table>
            <legend>Requirements</legend>
                <thead>
                <tr>
                  <th>Learner's Details Details</th>
                  <th>Instructor's Details</th>
                  <th>Vehicle Details</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                        <ul>
                            <li>Learner's Name</li>
                            <li>Learner's Age</li>
                            <li>Current Driving Experience</li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li>Instructor's Name</li>
                            <li>Instructor's Age</li>
                            <li>Years spent driving</li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li>Make</li>
                            <li>Model</li>
                            <li>Transmission</li>
                            <li>Electronic Driver Aides</li>
                        </ul>
                    </td>
                  </tr>
                </tbody>
              </table>

              <p>These can be submitted in the <a href="account.html">page</a> below.</a></p>
              </fieldset>
              
        </fieldset>
    </div>

    <div class="rightside">
        <article id="customer_reviews">
            <h3>Previous Learner Driver's and Instructor's Reviews</h3>
            
              <strong>Matt (Former Learner Driver):</strong>
                <div class="spacePortrait"><img src="images/matt.jpg"></img></div>
                Seeing how to old logbook system worked, 
                i was worried that i will take forever to finish getting through my learners 
                being the forgetful person i am at writing things into a logbook. 
                
                Having the requirement to use this while driving makes me feel like i am actually 
                progressing through my learners in a formal manner.
              
        </br>
        </br>
              
              <strong>Dave (Instructor at Road2P's):</strong> 
                <div class="spacePortrait" ><img src="images/dave.jpg"></img></div>
                One word: Efficient; VicRoads have done an excellent job 
                at making a digital logbook. This will hopefully prepare more people for solo driving as
                it prevents them from cheating like in the old system.
                
                Minor improvements can be placed but overall a solid tool for new drivers and their instructors.
              
            
        </article >
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