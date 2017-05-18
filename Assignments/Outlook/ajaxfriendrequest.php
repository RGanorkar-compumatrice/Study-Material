
<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
$friendrequest=$_POST['friendrequest'];
$fromfriendid=$_SESSION["id"];
date_default_timezone_set('Asia/Kolkata');
$date=date('d-m-Y');
$time=date('h-i-s');
$db="test";
$con=mysqli_connect("localhost","root","","$db");

$result=mysqli_query($con,"SELECT * from login WHERE email != '".$email."' Or password !='".$password."'");
$check=mysqli_num_rows($result);
if($check>=1){
$status= "Invalid Email Or Password";
}
else{

}
?>
<body>

<p style="font-size:13px;color:orange:"><?php echo $friendrequest ?> </p>
