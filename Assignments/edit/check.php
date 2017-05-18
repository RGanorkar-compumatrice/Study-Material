<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
$name=$_POST['Username'];
$pass=$_POST['Password'];
$uname="";
$upass="";
$uid="";

$db="user";
$con=mysqli_connect("localhost","root","",$db);

//if(mysqli_connect_errno()){

//echo "Error".mysqli_connect_error();}



$result=mysqli_query($con,"select * from login where name='".$name."' and password='".$pass."'");
while($row=mysqli_fetch_array($result))
{
//die("inside while check");
$uid=$row['id'];

$uname=$row['name'];
$upass=$row['password'];

}
//echo "User id=".$uid;
//die("<br>"."value id");

//echo $uname."database";
//echo "<br>";
//echo $upass."database";
//echo "<br>";

//echo $name."post";
//echo "<br>";
//echo $pass."post";


if($name===$uname && $pass===$upass)
{
//die("ch");
//echo "<script>";
//echo "alert('you are authorised user');";
//echo "</script>";
$_SESSION["id"]=$uid;
$_SESSION["name"]=$uname;
echo "Session id value=".$_SESSION["id"];
//die("val");
header("Location:main.php");


}
elseif($name===null && $pass===null)
{

echo "<script>";
echo "alert('you are not authorised user');";
echo "</script>";
header("Location:login.php");
}

else
{
echo "<script>";
echo "alert('you are not authorised user');";
echo "</script>";

header("Location:login.php");

}



?>
