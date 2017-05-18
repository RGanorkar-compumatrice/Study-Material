
<?php
$db="user";
//die("from include");
//error_reporting(E_ERROR|E_PARSE);

$con=mysqli_connect("localhost","root","",$db);
if(mysqli_connect_errno())
{

echo "Error".mysqli_connect_error();
}
?>