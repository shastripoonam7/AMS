<?php
session_start();
$sname=$_POST['sname'];
$address=$_POST['address'];
$phno=$_POST['phno'];
$email=$_POST['email'];
$sclass=$_POST['sclass'];
$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");
$sql = "INSERT INTO student(sname,sadd,sphno,semailid,semister)
VALUES ('$sname', '$address', '$phno','$email','$sclass')";
if (mysqli_query($conn, $sql)) {
	$_SESSION['pass']=1;
	header('Location:student_insert.php');
    
} else {
	$_SESSION['failed']=1;
header('Location:student_insert.php');
}

mysqli_close($conn);
?>