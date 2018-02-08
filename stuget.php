<?php
session_start();
$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");
$sem=$_POST['opts'];
$sql = "Select s_id,sname,semister from student where semister='$sem'";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	//echo "<table border='1' style='padding:3px 3px 3px 3px;'>";
	echo "<tr><th>Id</th><th>Name</th><th>Student class</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td><input type='checkbox' name=name[] value='".$row[s_id]."' > ".$row[s_id]." </td>";
		echo "<td> " . $row["sname"]. "</td>"; 
		
		echo "<td> " . $row["semister"]. "</td></tr>"; 
	    
    }
	
} else {
    echo "0 results";
}
$conn->close();
?>