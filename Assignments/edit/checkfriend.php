<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
$name=$_POST['Name'];
$city=$_POST['City'];
$mobile=$_POST['Mobile'];
$frid=$_SESSION["id"];
$db="user";
$con=mysqli_connect("localhost","root","",$db);

$count=mysqli_query($con,"insert into friend(name, city, mobile, user_id) values ('".$name."', '".$city."', '".$mobile."', '".$frid."')");

if(count==true)
{
header("location:friendlist.php");
}

?> 