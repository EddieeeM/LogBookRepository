<!-- Forgot Password -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Login Page for the Logbook" />
        <meta name="author" content="Edeser III Monserrate, 102347754" />
        <meta name="keywords" content="Login, SWE20001, logbook" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Forgot Password</title>
        <link href= "styles/styleFinal.css" rel="stylesheet" />
    </head>
	
	<body>
	  <div class="header">
	  
	  </div>
	  
	  <div class="loginform">
	    <img id="loginlogo" src="images/logo.jpg" alt="logo" />
    
        <h2>LOGIN</h2>
	    <form action="forgotpswd.php" method="POST">
          <p>Username: </p>
            <input type = "text" id = "UserName" name = "UserName" />
          <p>New Password: </p>
            <input type = "password" id = "UserPwd" name = "UserPwd" />
        
        </br>
        </br>

          <button type="submit" class="btn-text">Change PASSWORD</button>
	    </form>

        </br>
        <a href="login.php">
	    <button href="login.php" class="btn-forpass" >Return to LogIn</button>
	    </a>

      </div>
	  
	  <?php
	    
	  ?>
	  
	</body>
</html>