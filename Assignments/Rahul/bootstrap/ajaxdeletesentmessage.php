<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
$deletemessage=$_POST['checkarray'];
$fromfriend=$_SESSION["name"];
$fromfriendid=$_SESSION["id"];
date_default_timezone_set('Asia/Kolkata');
$date=date('d-m-Y');
$time=date('h-i-s');
$tofriend="";
$tofriendid="";
$db="test";
$con=mysqli_connect("localhost","root","",$db);

if($deletemessage!="")
{

foreach($deletemessage as $deletemessageid)
{
$result1 = mysqli_query($con,"DELETE FROM message where id='".$deletemessageid."'");
}

}
?>