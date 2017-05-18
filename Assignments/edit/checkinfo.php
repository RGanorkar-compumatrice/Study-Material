



<?php session_start();
//die("bshfhs");
//print_r($_POST);

error_reporting(E_ERROR|E_PARSE);

$firstname=$_POST['FirstName'];
$Lastname=$_POST['LastName'];
$Dateofbirth=$_POST['DateofBirth'];
$City=$_POST['City'];
$Address=$_POST['Address'];
$userid=$_SESSION["id"];


$db="user";

$con=mysqli_connect("localhost","root","","$db");


$count=mysqli_query($con,"insert into info(fname, lname, dob, City, Address, user_id) values 
('".$firstname."', '".$Lastname."', '".$Dateofbirth."', '".$City."', '".$Address."', '".$userid."')");

if($count==true)
{

header("location:main.php");

}

?>























