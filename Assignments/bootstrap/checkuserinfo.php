



<?php session_start();


error_reporting(E_ERROR|E_PARSE);

$firstname=ucwords($_POST['FirstName']);
$Lastname=ucwords($_POST['LastName']);
$Dateofbirth=$_POST['DateofBirth'];
$City=ucwords($_POST['City']);
$gender=ucwords($_POST['gender']);
$phoneno=$_POST['phone'];
$userid=$_SESSION["id"];
$db="test";

$con=mysqli_connect("localhost","root","","$db");

if($firstname!="" & $Lastname!="" & $Dateofbirth!="" & $City!="" & $gender!="" & $phoneno!="")
{

 $result=mysqli_query($con,"Delete from userinfo where user_id='".$userid."'"); 
 
$count=mysqli_query($con,"insert into userinfo(firstname, lastname, dob, City, phoneno, gender, user_id) values 
('".$firstname."', '".$Lastname."', '".$Dateofbirth."', '".$City."', '".$phoneno."', '".$gender."', '".$userid."')");
}
header("location:profile.php");



?>























