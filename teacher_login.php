<!Doctype html>
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>login page</title>
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
		     <h3 class="profile-name-card"> <u>Teacher Login</u></h3>
            <img id="profile-img" class="profile-img-card" src="img/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="teacherlogin_process.php" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputUsername" name="username" maxlength="10"  class="form-control" placeholder="Username" required autofocus>
                <input type="password" id="inputPassword"  name="password" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <!--label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label-->
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Log in</button>
            </form><!-- /form -->
            <a href="sign_up.php" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
  </body>
</html>