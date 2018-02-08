<?php
session_start();
$conn=mysqli_connect("localhost","root","") or die("Error in connecting to database ".mysql_error());
$db=mysqli_select_db($conn,"attendencedb");
$sem=$_POST['opts'];
$sql="select tblattendence.s_id,sname,Subject_name,tblattendence.semister,count(tblattendence.subject_id) as 'cnt' from student,subject,tblattendence where tblattendence.semister='$sem' and
tblattendence.s_id=student.s_id and tblattendence.subject_id=subject.subject_id group by tblattendence.subject_id,tblattendence.s_id order by tblattendence.s_id asc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   echo "<table border='1'>";
   echo "<tr><th>student id</th><th>sname</th><th>Subject_name</th><th>semister</th><th>total count</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
		  echo "<td>".$row['s_id']."</td>";
		  echo "<td>".$row['sname']."</td>";
		  echo "<td>".$row['Subject_name']."</td>";
		  echo "<td>".$row['semister']."</td>";
		  echo "<td>".$row['cnt']."</td>";
	    echo "</tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

?>