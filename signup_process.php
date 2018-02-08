<?php
session_start();
$type=$_POST['type'];
$un=$_POST['username'];
$pass=$_POST['password'];
$cpass=$_POST['cpassword'];
echo $type;
echo $un;
echo $pass;
echo $cpass;

if($pass==$cpass)
{
   $conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
   $db=mysqli_select_db($conn,"attendencedb");
   $sql = "INSERT INTO login(login_type,Username,Password)
       VALUES ('$type','$un','$pass')";
     if (mysqli_query($conn, $sql)) {
	$_SESSION['pass']=1;
	header('Location:sign_up.php');
    
     } else {
	$_SESSION['failed']=1;
       header('Location:sign_up.php');
       }

mysqli_close($conn);
}
else
{
$_SESSION['wrong_input']='1';
header('Location:sign_up.php');
}
?>