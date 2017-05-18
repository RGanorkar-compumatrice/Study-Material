<?php
//print_r($_POST);
//die("values");
session_start();
error_reporting(E_ERROR|E_PARSE);
$name=$_SESSION["id"];

$fd=$_POST['name'];

$d=date('Y-m-d H:i:s');
$db="user";

$con=mysqli_connect("localhost","root","",$db);


$result = mysqli_query($con,"SELECT id FROM login where name='".$fd."'");
while($row=mysqli_fetch_array($result)){
$lgid=$row['id'];

}





$count=mysqli_query($con,"SELECT f.name,m.message,m.datetime from friend as f,message as m where 
                m.toid='".$name."' and m.loginid=f.logid and m.toid=f.user_id and m.loginid='".$lgid."'");


	while($row=mysqli_fetch_array($count)){
echo $row['message'];
}
echo $mname;
/*echo $mname;
if($mname==$fd){
$m=$row['message'];
echo $m;
}
}*/
?>
