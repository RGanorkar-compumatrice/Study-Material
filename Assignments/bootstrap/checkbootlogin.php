<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
$Password=$_POST['Password'];
$email=$_POST['Email'];
$username=$_POST['username'];
$signPassword=$_POST['signPassword'];
$signemail=$_POST['signEmail'];
$uPassword="";
$uemail="";
$uid="";
$uname="";
$sname="";
$semail="";
$db="test";
$con=mysqli_connect("localhost","root","",$db);
//for login
$result=mysqli_query($con,"select * from login where password='".$Password."' And email='".$email."'");
while($row=mysqli_fetch_array($result))
{
$uid=$row['id'];
$uname=$row['name'];
$uemail=$row['email'];
$uPassword=$row['password'];
}
if($Password=="" && $email=="")
{
header("Location:bootlogin.php");
}
else if($Password===$uPassword && $email===$uemail)
{
$_SESSION["id"]=$uid;
$_SESSION["name"]=$uname;
header("Location:profile.php");
}
else
{
header("Location:bootlogin.php");
}
//for sign up
$result2=mysqli_query($con,"select * from login where name='".$username."' And email='".$signemail."'");
while($row=mysqli_fetch_array($result2))
{
$sname=$row['name'];
$semail=$row['email'];
}
if($sname!=$username && $semail!=$signemail && $username!="" && $signemail!="")
{
$result1=mysqli_query($con,"insert into login(name, password, email) values ('".$username."','".$signPassword."', '".$signemail."')");
while($row=mysqli_fetch_array($result1))
{
header("Location:bootlogin.php");
}
}
else{
}



?>
