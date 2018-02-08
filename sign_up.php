<!Doctype html>
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>Sign up page</title>
 <link rel="stylesheet" href="css/login.css" />
 <link rel="stylesheet" href="css/styles.css" />
 <script type="text/javascript" src="js/login.js"></script>
 <style>
 #inputUsername,#inputPassword
{
	direction: ltr;
    height: 44px;
    font-size: 16px;
}
</style>
</head>
  <body>
   <header><h1> Attendence Management System</h1></header>
       <div class="container">
        <div class="card card-container">
		     <h3 class="profile-name-card"> <u>Sign up</u></h3>
            <form class="form-signin" action="signup_process.php" method="post">
                <span id="reauth-email" class="reauth-email"></span>
				<label class="form-control" id='lab'style="direction: ltr; height: 44px;font-size: 16px;">Select type:</label>
				<select id="type" name="type" class="form-control">
				<option value="admin">admin</option>
				<option value="teacher">teacher</option>
				</select><br><br>
                <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Enter Username" required autofocus>
                <input type="password" id="inputPassword"  name="password" class="form-control" placeholder="Enter Password" required>
				<input type="password" id="cnfPassword"  name="cpassword" class="form-control" placeholder="Enter Confirm Password"  
				style="direction: ltr; height: 44px;font-size: 16px;"  required>
                
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign up</button>
				
            </form><!-- /form -->
			<a href="index.php" class="forgot-password">
               Home
            </a>
			
			<div>
			  <?php
                 session_start();
                 if(isset($_SESSION['pass']))	
                 echo "Sign up...";	
			     else if(isset($_SESSION['failed']))	
                 echo "somthing went wrong...";	
			     else if(isset($_SESSION['wrong_input']))
					echo "YOUR PASSWORD AND CONFIRM PASSWORD NOT MATCHING...";
			  ?>
			</div>
            
        </div><!-- /card-container -->
    </div><!-- /container -->
  </body>
</html>