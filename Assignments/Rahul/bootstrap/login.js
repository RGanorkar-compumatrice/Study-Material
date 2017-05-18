<script>
$(document).ready(function(){
$("#login").click(function(){
		var email= $("#inputEmail").val();
		var password = $("#inputPassword").val();
		var text1;

		
if(email=="" || password=="")
{
$("#alert").show();
$("#alert").animate({fontSize: '3em'}, "slow");
text1="Please fill all fields"; 
$("#warn1").text(text1);
		return false;
}	
else{
/*
$.ajax({
		url:"ajaxsql.php",
		data:{checkemail:email,checkpassword:password},
		type:"POST",
		success:function(data){
	//$("#alert").show();
//$("#alert").animate({fontSize: '3em'}, "slow");
$("#validate").html(data);
	//$("#warn1").html(data);
		}
		});
		return false;
		*/
}
});		

$("#SignUp").click(function(){
 $("#example2").show(1500);
   	return false;	
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

/*			
$("#signsave").click(function(){
var username= $("#username").val();
var signemail= $("#inputError").val();
var signPassword= $("#inputWarning").val();
var text2;
if(username=="" || signemail=="" || signPassword="")
{
   //$("#alert").show();
   //$("#alert").animate({fontSize: '3em'}, "slow");
   text2="Please fill all fields"; 
   //$("#warn1").text(text2);
  
		return false;
	}	
else{
}
});	*/	
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

                       		                                		