<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
$d=date("d F Y");
$uid=$_SESSION["id"];
$uname=$_SESSION["name"];
//$findfriendname=ucwords($_POST['findfriendname']);
//$friendlistname=$_GET['friendlistname'];
if($_POST['findfriendname']!="")
{
$findfriendname=ucwords($_POST['findfriendname']);
}
elseif($_GET['friendlistname']!="")
{
$findfriendname=$_GET['friendlistname'];
}
elseif($_GET['userfriendlistname']!="")
{
$findfriendname=$_GET['userfriendlistname'];
}
else{}

$db="test";
$con=mysqli_connect("localhost","root","",$db);

//for search bar findfriend
$result1=mysqli_query($con,"select * from login where name ='".$findfriendname."'");
while($row=mysqli_fetch_array($result1))
{
$findfriendid=$row['id'];
$findfriendusername=$row['name'];
}
$counter=0;
$count=mysqli_query($con,"SELECT * FROM message where toid='".$uid."'");
$counter=mysqli_affected_rows($con);
$result7=mysqli_query($con,"SELECT * FROM userfriendlist where loginuserid='".$findfriendid."'");
$counter2=mysqli_num_rows($result7);

if(isset($_POST['findfriendname']) || isset($_GET['friendlistname']) || isset($_GET['userfriendlistname'])){
if($findfriendid!="" & $findfriendid!=$uid){
$result8=mysqli_query($con,"select * from upload where user_id='".$findfriendid."'");
  
  while($row=mysqli_fetch_array($result8))
  {
  $up=$row['imgfile'];
}

$result10=mysqli_query($con,"select * from uploadcover where user_id='".$findfriendid."'");
  
  while($row=mysqli_fetch_array($result10))
  {
  $cp=$row['imgfile'];
}
}
else{
echo "<script>
alert('Please enter a valid friend name');
window.location.href='profile.php';
</script>";
//header("Location:profile.php");
return false;
}
}
else{}
$result2=mysqli_query($con,"select * from upload where user_id='".$uid."'");
 while($row=mysqli_fetch_array($result2))
  {
  $userphoto=$row['imgfile'];
}
$result3=mysqli_query($con,"SELECT * FROM userfriendlist where loginuserid='".$findfriendid."' AND friendid='".$uid."'");
$counter3=mysqli_num_rows($result3);
$result4=mysqli_query($con,"SELECT * FROM userfriendlist where loginuserid='".$uid."' AND friendid='".$uid."'");
$counter4=mysqli_num_rows($result4);

$result9=mysqli_query($con,"select friendid from userfriendlist where loginuserid='".$uid."'");
$mutualfriendid=$row['friendid'];
$result13=mysqli_query($con,"select friendid from userfriendlist where loginuserid='".$mutualfriendid."'");
$countmutualfriend=mysqli_num_rows($result13);
?>

<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $uname; ?></title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/jquery-1.11.1.js"></script>
<script src="js/bootstrap.min.js"></script> 
<script>
$(document).ready(function(){		

$("#about").click(function(){
$("#profilebody").hide();
$("#FriendListbody").hide();
$("#friendinfobody").show(1000);
});		
$("#FindFriends").click(function(){
$("#profilebody").hide();
$("#friendinfobody").hide();
$("#FriendListbody").show(1000);
});
$("#Request").click(function(){
alert("Your Friend Request is send");
});

});
</script>

<script type="text/javascript">
function GetClock(){
d = new Date();
nhour  = d.getHours();
nmin   = d.getMinutes();
nsec   = d.getSeconds();
     if(nhour ==  0) {ap = " AM";nhour = 12;} 
else if(nhour <= 11) {ap = " AM";} 
else if(nhour == 12) {ap = " PM";} 
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}


document.getElementById('clockbox').innerHTML=" "+nhour+":"+nmin+":"+nsec+" "+ap+" ";
setTimeout("GetClock()", 1000);
}
window.onload=GetClock;
</script>

<style type="text/css">
    .bs-example{
    	margin: 20px;	
background-color:black;		
    }
	body {
    background: url("images/message.jpg");
    background-size: 1250px 600px;
    background-repeat: no-repeat;
    
}
.form-control{
width:230px;
margin-left:10px;
z-index:-1;
}
#mess{
display:none;
}
#comment{
display:none;
margin-left:100px;
}
#send{
display:none;
}
#option{
display:none;
}
#messagetable{
display:none;
margin-left:10px;
width:700px;
}
#sentmessagetable{
display:none;
margin-left:10px;
width:700px;
}
.setWidth{
max-width:100px;
}
.concat width{
overflow:hidden;
-ms-text-overflow:ellipsis;
-o-text-overflow:ellipsis;
text-overflow:ellipsis;
white-space:nowrap;
width:inherit;
}
#findfriendsbody{
display:none;
margin-left:10px;
width:700px;
}
#FriendRequestbody{
display:none;
margin-left:10px;
width:700px;
}
#FriendListbody{
display:none;
margin-left:10px;
width:700px;
}
#profilebody{
display:none;
margin-left:10px;
width:700px;
}
#friendinfobody{
display:none;
margin-left:10px;
width:700px;
}
#aboutinfo{
display:none;
margin-left:10px;
width:700px;
}
#img2 {
     position: absolute;
  left: 20px;
  top: 19px;
}
#profilepicturepopup{
color:white;
background-color:black;
width:110px;margin-left:39px;
margin-top:-38px;
position: relative;
z-index: 999;
display:none;
cursor:pointer;
}
.ui-datepicker {
    background: white;
  
    color: blue;
}
#prof{
color:white;
padding-right:20%;
width:110px;margin-left:194px;
margin-top:-34px;
position: relative;
z-index: 999;

cursor:pointer;
}
#coverandnav{
margin-left:-40px;
margin-top:-40px;
}
</style>

<body>
<div id="coverandnav">
<div id="picturesbody">
   <img src="<?php echo $cp;?>" id="img1" style="z-index:-1;height:150px;width:1250px;position:relative;margin-top:0px;">
 	 <img src="<?php echo $up;?>" id="img2" height="130px" width="170px">
	 <div id="profilepicturepopup">
	 <span class="glyphicon glyphicon-camera"></span> Update Profile<br>
     <p style="margin-left:18px;">Picture</p></div>
 <div id="prof">

	<p style="font-size:24px;"><b><i><?php echo ucwords($findfriendname);?></b></i></p>
    </div>
</div>
<div class="bs-example" style="margin-top:-10px;width:1250px;margin-left:0px;">
    <ul class="nav nav-pills">
	 <li style="margin-left:45px;margin-top:-12px;"><a href="profile.php"><p><img src="<?php echo $userphoto;?>" height="25px" width="25px"> <?php echo ucwords($row['friend']);?><b><i><?php echo ucwords($uname);?></i></b></a></li>
	 <li><a href="#" id="about"><b><i>About <?php echo ucwords($findfriendname);?></i></b></a></li>
	    <li><a href="#" id="FindFriends"><b><i>Friends</b></i><span class="badge"><?php echo $counter2;?></span></a></li>
       
		<?php if($counter3>=1){	?>	
		<li><i><a href="#" style="margin-left:755px;"><b><i>Date: <?php echo $d;?><br>
		<p>Time:<span id="clockbox"></span></i></b></a><br><i><a href="bootlogin.php" style="margin-left:755px;margin-top:7px;"><b><i>Log Out</i></b><a></li>
		<?php }?>
		
		<?php if($counter3==0 ){?>
		<li><a href="checkfriendrequest.php?findname=<?php echo $findfriendusername;?>" id="Request"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span> <b><i>Add Friend</b></i></a></li>
		<li><i><a href="#" style="margin-left:595px;"><b><i>Date: <?php echo $d;?><br>
		<p>Time:<span id="clockbox"></span></i></b></a><br><i><a href="bootlogin.php" style="margin-left:595px;margin-top:7px;"><b><i>Log Out</i></b><a></li>
			<?php } ?>
			
		<li><form method="post">
		<a><div>
		<?php include('select2searchfriends.php'); ?>

		<button type="submit" class="btn btn-primary" style="margin-left:0px;margin-top:-48px;"><span class="glyphicon glyphicon-search"></span></button></span>
		</div></a>
		</form>
		</li>
 </ul>
</div>
</div>
<div id="friendinfobody">
<?php
$result11=mysqli_query($con,"select * from userinfo where user_id ='".$findfriendid."'");
while($row=mysqli_fetch_array($result11))
{
?>
<table height="200">
<tr><td>
<p>First Name:</p> <td><p style="margin-left:12px;"><?php echo $row['firstname']; ?></p><td>
</td></tr><br>
<tr><td>
<p>Last Name:</p> <td><p style="margin-left:12px;"><?php echo $row['lastname']; ?></p>
</td></tr>
<tr><td>
<p>Gender:</p> <td><p style="margin-left:12px;"><?php echo $row['gender']; ?></p>
</td></tr>
<tr><td>
<p>Date of Birth:</p> <td><p style="margin-left:12px;"><?php echo $row['dob']; ?></p>
</td></tr>
<tr><td>
<p>City:</p> <td><p style="margin-left:12px;"><?php echo $row['City']; ?></p><td>
</td></tr>
<tr><td>
<p>Phone No.:</p> <td><p style="margin-left:12px;"><?php echo $row['phoneno']; ?></p><td>
</td></tr>
<tr><td>
</table>
<?php
}
?>
</div>

<div id="FriendListbody">
<h2><i>FriendList</i></h2>
<table class="col-md-3 col-xs-3 pull-center" style="background-color:white;" border="1px;">  
<tr>
<th class="col-sm-2"></th>
</tr>
 <?php //$result6=mysqli_query($con,"SELECT * FROM userfriendlist where loginuserid='".$uid."'");
$result6=mysqli_query($con," SELECT f.friend, u.imgfile FROM userfriendlist as f, upload as u where f.loginuserid='".$findfriendid."' and u.user_id=f.friendid");
 
 
while($row=mysqli_fetch_array($result6))
{
$removefriend=$row['friendid'];

?>
<tr style="min-height:5px;height:5px;">
<td><a href="tempfriendlistname.php?friendlistname=<?php echo ucwords($row['friend']);?>"><img src="<?php echo $row['imgfile'];?>" height="50px" width="50px"><p><?php echo ucwords($row['friend']);?></p></a></td>
 </tr>
 <?php } ?>
 </table>

   </div>
</body>
<?php
if($_SERVER['PHP_SELF']!="userprofile.php")
{
 unset($findfriendname);
 }

?>
