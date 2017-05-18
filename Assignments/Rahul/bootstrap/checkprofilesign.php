<?php
session_start();
error_reporting(E_ERROR|E_PARSE);

$fromfriend=$_SESSION["name"];
$fromfriendid=$_SESSION["id"];
$username=$_POST['username'];
$signPassword=$_POST['signPassword'];
$signemail=$_POST['signEmail'];
date_default_timezone_set('Asia/Kolkata');
$date=date('d-m-Y');
$time=date('h-i-s');

$sname="";
$semail="";
$db="test";
$con=mysqli_connect("localhost","root","",$db);

//for sign up
if (isset($_POST['signsave'])) {
$result5=mysqli_query($con,"select email from login where email='".$signemail."' and id!='".$fromfriendid."'");
while($row=mysqli_fetch_array($result5))
{
$semail=$row['email'];
}
if($username!="" && $signemail!="" && $signPassword!="" && empty($semail))
{
$result4=mysqli_query($con,"Update login set name = '".$username."', password = '".$signPassword."', email = '".$signemail."' 
where id = '".$fromfriendid."'");


header("Location:bootlogin.php");
}
else{
header("Location:profile.php");
}
}
else
{
header("Location:profile.php");
}

?>