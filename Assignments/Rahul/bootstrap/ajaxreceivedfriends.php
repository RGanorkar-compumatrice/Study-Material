<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
$friendid=$_POST['Friends'];
$message=$_POST['message'];
$fromessage=$_GET['eid'];
$fromfriend=$_SESSION["name"];
$fromfriendid=$_SESSION["id"];
date_default_timezone_set('Asia/Kolkata');
$date=date('d-m-Y');
$time=date('h-i-s');
$tofriend="";
$tofriendid="";
$db="test";
$con=mysqli_connect("localhost","root","",$db);

$result=mysqli_query($con,"select name, id from login where id='".$friendid."'");
while($row=mysqli_fetch_array($result))
{
$tofriend=$row['name'];
$tofriendid=$row['id'];

}

$result1=mysqli_query($con,"SELECT * FROM message where toid='".$fromfriendid."' and fromid='".$tofriendid."'");
while($row=mysqli_fetch_array($result1))
{ ?>
<tr><td><p><i><b><?php echo $row['message']; ?></b></i></p></td></tr>
<tr><td><p><i>Time:<?php echo $row['time'];?>, <?php echo $row['date'];?></i></p></td></tr>
<tr><td></td></tr>
<?php } ?>
</table>

