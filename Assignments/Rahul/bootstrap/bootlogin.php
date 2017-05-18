
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Messenger</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/jquery-1.11.1.js"></script>

<script src="js/bootstrap.min.js"></script> 

<style type="text/css">
    .bs-example{    	
background-color:black;		
    }
	#example2{
    	margin-bottom:50px;
margin-left:4px;	
padding:20px;
display:none;
    }
		body {
    background: url("images/mess2.jpg");
    background-size: 1250px 800px;
    background-repeat: no-repeat;
    
}
.form-control { width: 350px }

</style>
</head>
<body>

<div class="bs-example">
    <ul class="nav nav-pills">
        <li style="font-size:15px;"><a href="bootlogin.php"><b>Home</b></a></li>
        
		 <li class="active" style="margin-left:460px;font-size:20px;"><a href="#"><b>Messenger</b></a></li>  
<li><a href="#" style="margin-left:380px;"><b><i>Date:<?php echo date("d F Y");?><br>Time:<span id="clockbox"></span></i></b></a></li>	

    </ul>
</div>
	
<div class="bs-example1" style="padding:20px;">
    <form class="form-horizontal" method="POST" Action="checkbootlogin.php">
        <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Email</label>
            <div class="col-xs-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="control-label col-xs-2">Password</label>
            <div class="col-xs-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label><span id="validate"></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <button type="submit" class="btn btn-primary" id="login">Login</button>
				 <button type="submit" class="btn btn-primary" id="SignUp">Sign Up</button>
            </div>        
    </form>
	</div>
</div>

<div class="alert alert-danger" id="alert" style="display:none;width:320px;height:100px;">
    <strong style="font-size:16px;">Warning!</strong> <br><span id="warn1" style="font-size:16px;"></span>
  </div>


<div class="bs-example2" id="example2">
    <form class="form-horizontal" method="POST" Action="checkbootlogin.php">
        <div class="form-group has-success">
            <label class="col-xs-2 control-label" for="inputSuccess">Username</label>
            <div class="col-xs-10">
                <input type="text" class="form-control" placeholder="Username" name="username" id="username"></input>
                <span class="help-block" id="validusername"></span>
            </div>
        </div>
        <div class="form-group has-warning">
            <label class="col-xs-2 control-label" for="inputWarning">Password</label>
            <div class="col-xs-10">
                <input type="password" id="inputWarning" class="form-control" placeholder="Password" name="signPassword">
                <span class="help-block"><b>Password strength:</b><p id="passwordstrength" class="label label-danger" style="font-size:12px;"></p> </span>
            </div>
        </div>
        <div class="form-group has-error">
            <label class="col-xs-2 control-label" for="inputError">Email</label>
            <div class="col-xs-10">
                <input type="email" id="inputError" class="form-control" placeholder="Email" name="signEmail">
                <span class="help-block"></span>
            </div>
        </div>
		<div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <button type="submit" class="btn btn-primary" id="signsave">Save</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>    
<head>
<script>
$(document).ready(function(){
$("#login").click(function(){
		var email= $("#inputEmail").val();
		var password = $("#inputPassword").val();
		var text1,text2,text3,text4;

		
if(email=="" || password=="")
{
$("#alert").show();
$("#alert").animate({fontSize: '3em'}, "slow");
text1="Please fill all fields"; 
$("#warn1").text(text1);
		return false;
}	
else{

$.ajax({
		url:"ajaxloginsql.php",
		data:{checkemail:email,checkpassword:password},
		type:"POST",
		success:function(results){
		var textalert= results;

 alert(textalert);
//$("#warn1").text(email);
		}
		});
}
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
	
$("#SignUp").click(function(){
 $("#example2").show(1500);
   	return false;	
	    });	
			
$("#signsave").click(function(){
var username= $("#username").val();
var signemail= $("#inputError").val();
var signPassword= $("#inputWarning").val();

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
		url:"ajaxbootsignsql.php",
		data:{checkemail:signemail},
		type:"POST",
		success:function(data){
        alert(data);
	}
		});
  }
});	

});	

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

</head>                            		                                		