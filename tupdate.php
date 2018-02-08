<?php
session_start();
$tid=$_POST['tid'];
$tname=$_POST['tname'];
$email=$_POST['email'];
$phno=$_POST['phno'];
$sub1=$_POST['sub1'];
$sub2=$_POST['sub2'];
$sub3=$_POST['sub3'];
$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");
$sql = "UPDATE teacher SET tname='$tname',email='$email',phone_no=$phno,
subject1='$sub1',subject2='$sub2',subject3='$sub3' WHERE t_id='$tid'";
if (mysqli_query($conn, $sql)) {
	$_SESSION['passupdate']=1;
	header('Location:teacher_view.php');
    
} else {
	$_SESSION['failedupdate']=1;
	header('Location:teacher_view.php');
}

mysqli_close($conn);

?>