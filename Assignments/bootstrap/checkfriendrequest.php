
<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
//$friendrequest=$_POST['friendrequest'];
$friendrequest=$_POST['FriendRequest'];
$addfriendrequest=$_GET['findname'];
$acceptrequest=$_GET['aid'];
$deleterequest=$_GET['did'];
$removefriend=$_GET['rid'];
$fromfriendid=$_SESSION["id"];
$fromfriend=$_SESSION["name"];
$tofriendid="";
date_default_timezone_set('Asia/Kolkata');
$date=date('d-m-Y');
$time=date('h-i-s');
$status="Friends";
$db="test";
$con=mysqli_connect("localhost","root","","$db");
//for send request
$result=mysqli_query($con,"select id from login where name='".$friendrequest."'");
while($row=mysqli_fetch_array($result))
{
$tofriendid=$row['id'];
}
$count=mysqli_query($con,"select * from friendrequest where requestto='".$friendrequest."' and requestfrom='".$fromfriend."'");
$check=mysqli_num_rows($count);
	if($check>=1){
}
else
{
if($friendrequest!=""){
$result1=mysqli_query($con,"insert into friendrequest(requestfrom, requestto, requestfromid, requesttoid, date, time) values
 ('".$fromfriend."','".$friendrequest."', '".$fromfriendid."', '".$tofriendid."', '".$date."', '".$time."')");

 }
}

//for add friend
$result=mysqli_query($con,"select id from login where name='".$addfriendrequest."'");
while($row=mysqli_fetch_array($result))
{
$tofriendid=$row['id'];
}
$count=mysqli_query($con,"select * from friendrequest where requestto='".$addfriendrequest."' and requestfrom='".$fromfriend."'");
$check=mysqli_num_rows($count);
	if($check>=1){
}
else
{
if($addfriendrequest!=""){
$result1=mysqli_query($con,"insert into friendrequest(requestfrom, requestto, requestfromid, requesttoid, date, time) values
 ('".$fromfriend."','".$addfriendrequest."', '".$fromfriendid."', '".$tofriendid."', '".$date."', '".$time."')");

 }
}


if($acceptrequest!=""){
$count=mysqli_query($con,"select name from login where id='".$acceptrequest."'");
while($row=mysqli_fetch_array($count))
{
$friendname=$row['name'];
}
$count1=mysqli_query($con,"select * from friendlist where friendid='".$acceptrequest."' and loginuserid='".$fromfriendid."'
UNION select * from friendlist where friendid='".$fromfriendid."' and loginuserid='".$acceptrequest."'");
$check1=mysqli_num_rows($count1);
	if($check1>=1){
 $result3 = mysqli_query($con,"DELETE FROM friendrequest where requesttoid='".$fromfriendid."'");
}
else
{
	
$result2=mysqli_query($con,"insert into friendlist(friend, loginuser, friendid, loginuserid, date, time, status) values
 ('".$friendname."','".$fromfriend."', '".$acceptrequest."', '".$fromfriendid."', '".$date."', '".$time."', '".$status."')");
 
$result9=mysqli_query($con,"insert into friendlist(friend, loginuser, friendid, loginuserid, date, time, status) values
 ('".$fromfriend."','".$friendname."', '".$fromfriendid."', '".$acceptrequest."', '".$date."', '".$time."', '".$status."')");
 
 
 $result5=mysqli_query($con,"insert into userfriendlist(loginuser, friend, loginuserid, friendid) values 
 ('".$fromfriend."', '".$friendname."', '".$fromfriendid."', '".$acceptrequest."')");
 
 $result7=mysqli_query($con,"insert into userfriendlist(loginuser, friend, loginuserid, friendid) values 
 ('".$friendname."', '".$fromfriend."', '".$acceptrequest."', '".$fromfriendid."')");
 
 $result3 = mysqli_query($con,"DELETE FROM friendrequest where requesttoid='".$fromfriendid."'");
 }
}
else{}
 if($deleterequest!=""){
 
 $result4 = mysqli_query($con,"DELETE FROM friendrequest where requesttoid='".$fromfriendid."'");
 }
 
  if($removefriend!=""){
 
 $result6 = mysqli_query($con,"DELETE FROM userfriendlist where friendid='".$removefriend."' AND loginuserid='".$fromfriendid."'");
 $result8 = mysqli_query($con,"DELETE FROM userfriendlist where friendid='".$fromfriendid."' AND loginuserid='".$removefriend."'");
 $result10 = mysqli_query($con,"DELETE FROM friendlist where friendid='".$removefriend."' AND loginuserid='".$fromfriendid."'");
 $result11 = mysqli_query($con,"DELETE FROM friendlist where friendid='".$fromfriendid."' AND loginuserid='".$removefriend."'");
 
 }
 

header("location:profile.php");

?>
