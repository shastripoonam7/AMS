<?php
session_start();
$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");
$id=$_POST['opts'];
$sql = "Select Subject_name from subject where semister='$id'";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
   // echo "<select>";
    while($row = $result->fetch_assoc()) {
        echo "<option value='".$row['Subject_name']."'>".$row['Subject_name']."</option>";
	    
    }
	//echo "</select>";
} else {
    echo "0 results";
}
$conn->close();
?>
 