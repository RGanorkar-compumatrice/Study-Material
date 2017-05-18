<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
$email=$_POST['checkemail'];
$status= "";
$db="test";
$friendid=$_SESSION["id"];
$con=mysqli_connect("localhost","root","","$db");

$result=mysqli_query($con,"SELECT * from login WHERE email = '".$email."' and id!='".$friendid."'");
$check=mysqli_num_rows($result);
if($check>=1){
$status="Email is already exists try another";

}
else{

$status="your information is saved successfully, Please login with new email and password";
}
echo $status;
?>
