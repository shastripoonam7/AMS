<?php
session_start();
$sid=$_POST['subid'];
$sname=$_POST['sname'];
$sem=$_POST['sem'];

$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");
$sql = "UPDATE subject SET Subject_name='$sname',semister='$sem' WHERE subject_id='$sid'";
if (mysqli_query($conn, $sql)) {
	$_SESSION['passupdate']=1;
	header('Location:subject_view.php');
    
} else {
	$_SESSION['failedupdate']=1;
	header('Location:subject_view.php');
}

mysqli_close($conn);
?>