<?php 
  session_start(); 
  $conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendence Page</title>
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
      <li><a href="teacher_homepage.php">Home</a></li>
      <li class="active"><a href="taketendence1.php">Take attendence</a>
        
      </li>

      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Student<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="student_search.php">Search Student</a></li>
          <li><a href="student_view1.php">View Student</a></li>
		  <!--li><a href="student_search.php">Search Student</a></li-->
        </ul>
      </li>
      <li  ><a  href="attendence_view.php">View Attendence</a>
      </li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="log_out.php"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Mark Attendence</h3>
  <p>Selecting date and subject name is compulsory for marking attendence if student present mark present.</p>
              <form id="f1" action="atdata.php" method="post">
			  <table >
			  <tr><td>
			  <label>Select date:</label>
			     <input type='date' name='date' value="<?php echo date("Y-m-d");?>"></td><td>
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
			    </select></td><td>
				<label style="margin-left:10px;">Select subject:</label>
			    <select id='sub' name='sub' style="margin-left:4px;">
				    <script src="js/jquery.min.js"></script>
                       <script>
                          function makeAjaxRequest(opts){
                              $.ajax({
                                type: "POST",
                                data: { opts: opts },
                                url: "subget.php",
                                success: function(res) {
                                $("#sub").html(res);

                                }
                             });
							 $.ajax({
                                type: "POST",
                                data: { opts: opts },
                                url: "stuget.php",
                                success: function(res) {
                                $("#tbl").html(res);

                                }
                             });
                            }

                         $("#sem").on("change", function(){
                         var selected = $(this).val();
                         makeAjaxRequest(selected);
                         });
                      </script>
			    </select></td></tr>
				</table><br></br>
							  <div id='tbl'></div>
							  <input type="submit" value="save" >
							<?php
				
				if(isset($_SESSION['failed']))
					echo "Sorry! Attendence not marked...";
				else if(isset($_SESSION['pass']))
					echo "Attendence of students saved....";
				?>  
							  
			  </form>
			  
</div>

</body>
</html>