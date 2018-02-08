<?php 
  session_start();
$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
<div  class="page-header"> 
		<h1 style="padding-left:15px;color:#A9A9A9;">Attendence management System</h1>
        </div>
  <div class="container-fluid">
    <!--div class="navbar-header">
      <a class="navbar-brand" href="#">Attendence Management System</a>
    </div-->
    <ul class="nav navbar-nav">
      <li class="active"><a href="admin_homepage.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Teacher <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="teacher_insert.php">Add Teacher</a></li>
          <!--li><a href="teacher_update.php">Update Teacher</a></li-->
          <li><a href="teacher_view.php">View Teacher</a></li>
		  <!--li><a href="teacher_search.php">Search Teacher</a></li-->
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Student<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="student_insert.php">Add Student</a></li>
          <!--li><a href="student_update.php">Update Student</a></li-->
          <li><a href="student_view.php">View Student</a></li>
		  <!--li><a href="student_search.php">Search Student</a></li-->
        </ul>
      </li>
	  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Subject<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="subject_insert.php">Add Subject</a></li>
          <!--li><a href="subject_update.php">Update Subject</a></li-->
          <li><a href="subject_view.php">View Subjects</a></li>
		  <!--li><a href="student_search.php">Search Student</a></li-->
        </ul>
      </li>
      <li><a href="admin_at_view.php">View Attendence</a> </li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="log_out.php"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Welcome Admin!</h3>
                <p>
                “Attendance Management System” is software developed for
                 maintaining the attendance of the student on the daily basis in the collage. Here the staffs, who are handling the subjects,
                 will be responsible to mark the attendance of the students. 
                 Each staff will be given with a separate username and password based on the subject they handle. </p>
                <p>We have provided 3 login: <br>
				<ol>
				<li>Admin - Admin can insert, update student and  teacher information.</li>
				<li>Teacher - Teacher can take,view student attendence.</li>
				<!--li>Student - Student can view his or her attendence and give feedback about teacher.</li-->
				</ol></p>
</div>

</body>
</html>