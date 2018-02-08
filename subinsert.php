<?php
session_start();
$sname=$_POST['sname'];
$sem=$_POST['sem'];
$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");
$sql = "INSERT INTO subject(Subject_name,semister)
VALUES ('$sname','$sem')";
if (mysqli_query($conn, $sql)) {
	$_SESSION['pass']=1;
	header('Location:subject_insert.php');
    
} else {
	$_SESSION['failed']=1;
header('Location:subject_insert.php');
}

mysqli_close($conn);

?>