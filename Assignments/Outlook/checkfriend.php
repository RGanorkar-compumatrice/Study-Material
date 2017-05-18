<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
$name=$_POST['Name'];

$city=$_POST['City'];
$mobile=$_POST['Mobile'];
$frid=$_SESSION["id"];
$db="user";
$con=mysqli_connect("localhost","root","",$db);


$result = mysqli_query($con,"SELECT id FROM login where name='".$name."'");
while($row=mysqli_fetch_array($result)){

$lid=$row['id'];




}

$count=mysqli_query($con,"insert into friend(name, city, mobile, user_id, logid) values ('".$name."', '".$city."', '".$mobile."', '".$frid."', '".$lid."')");

if(count==true)
{
header("location:friendlist.php");
}

?> 