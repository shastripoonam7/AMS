<?php
session_start();
$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");
$id=$_POST['name'];
$dt=$_POST['date'];
$sub=$_POST['sub'];
$sem=$_POST['sem'];
$sql="select subject_id from subject where Subject_name='$sub'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
         $subid=$row["subject_id"];
		}
}
foreach($id as $sid)
{
$sql = "INSERT INTO tblattendence(s_id,subject_id,tdate,semister)
VALUES ('$sid', '$subid', '$dt','$sem')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['pass']=1;
	header('Location: takeattendence1.php');
} else {
	$_SESSION['failed']=1;
    header('Location: takeattendence1.php');
}
}


echo "hello";
?>