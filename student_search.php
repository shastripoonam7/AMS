<?php
session_start();
$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student View Record Page</title>
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
      <li ><a href="teacher_homepage.php">Home</a></li>
      <li><a href="takeattendence1.php">Take attendence</a>
        
      </li>
      </li>
      <li class="active" "class="dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#">Student<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li ><a href="student_search.php">Search Student</a></li>
          <li><a href="student_view1.php">View Student</a></li>
		  <!--li><a href="student_search.php">Search Student</a></li-->
        </ul>
      </li>
       <li  ><a href="attendence_view.php">View Attendence</a></li>
      </li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="log_out.php"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Student Record:</h3>
  <p>
   <label>Enter student Id:</label><input type="number" name="text" id="txt" maxlength='4' size='4' required>
      <script src="js/jquery.min.js"></script>
    <script>
      function makeAjaxRequest(opts){
        $.ajax({
          type: "POST",
          data: { opts: opts },
          url: "getat.php",
          success: function(res) {
            $("#result").html(res);
          }
        });
      }

      $("#txt").on("change", function(){
        var selected = $(this).val();
        makeAjaxRequest(selected);
      });
    </script>
  </p>
  <div id="result">

	</div>
</div>

</body>
</html>