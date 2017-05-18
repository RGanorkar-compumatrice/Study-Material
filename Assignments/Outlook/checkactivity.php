
<?php 
session_start();
//print_r($_POST);
//die("printing post array");
error_reporting(E_ERROR|E_PARSE);
//sports
//die("123");
$cricket=$_POST['cricket'];
$tennis=$_POST['tennis'];
$football=$_POST['football'];
$badminton=$_POST['badminton'];

//hobby

$drawing=$_POST['drawing'];
$dance=$_POST['dance'];
$singing=$_POST['singing'];
$reading=$_POST['reading'];
$userid=$_SESSION['id'];

$db="user";
//die("123");

//if(mysqli_connect_errno()){

//echo "Error".mysqli_connect_error();}


$con=mysqli_connect("localhost", "root", "", "$db");
//die("Before query");
$count=mysqli_query($con,"insert into activity(cricket, tennis, football, badminton, drawing, dance, singing, reading, user_id) values
 ('".$cricket."', '".$tennis."', '".$football."', '".$badminton."', '".$drawing."', '".$dance."', '".$singing."', '".$reading."', '".$userid."')");

if($count==true)
{
//die("inside if");
header("Location:main.php");
}
else{
die("inside if");
header("Location:Activity.php");
}
//while(mysqli_fetch_array($result)){

//header("Location:main.php");}




?> 



