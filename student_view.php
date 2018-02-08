<?php
session_start();
$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");
$sql = "Select * from student";
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
      <li ><a href="admin_homepage.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="teacher.php">Teacher <span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li><a href="teacher_insert.php">Add Teacher</a></li>
          <!--li><a href="teacher_update.php">Update Teacher</a></li-->
          <li><a href="teacher_view.php">View Teacher</a></li>
        </ul>
      </li>
      <li class="active" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="teacher.php">Student<span class="caret"></span></a>
        <ul class="dropdown-menu">
<li><a href="student_insert.php">Add Student</a></li>
          <!--li><a href="student_update.php">Update Student</a></li-->
          <li><a href="student_view.php">View Student</a></li>
		  <!--li><a href="#">Search Student</a></li-->
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
  <h3>All Student Record:</h3>
  <form>
<table  >
<tr>
  <th>Id</th>
  <th>Name</th>
  <th>Address</th>
  <th>Phone No</th>
  <th>Email id</th>
  <th>Student class</th>
  <th>Action</th>
</tr>
  	<?php
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	//echo "<table border='1' style='padding:3px 3px 3px 3px;'>";
    while($row = $result->fetch_assoc()) {
      $s_id = $row["s_id"];
        echo "<tr><td> " . $row["s_id"]. "</td>";
		echo "<td> " . $row["sname"]. "</td>"; 
		echo "<td> " . $row["sadd"]. "</td>"; 
		echo "<td> " . $row["sphno"]. "</td>"; 
	    echo "<td> " . $row["semailid"]. "</td>"; 
		echo "<td> " . $row["semister"]. "</td>"; 
	    echo "<td><a class='btn btn-primary' href='student_update.php?id=$s_id' >Update</a></td></tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
	?>	
	</table>
  </form>
</div>

</body>
</html>