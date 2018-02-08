<?php
$uname=$_POST['username'];
$pass=$_POST['password'];
$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");
$sql_q="select Username from login where Password='$pass' and Username='$uname' and login_type='teacher'";
$sql=mysqli_query($conn,$sql_q);
$nr=mysqli_num_rows($sql);
if($nr==1)
{
	$_SESSION['login_user']=$uname;
	header('Location:teacher_homepage.php');
	exit;
}
else
{
	$_SESSION['loginfailed']="failed";
	header('Location:index.php');
	exit;
}

?>