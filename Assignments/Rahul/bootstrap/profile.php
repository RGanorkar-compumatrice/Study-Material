<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
$d=date("d F Y");
$uid=$_SESSION["id"];
$uname=$_SESSION["name"];
$acceptrequest="";
$deleterequest="";
$db="test";
$con=mysqli_connect("localhost","root","",$db);
$status="Friends";
$counter=0;
$count=mysqli_query($con,"SELECT * FROM message where toid='".$uid."'");
$counter=mysqli_affected_rows($con);
$result5=mysqli_query($con,"SELECT * FROM friendrequest where requesttoid='".$uid."'");
$counter1=mysqli_num_rows($result5);
$result7=mysqli_query($con,"SELECT * FROM userfriendlist where loginuserid='".$uid."'");
$counter2=mysqli_num_rows($result7);

if($_GET['upload']==true)
{
/*echo "<script>
alert('Your image uploaded successfully');
</script>";*/
}
$result8=mysqli_query($con,"select * from upload where user_id='".$uid."'");
  
  while($row=mysqli_fetch_array($result8))
  {
  $up=$row['imgfile'];
}

if($_GET['uploadcover']==true)
{
}
$result10=mysqli_query($con,"select * from uploadcover where user_id='".$uid."'");
  
  while($row=mysqli_fetch_array($result10))
  {
  $cp=$row['imgfile'];
}
?>

<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" sizes="16x16 24x24 32x32 96x96 194x194" href="images/messenger.png"> 
<title>Messenger</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/jquery-1.11.1.js"></script>
<script src="js/bootstrap.min.js"></script> 


<script>
$(document).ready(function(){		

        $("#mess").fadeIn(200);		
        $("#comment").fadeIn(500);	
		$("#sentcomment").fadeIn(1500);
		$("#receivedcomment").fadeIn(1500);
        $("#option").fadeIn(800);		
        $("#send").fadeIn(800);
		$("#sendpdf").fadeIn(800);
				
$("#ReadMessages").click(function(){
$(".form-group").hide();
$("#findfriendsbody").hide();
$("#FriendRequestbody").hide();
$("#profilebody").hide();
$("#aboutbody").hide();
$("#sentcomment").hide();
$("#receivedcomment").hide();
$("#readmessagebody").show(500);
$("#messagetable").show(2000);
$("#sentmessagetable").hide();
});		
  
$("#sendmessages").click(function(){
$("#messagetable").hide();
$(".form-group").show(2500);
$("#sentcomment").show(3000);
$("#receivedcomment").show(3000);

});

$("#sentmessages").click(function(){
$("#messagetable").hide();
$("#sentmessagetable").show(2000);
});

$("#sendmessages1").click(function(){
$("#sentmessagetable").hide();
$(".form-group").show(2000);
$("#sentcomment").show(2500);
$("#receivedcomment").show(2500);
});

$("#Inbox").click(function(){
$("#sentmessagetable").hide();
$("#messagetable").show(2000);
});

$("#FindFriends").click(function(){
$("#readmessagebody").hide();
$("#FriendRequestbody").hide();
$("#profilebody").hide();
$("#aboutbody").hide();
$("#findfriendsbody").show();
});

$("#Request").click(function(){
$("#readmessagebody").hide();
$("#findfriendsbody").hide();
$("#profilebody").hide();
$("#aboutbody").hide();
$("#FriendRequestbody").show();
});

$("#profile").click(function(){
$("#readmessagebody").hide();
$("#findfriendsbody").hide();
$("#FriendRequestbody").hide();
$("#aboutbody").hide();
$("#profilebody").show(1500);
});

$("#FriendList").click(function(){
$("#FriendList").hide();
$("#FriendListbody").show(1000);
});

$("#img2,#profilepicturepopup").mouseover(function(){
$("#profilepicturepopup").show();
});
$("#img2,#profilepicturepopup").mouseout(function(){
$("#profilepicturepopup").hide();
});
	
$("#profilepicturepopup").click(function(){
$("#readmessagebody").hide();
$("#findfriendsbody").hide();
$("#FriendRequestbody").hide();
$("#aboutbody").hide();
$("#profilebody").show(1500);
});	
	
$("#about").click(function(){
$("#readmessagebody").hide();
$("#findfriendsbody").hide();
$("#FriendRequestbody").hide();
$("#profilebody").hide();
$("#aboutbody").show(1000);
});		

$("#UpdateInfo").click(function(){	
$("#userinfobody").hide();
$("#aboutinfo").show(1500);
});
$("#back").click(function(){	
$("#aboutinfo").hide();
$("#userinfobody").show(1500);

});

$("#UpdatesignInfo").click(function(){	
$("#aboutinfo").hide();
$("#userinfobody").hide();
$("#updateuserinfobody").show(1500);

});
$("#signback").click(function(){	
$("#updateuserinfobody").hide();
$("#userinfobody").show(1500);

});

$("#option").click(function(){
var textarea=tinymce.get('comment').getContent();
var friendoption= $("#option").val();

$.ajax({
		url:"ajaxsentfriends.php",
		data:{message:textarea,Friends:friendoption},
		type:"POST",
		success:function(results){
		var regex = /(<([^>]+)>)/ig
		var body =results
		var data=results.replace(regex, "");
		$("#senttext").html(data).animate ({scrollTop:18629}, 500);
		 }
		});
		
$.ajax({
		url:"ajaxreceivedfriends.php",
		data:{message:textarea,Friends:friendoption},
		type:"POST",
		success:function(data){
		var regex1 = /(<([^>]+)>)/ig
		var body1 =data
		var data1=data.replace(regex1, "");
		$("#receivedtext").html(data1).animate ({scrollTop:18629}, 500);
		}
		});
});

$("#send").click(function(){
var textarea=tinymce.get('comment').getContent();
var friendoption= $("#option").val();
var sendbutton= $("#send").val();
$.ajax({
		url:"ajaxsentfriends.php",
		data:{message:textarea,Friends:friendoption,send:sendbutton},
		type:"POST",
		success:function(results){
		var regex = /(<([^>]+)>)/ig
		var body =results
		var data=results.replace(regex, "");
		$("#senttext").html(data).animate ({scrollTop:18629}, 500);
		tinymce.get('comment').setContent('');
		}
		});
});


$("#signsave").click(function(){
var username= $("#username").val();
var signemail= $("#inputError").val();
var signPassword= $("#inputWarning").val();
var text1,text2,text3,text4;
if(username=="")
{
   text2="Please fill username field"; 
  }	
  else{
  text2=""; 
  }
if(signPassword=="")
{
   text3="Please fill password field"; 
  }	
   else{
  text3=""; 
  }
  if(signemail=="")
{
   text4="Please fill email field"; 
  }	
   else{
  text4=""; 
  }
  
  if(text2!="" || text3!="" || text4!="")
  {
  alert(text2+"\n"+text3+"\n"+text4);
  }
  else{
  $.ajax({
		url:"ajaxsignsql.php",
		data:{checkemail:signemail},
		type:"POST",
		success:function(data){
        alert(data);
	}
		});
  }
});	

$("#delete").click(function(){
var arr = new Array();
  $("input:checked").each(function () {

    arr.push($(this).attr("id"));

            });		
			$.ajax({
		url:"ajaxdeletemessage.php",
		data:{checkarray:arr},
		type:"POST",
		success:function(data){
        window.location.reload();	
       	$("#messagetable").show();	
	}
		});		
 });

$("#deletesent").click(function(){
var arra = new Array();
  $("input:checked").each(function () {

    arra.push($(this).attr("id"));

            });	
		
			$.ajax({
		url:"ajaxdeletesentmessage.php",
		data:{checkarray:arra},
		type:"POST",
		success:function(data){
        window.location.reload();	
       	$("#sentmessagetable").show();	
	}
		});		
 });
//for password strength checking
	$('#inputWarning').keyup(function()
	{
		$('#passwordstrength').html(checkStrength($('#inputWarning').val()))
	})	
var password = $('#inputWarning').val();
	
	function checkStrength(password)
	{
		//initial strength
		var strength = 0
		
		//if the password length is less than 6, return message.
		if (password.length < 6) { 
			$('#passwordstrengthpasswordstrength').removeClass()
			$('#passwordstrength').addClass('short')
			return 'Too short' 
		}
		
		//length is ok, lets continue.
		
		//if length is 8 characters or more, increase strength value
		if (password.length > 7) strength += 1
		
		//if password contains both lower and uppercase characters, increase strength value
		if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1
		
		//if it has numbers and characters, increase strength value
		if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 
		
		//if it has one special character, increase strength value
		if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1
		
		//if it has two special characters, increase strength value
		if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
		
		//now we have calculated strength value, we can return messages
		
		//if value is less than 2
		if (strength < 2 )
		{
			$('#passwordstrengthpasswordstrengthpasswordstrengthpasswordstrength').removeClass()
			$('#passwordstrengthpasswordstrengthpasswordstrength').addClass('weak')
			return 'Weak'			
		}
		else if (strength == 2 )
		{
			$('#passwordstrengthpasswordstrength').removeClass()
			$('#passwordstrength').addClass('good')
			return 'Good'		
		}
		else
		{
			$('#passwordstrengthpasswordstrength').removeClass()
			$('#passwordstrength').addClass('strong')
			return 'Strong'
		}
	}




});




</script>


<script src="js/jquery-1.11.1.js"></script>
<script src="tinymce/tinymce.min.js"></script>
<script src="tinymce/plugins/advlist/plugin.js"></script>
<script src="tinymce/plugins/advlist/plugin.min.js"></script>

<script>
$(document).ready(function(){
tinymce.init({
    selector: "#comment",
	theme: "modern",
    //plugins: ["advlist"],
	   plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | bold italic underline | bullist numlist | forecolor backcolor,"

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

<script>

function myFunction() {
var a = document.getElementById("demo1").value;
var b = document.getElementById("demo2").value;
var c = document.getElementById("demo3").value;
var d = document.getElementById("demo4").value;
var e = document.getElementById("datepicker").value;
var f = document.getElementById("demo5").value;
var letters = /^[A-Za-z]+$/;  
var numbers = /^[0-9]+$/;
var text,text1,text2,text3,text4;
  
if(a == "")
      {  
      text1="Please fill all the fields";  
      }  
	  
	  else if(b == "")
      {  
       text1="Please fill all the fields";  
      }  
	  
 else if(c == "")
      {  
     text1="Please fill all the fields";  
     
      } 
else if(d == "")
      {  
       text1="Please fill all the fields";      
      } 
else if(e == "")
      {  
       text1="Please fill all the fields";      
      }
	  
else if(f == "")
      {  
       text1="Please fill all the fields";      
      } 
else  
      {  
      text1="Your Information saved successfully ";      
      }  	  

	 var message = [text1]; 

	 alert(message);  
	 
};

function myFunction1() {
    document.getElementById("myForm").reset();
};
function selectfriend(){
var friend = document.getElementById("option").value;
if(friend!=""){
}
else{
alert("Please Choose friend");
}

};

function findfriend(){
var findfriend = document.getElementById("findfriends").value;
if(findfriend!=""){
alert("Your Friend Request is send");
}
else{
alert("Please Choose friend");
}

};


</script>





</head>   
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="select2-3.5.2/select2.css">
<style type="text/css">
    .bs-example{
    	margin: 20px;	
background-color:black;		
    }
	body {
    background: url("images/message.jpg");
   background-size: 1350px 640px;

    <!--background-size: width:100%;-->
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
#sentcomment{
display:none;
}
#receivedcomment{
display:none;
}
#send{
display:none;
}
#sendpdf{
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
#aboutbody{
display:none;
margin-left:10px;
width:700px;
}
#updateuserinfobody{
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
position: absolute;
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
padding-right:0%;
width:510px;margin-left:194px;
margin-top:-44px;
position: relative;
z-index: 999;

cursor:pointer;
}
.wrapper{
    border: 1px dashed red;
    height: 150px;
    overflow-x: hidden;
    overflow-y: scroll;
    width: 150px;
 }
 .wrapper .selection{
   width:150px;
   border:1px solid #ccc
 }
</style>
<body>

<div id="picturesbody">
   <img src="<?php echo $cp;?>" id="img1" style="z-index:-1;height:150px;width:1250px;position:relative;margin-top:0px;">
 	 <img src="<?php echo $up;?>" id="img2" height="130px" width="170px">
	 <div id="profilepicturepopup">
	 <span class="glyphicon glyphicon-camera"></span> Update Profile<br>
     <p style="margin-left:18px;">Picture</p></div>
<div id="prof">

	<p style="font-size:24px;"><b><i><?php echo ucwords($_SESSION["name"]);?></b></i></p>
    </div>
</div>
<div class="bs-example" style="margin-top:-10px;width:1250px;margin-left:0px;height:70px;">
    <ul class="nav nav-pills">
	    <li style="margin-left:85px;"><a href="#" id="about"><b><i>About</i></b></a></li>
        <li><a href="#" id="profile"><b><i>Profile</b></i></a></li>
		<li><a href="#" id="ReadMessages"><span class="glyphicon glyphicon-envelope"></span> <b><i>Read Messages</b></i><span class="badge"><?php echo $counter;?></span></a></li>
		<li><a href="#" id="FindFriends"><b><i>Friends</b></i><span class="badge"><?php echo $counter2;?></span></a></li>
        <li><a href="#" id="Request"><span class="glyphicon glyphicon-user"></span> <b><i>Request</b></i><span class="badge"><?php echo $counter1;?></span></a></li>
		<li><i><a href="#" style="margin-left:415px;"><b><i>Date: <?php echo $d;?><br>
		<p>Time:<span id="clockbox"></span></i></b></a><br><i><a href="bootlogin.php" style="margin-left:416px;margin-top:7px;"><b><i>Log Out</i></b><a></li>
		<li><form method="post" action="userprofile.php">
		<a><div class="input-group">
		
		<input type="text" name="findfriendname" class="form-control" style="margin-left:100px;margin-top:-29px;width:280px;height:26px;" placeholder="Find Friends"><span class="input-group-btn">
		<button type="submit" class="btn btn-primary" style="margin-left:-40px;margin-top:-29px;"><span class="glyphicon glyphicon-search"></span></button></span>
		</div></a>
		</form>
		</li>
 </ul>
</div>

<div id="readmessagebody">
<div id="commentbody">
<table>
<tr><td>
<form method="post" action="checkprofile.php" id="messaging">
    <div class="form-group" style="margin-left:13px;">
     <h1 id="mess"><i>Message:</i></h1>	  	 
      <textarea class="textbox" rows="5" id="comment" name="message" style="cursor:pointer;background:palegoldenrod;" placeholder="Write a Message here..."></textarea><br><br>
    
    <select name="Friends" class="btn btn-primary" id="option">
	
      <option value="" class="dropdown-header">Choose Friend</option>
	  
	   	<?php 
		$result = mysqli_query($con,"SELECT * FROM userfriendlist where loginuserid='".$uid."'");
while($row = mysqli_fetch_array($result)) {
?>
      <option value="<?php echo $row['friendid'];?>"><?php echo ucwords($row['friend']);?></option>
      <?php
}?>

    </select>
 <input type="button" class="btn btn-primary" onclick="selectfriend()" style="margin-left:13px;" id="send" name="send" value="Send"></input>
 <input type="submit" class="btn btn-primary" style="margin-left:13px;" id="sendpdf" name="sendpdf" value="Download PDF"></input>
	</div>
   </form>
</td>
<td>
<div style="margin-top:-60px;" id="sentcomment"> 
<h3 style="margin-left:13px;">Sent Messages</h3>
<textarea rows="9" class="form-control" id="senttext" name="" style="cursor:pointer;margin-top:0px;background:palegoldenrod"></textarea>
</div> 
</td>
<td>
<div style="margin-top:-60px;" id="receivedcomment"> 
<h3 style="margin-left:13px;">Received Messages</h3>
<textarea rows="9" class="form-control" id="receivedtext" name="" style="cursor:pointer;margin-top:0px;background:palegoldenrod;"></textarea>
</div> 
</td>
</tr></table>
</div>
<div id="messagetable">
 <button type="submit" class="btn btn-primary" id="sendmessages">Send Messages</button>
  <button type="submit" class="btn btn-primary" id="sentmessages">Sent Messages</button><br>
       <h2><i>Received Messages</i></h2>	  
<?php 
$result1=mysqli_query($con,"SELECT * FROM message where toid='".$uid."'");
?>


<br>
<table class="col-md-10 col-xs-10 pull-center" border="1px;" style="background-color:white;">  

<tr>
<th class="col-sm-3"><center>From</center></th>
<th class="col-sm-4"><center>Message</center></th>
<th class="col-sm-2"><center>Date</center></th>
<th class="col-sm-2"><center>Time</center></th>
<th class="col-sm-1"><center><button id="delete" class="btn btn-danger">Delete</button></center></th>
</tr>
	  <?php
while($row=mysqli_fetch_array($result1))
{
$fromessage=$row['message'];
$fromessageid=$row['id'];
?>
<tr  style="min-height:5px;height:5px;">
<td><p><?php echo ucwords($row['fromfriend']);?></p></td>
<td class="setWidth concat"><div><p><?php echo $row['message'];?></p></div></td>
<td><center><p><?php echo $row['date'];?></p></center></td>
<td><center><p><?php echo $row['time'];?></p></center></td>
<td><center><input type="checkbox" id="<?php echo $fromessageid;?>" style="height:20px;width:20px;"></center></td>
 </tr>
 <?php }?>
</table>
 </div>
 <div id="sentmessagetable">
  <button type="submit" class="btn btn-primary" id="sendmessages1">Send Messages</button>
  <button type="submit" class="btn btn-primary" id="Inbox">Received Messages</button><br>
   <h2><i>Sent Messages</i></h2>
 <?php $result2=mysqli_query($con,"SELECT * FROM message where fromid='".$uid."'");
?>
<br>
<table class="col-md-10 col-xs-10 pull-center" border="1px;" style="background-color:white;">  

<tr>
<th class="col-sm-3"><center>To</center></th>
<th class="col-sm-4"><center>Message</center></th>
<th class="col-sm-2"><center>Date</center></th>
<th class="col-sm-2"><center>Time</center></th>
<th class="col-sm-1"><center><button id="deletesent" class="btn btn-danger">Delete</button></center></th>
</tr>
	  <?php
while($row=mysqli_fetch_array($result2))
{
$sentfromessageid=$row['id'];
?>
<tr  style="min-height:5px;height:5px;">
<td><p><?php echo ucwords($row['tofriend']);?></p></td>
<td class="setWidth concat"><div><p><?php echo $row['message'];?></p></div></td>
<td><center><p><?php echo $row['date'];?></p></center></td>
<td><center><p><?php echo $row['time'];?></p></center></td>
<td><center><input type="checkbox" id="<?php echo $sentfromessageid;?>" style="height:20px;width:20px;"></center></td>
</tr>
 <?php }?>
</table>
 </div>
 </div>
 
 <div id="findfriendsbody">
     <?php 
	 //$result9=mysqli_query($con,"SELECT friendid FROM userfriendlist where loginuserid='".$uid."'");
	 $result9=mysqli_query($con,"SELECT friendid FROM userfriendlist where loginuserid='".$uid."'
				UNION SELECT id FROM login where id='".$uid."'");
$Friendid = array();
foreach($result9 as $friendname) {
 $Friendid[] = implode(',', $friendname);
}	
	$Friendid=implode(',', $Friendid);
$result3=mysqli_query($con,"SELECT name FROM login WHERE id NOT IN($Friendid)");
	 ?>
	 <form method="POSt" Action="checkfriendrequest.php">
	    <select name="FriendRequest" class="btn btn-primary" id="findfriends">
       <option value="" class="dropdown-header">Find Friends</option>  
	 	  <?php
while($row=mysqli_fetch_array($result3))
{
?>
    <option value="<?php echo $row['name'];?>"><?php echo ucwords($row['name']);?></option>
	 
	 <?php }?>
 </select>
 <button type="submit" class="btn btn-primary" onclick="findfriend()" id="SendFriendRequest" name="SendFriendRequest">Send FriendRequest</button>
 </form>
   <button type="submit" class="btn btn-primary" id="FriendList" name="FriendList">FriendList</button>
 
 
 
 <div id="FriendListbody">
<h2><i>FriendList</i></h2>
<table style="background-color:white;" border="1px;">  
<tr>
<th class="col-sm-7"></th>
<th class="col-sm-3"></th>
</tr>
 <?php //$result6=mysqli_query($con,"SELECT * FROM userfriendlist where loginuserid='".$uid."'");
$result6=mysqli_query($con," SELECT f.friendid, f.friend, u.imgfile FROM userfriendlist as f, upload as u where f.loginuserid='".$uid."' and u.user_id=f.friendid");
 
 
while($row=mysqli_fetch_array($result6))
{
$removefriend=$row['friendid'];

?>
<tr style="min-height:5px;height:5px;">
<td><a href="userprofile.php?friendlistname=<?php echo ucwords($row['friend']);?>"><img src="<?php echo $row['imgfile'];?>" height="50px" width="50px"><p><?php echo ucwords($row['friend']);?></p></a></td>

<td><p><a href="checkfriendrequest.php?rid=<?php echo $removefriend;?>">Remove</a></p></td>
 </tr>
 <?php } ?>
 </table>

   </div>
   
 </div>
 
 
 <div id="FriendRequestbody">
   <h2><i>Friend Requests</i></h2></br>
 <?php 
$result4=mysqli_query($con,"SELECT * FROM friendrequest where requesttoid='".$uid."'");
?>


<br>
<table class="col-md-10 col-xs-10 pull-center" style="background-color:white;">  

<tr>
<th class="col-sm-1"></th>
<th class="col-sm-1"></th>
<th class="col-sm-1"></th>
</tr>
	  <?php
while($row=mysqli_fetch_array($result4))
{
$acceptrequest=$row['requestfromid'];
$deleterequest=$row['requestfromid'];
?>
<tr  style="min-height:5px;height:5px;">
<td><p><?php echo ucwords($row['requestfrom']);?></p></td>
<td><p><a href="checkfriendrequest.php?aid=<?php echo $acceptrequest;?>">Accept</a></p></td>
<td><p><a href="checkfriendrequest.php?did=<?php echo $deleterequest;?>">Delete</a></p></td>
 </tr>
 <?php }?>
</table>
  </div>
  
  
   <div id="profilebody">
   <h3><i><span class="glyphicon glyphicon-camera"></span> Update Profile Picture<br></i></h3></br>
      	<form action="pictureupload.php" enctype="multipart/form-data" method="post" name="form1">
 <input type="file" class="btn btn-primary" name="SelectFile"><br>
 <input type="submit" class="btn btn-primary" value="Upload Image" onclick="return checkPhoto()" style="cursor:pointer;text-align:center;font-size:15px;"><br> 	
   </form>
   
    <h3><i><span class="glyphicon glyphicon-camera"></span> Update Cover Photo<br></i></h3></br>
      	<form action="coverphotoupload.php" enctype="multipart/form-data" method="post" name="form1">
 <input type="file" class="btn btn-primary" name="SelectFile"><br>
 <input type="submit" class="btn btn-primary" value="Upload Image" onclick="return checkPhoto()" style="cursor:pointer;text-align:center;font-size:15px;"> 	
   </form>
   
  <script>		  
function checkPhoto() 
{
 var imagePath = document.form1.upload123.value;
 var pathLength = imagePath.length;
 var lastDot = imagePath.lastIndexOf(".");
 var fileType = imagePath.substring(lastDot,pathLength);

 if((fileType == ".gif") || (fileType == ".png")||(fileType == ".PNG")||(fileType == ".jpg") || (fileType == ".GIF") || (fileType == ".JPG")) {
  return true;
 } else {
  alert("We supports .JPG, .PNG, and .GIF image formats. Your file-type is " + fileType + ". If you are having difficulties with this step, please send an e-mail to trevor@trevor.net.");
document.getElementById("upload123").focus();
  }
  }
  </script>   
</div>
<div id="aboutbody">

<div id="aboutinfo">
<button type="submit" class="btn btn-primary" id="back">Back</button>
<form id="myForm" Method="POST" action="checkuserinfo.php">
<table height="200">
<tr><td>
First Name <input type=text name="FirstName" style="margin-left:12px;" class="style" id="demo1"></input>
</td></tr><br>
<tr><td>
Last Name <input type=text name="LastName" style="margin-left:12px;" class="style" id="demo2"></input>
</td></tr>
<tr><td>
Gender<label class="radio-inline"><input type="radio" style="margin-left:18px;" name="gender" value="Male"><p style="margin-left:38px;">Male</p></label><label class="radio-inline"><input type="radio" name="gender" value="Female"><p style="margin-left:0px;">Female</p></label>
 
    
</td></tr>
<tr><td>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <script>
$(function() {
$( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' ,
changeMonth: true,
changeYear: true,
yearRange: '1950:2050'
});
});
</script>
Date of Birth <input type=text name="DateofBirth" id="datepicker"></input>
</td></tr>
<tr><td>
City <input type=text name="City" style="margin-left:61px;" id="demo3"></input>
</td></tr>
<tr><td>
Phone No. <input type="number" name="phone" style="margin-left:12px;" id="demo4"></input>
</td></tr>
<tr><td>
</table>

<button type="submit" class="btn btn-primary" onclick="myFunction()">Save</button>
<button type="button" class="btn btn-primary" onclick="myFunction1()">reset</button>
</form>
</div>

<div id="userinfobody">
<?php
$result11=mysqli_query($con,"select * from userinfo where user_id ='".$uid."'");
while($row=mysqli_fetch_array($result11))
{
?>
<button type="submit" class="btn btn-primary" id="UpdateInfo">Update Info</button>
<button type="submit" class="btn btn-primary" id="UpdatesignInfo">Change Username or Password</button><br>
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

<div id="updateuserinfobody">
<button type="submit" class="btn btn-primary" id="signback" style="margin-left:34px;">Back</button><br><br>

<form class="form-horizontal" method="POST" Action="checkprofilesign.php">

<div class="">
            <label class="col-xs-2 control-label" for="inputSuccess">Username</label>
            <div class="col-xs-10">
                <input type="text" class="form-control" placeholder="Username" name="username" id="username"></input>
                <span class="help-block" id="validusername"></span>
            </div>
<div class="">
            <label class="col-xs-2 control-label" for="inputWarning">Password</label>
            <div class="col-xs-10">
                <input type="password" id="inputWarning" class="form-control" placeholder="Password" name="signPassword">
                <span class="" style="margin-left:12px;"><b>Password strength:</b><p id="passwordstrength" class="label label-danger" style="font-size:12px;"></p> </span>
            </div>
			</div><br>
<div class="">
            <label class="col-xs-2 control-label" for="inputError">Email</label>
            <div class="col-xs-10">
                <input type="email" id="inputError" class="form-control" placeholder="Email" name="signEmail">
                <span class="help-block"></span>
            </div>
        </div>
<div class="">
            <div class="col-xs-offset-2 col-xs-10">
                <button type="submit" class="btn btn-primary" id="signsave" style="margin-left:12px;" name="signsave">Save</button>
            </div>
        </div>
   </form>   

</div>

</div>



</body>