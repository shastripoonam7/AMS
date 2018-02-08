<?php
session_start();
$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");

  // Database logic here

  //echo '<pre>'; 
  //print_r($_POST);
  $id=$_POST['opts'];
  //echo '</pre>';
  	$sql = "Select * from student where s_id='$id'";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	//echo "<table border='1' style='padding:3px 3px 3px 3px;'>";
	echo "<table border='1'>";
	echo "<tr><th>Id</th><th>Name</th><th>Address</th><th>Phone No</th><th>Email id</th><th>Student class</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["s_id"]. "</td>";
		echo "<td> " . $row["sname"]. "</td>"; 
		echo "<td> " . $row["sadd"]. "</td>"; 
		echo "<td> " . $row["sphno"]. "</td>"; 
	    echo "<td> " . $row["semailid"]. "</td>"; 
		echo "<td> " . $row["semister"]. "</td></tr>"; 
	    
    }
	echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
 
