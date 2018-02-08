<?php 
  session_start(); 
  $conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");
$sql = "SELECT * FROM student WHERE s_id = '".$_GET['id']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  //echo "<table border='1' style='padding:3px 3px 3px 3px;'>";
    while($row = $result->fetch_assoc()) {
      $s_id = $row["s_id"];
       $s_name = $row["sname"]; 
   $s_add = $row["sadd"]; 
   $s_phone = $row["sphno"]; 
     $s_email = $row["semailid"]; 
   $semister = $row["semister"]; 
          }
} else {
    echo "0 results";
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Update Record Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
  .button1 {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 8px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: #E6E6FA; 
    color: black; 
    border: 2px solid #4CAF50;
}
.button1:hover {
    background-color: #4CAF50;
    color: white;
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
  <h3>Fill up the following details to update student record:</h3>
     <form id="updateform" method="post" action="supdate.php">
                <p>
				<table style=" border-collapse:separate;border-spacing: 10px;">
				<tr><td>Enter ID</td>   <td>:</td>    <td><input type="text" id="sid" name="sid" class="form-control" value="<?php echo $s_id; ?>" required></td></tr><tr></tr>
				<tr><td>Enter name</td>   <td>:</td>    <td><input type="text" id="sname" name="sname" class="form-control" value="<?php echo $s_name; ?>" required></td></tr><tr></tr>
				<tr><td>Enter Adress</td>   <td>:</td>  
				<td rowspan="2"><textarea row="2" col="2" id="adress" name="address" class="form-control" required><?php echo $s_add; ?></textarea>
        </td></tr>
				<tr></tr>
				<tr><td>Enter phone no</td>   <td>:</td>    <td><input type="number" pattern="[0-9]{10}" id="phno"  maxlength="10" min="10"   name="phno" class="form-control number" value="<?php echo $s_phone; ?>"  required></td></tr>
				<tr><td>Enter email id</td>   <td>:</td>    <td><input type="email" id="email" name="email" class="form-control" value="<?php echo $s_email; ?>"  required></td></tr><br>
				<tr><td>Select semister</td>   <td>:</td>   
				<td>
				<select id="sclass" name="sclass" class="form-control"  required>
				<option value="<?php echo $semister; ?>" selected><?php echo $semister; ?></option>
				<?php
				$sql="Select distinct semister from subject";
				$result = $conn->query($sql);

                if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
                  echo "<option value=".$row['semister']."> " . $row["semister"]. "</option>";
		
                                            }
                  } 
                 $conn->close();  
				?>
				</select>
				</td></tr>
				<tr> <td></td>
				<td><input type="submit" value="update" class="btn btn-primary"></td>
				<td ><input type="reset" value="reset" class="btn btn-danger  "></td>
				</tr>
				<tr>
				<td colspan="3">
				<?php
				
				if(isset($_SESSION['failed']))
				{
					echo "Sorry! Data could not be save...";
					//$_SESSION['failed']=0;
				}
				else if(isset($_SESSION['pass']))
				{
					echo "Congratulation! Data updated successfully....";
					//$_SESSION['pass']=0;
				}
				?>
				</td>
				</tr>
				</table>
                </p>
      </form>				
</div>

</body>
</html>