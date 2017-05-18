<?php
error_reporting(E_ERROR|E_PARSE);
$email=$_POST['checkemail'];
$status= "";
$db="test";
$con=mysqli_connect("localhost","root","","$db");

$result=mysqli_query($con,"SELECT * from login WHERE email = '".$email."'");
$check=mysqli_num_rows($result);
if($check>=1){
$status= "Email is already exists try another";

}
else{

$status= "your information is saved successfully";
}
echo $status;
?>
