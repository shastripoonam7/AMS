<?php
session_start();
$tname=$_POST['tname'];
$email=$_POST['email'];
$phno=$_POST['phno'];
$sub1=$_POST['sub1'];
$sub2=$_POST['sub2'];
$sub3=$_POST['sub3'];
$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");
$sql = "INSERT INTO teacher(tname,email,phone_no,subject1,subject2,subject3)
VALUES ('$tname', '$email', '$phno','$sub1','$sub2','$sub3')";
if (mysqli_query($conn, $sql)) {
	$_SESSION['pass']=1;
	header('Location:teacher_insert.php');
    
} else {
	$_SESSION['failed']=1;
header('Location:teacher_insert.php');
}

mysqli_close($conn);

?>