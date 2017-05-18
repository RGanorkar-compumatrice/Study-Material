

<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
$email=$_POST['checkemail'];
$password=$_POST['checkpassword'];
$status= "";
$db="test";
$con=mysqli_connect("localhost","root","","$db");

$result=mysqli_query($con,"SELECT * from login WHERE email = '".$email."' and password='".$password."'");
$check=mysqli_num_rows($result);
if($check>=1){
$status= "You are successfully login";

}
else{

$status= "Invalid Email Or Password";
}
echo $status;
?>
