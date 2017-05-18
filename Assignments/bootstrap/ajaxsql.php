

<?php
error_reporting(E_ERROR|E_PARSE);
$email=$_POST['checkemail'];
$password=$_POST['checkpassword'];

$db="test";
$con=mysqli_connect("localhost","root","","$db");

$result=mysqli_query($con,"SELECT * from login WHERE email != '".$email."'");
$check=mysqli_num_rows($result);
if($check>=1){
$status= "Invalid Email Or Password";
echo $status;
}
else{

}
?>
<input type="text" name="findfriendname" class="form-control" style="margin-left:60px;margin-top:-29px;width:280px;height:26px;" placeholder="Find Friends"><span class="input-group-btn">