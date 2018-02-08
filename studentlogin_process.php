<?php
$uname=$_POST['username'];
$pass=$_POST['password'];
$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");
$sql_q="select Username from login where Password='$pass' and Username='$uname' and login_type='student'";
$sql=mysqli_query($conn,$sql_q);
$nr=mysqli_num_rows($sql);
if($nr==1)
	echo "login successfull";
else
	echo "check your password or username";

?>