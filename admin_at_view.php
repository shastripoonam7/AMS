<?php 
  session_start();
$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendence view page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
  table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 15px;
}
  </style>
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
      <li ><a href="admin_homepage.php">Home</a></li>
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
      <li class="active"><a href="att.php">View Attendence</a> </li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="log_out.php"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Welcome you can see attendence of student ....</h3>
                <p>
			     	<label style="margin-left:10px;">Select semister:</label>
			    <select id='sem' name="sem" style="margin-left:4px;">
				   <?php
				$sql1="select distinct semister from subject";
				$result1=$conn->query($sql1);
				if($result1->num_rows>0)
				{
					while($row=$result1->fetch_assoc())
					{
						
						echo "<option value='".$row['semister']."'>".$row['semister']."</option>";
					}
				}
				
				?>
			    </select><br>
				<div id="res"></div>
				 <script src="js/jquery.min.js"></script>
                       <script>
                          function makeAjaxRequest(opts){
                              $.ajax({
                                type: "POST",
                                data: { opts: opts },
                                url: "at_view.php",
                                success: function(res) {
                                $("#res").html(res);

                                }
                             });
							 
                            }

                         $("#sem").on("change", function(){
                         var selected = $(this).val();
						 
                         makeAjaxRequest(selected);
                         });
                      </script>
                </p>
</div>

</body>
</html>