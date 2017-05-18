<?php

error_reporting(E_ERROR|E_PARSE);
$fid=$_GET['eid'];



$db="user";
$con=mysqli_connect("localhost","root","",$db);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"DELETE FROM friend where id='".$fid."'");
while($result==true) {
header("Location:friendlist.php");
}
?>

