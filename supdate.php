<?php
session_start();
$sid=$_POST['sid'];
$sname=$_POST['sname'];
$address=$_POST['address'];
$phno=$_POST['phno'];
$email=$_POST['email'];
$sclass=$_POST['sclass'];
//echo $sid. " ".$sname." ".$address." ".$phno." ".$email." ".$sclass;
$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb") or die("Error in connecting to database ".mysql_error());
//sname,sadd,sphno,semailid,sclass
$sql = "UPDATE student SET sname='$sname',sadd='$address',sphno='$phno',
semailid='$email',semister='$sclass' WHERE s_id='$sid'";
if (mysqli_query($conn, $sql)) {
	$_SESSION['passupdate']=1;
	header('Location:student_view.php');
    //echo "Succesfull";
} else {
	$_SESSION['failedupdate']=1;
	header('Location:student_view.php');
	//echo "not";
}

 
mysqli_close($conn);
//*/
?>