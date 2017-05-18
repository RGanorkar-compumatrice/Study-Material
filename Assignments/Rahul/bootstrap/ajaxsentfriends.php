<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
$friendid=$_POST['Friends'];
$message=$_POST['message'];
$send=$_POST['send'];
$fromfriend=$_SESSION["name"];
$fromfriendid=$_SESSION["id"];
$date=date('d-m-Y');
//$time=date('h-i-s');
$tofriend="";
$tofriendid="";
$db="test";
$con=mysqli_connect("localhost","root","",$db);
$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
$time=$dateTime->format("g:i A");

$result=mysqli_query($con,"select name, id from login where id='".$friendid."'");
while($row=mysqli_fetch_array($result))
{
$tofriend=$row['name'];
$tofriendid=$row['id'];

}
if($send!=""){
if($tofriend!=""){
$result2=mysqli_query($con,"insert into message(message, fromfriend, tofriend, fromid, toid, date, time) values ('".$message."','".$fromfriend."',
'".$tofriend."','".$fromfriendid."','".$tofriendid."','".$date."','".$time."')");
}
else{}
}
?>
<table>

<?php
$result3=mysqli_query($con,"SELECT * FROM message where fromid='".$fromfriendid."' and toid='".$tofriendid."'");
while($row=mysqli_fetch_array($result3))
{ ?>
<tr><td><p><i><b><?php echo $row['message']; ?></b></i></p></td></tr>
<tr><td><p><i>Time:<?php echo $row['time'];?>, <?php echo $row['date'];?></i></p></td></tr>
<tr><td></td></tr>
<?php } ?>
</table>