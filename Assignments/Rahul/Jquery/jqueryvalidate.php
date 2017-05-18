<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
$firstname=$_POST['FirstName'];
$Lastname=$_POST['LastName'];
$email=$_POST['Email'];
$Phoneno=$_POST['Phoneno'];
$Address=$_POST['Address'];
$fname="";
$lname="";
$mail="";
$phone="";
$addr="";
$checkfrname="";
$db="test";
$con=mysqli_connect("localhost","root","","$db");
/*
$result1=mysqli_query($con,"SELECT * from information WHERE FirstName = '".$firstname."'");
$check=mysqli_num_rows($result1);
if($check>=1){
echo "<h2>FirstName is already registered</h2>";
}
*/
//on submit button
if(isset($_POST['submit'])){
$count=mysqli_query($con,"insert into information(FirstName, LastName, EmailId, PhoneNo, Address) values 
('".$firstname."', '".$Lastname."', '".$email."', '".$Phoneno."', '".$Address."')");
}

$result=mysqli_query($con,"select * from information");

while($row=mysqli_fetch_array($result))
{
$fname=$row['FirstName'];
$lname=$row['LastName'];
$mail=$row['EmailId'];
$phone=$row['PhoneNo'];
$addr=$row['Address'];
}
?>
<html>
<head>
<style>
.style {
   margin-left:50px;
   cursor:pointer;
}
.red{
background-color:red;
color:white
}
.green{
background-color:green;
color:white
}
.orange{
background-color:orange;
color:white
}
.tab{
display:none
}
p{
color:orange
}
</style>
</head>
<body style="background-color:black">

<div id="div2" style="height:100px;width:600px;position:absolute;margin-top:25px;"><p style="color:orange;font-size:40px;">Registration Form</p></div>
<div id="div1" style="height:100px;width:100px;position:absolute;z-index:-1;margin-left:60px;"><image src="http://yoksel.github.io/about-svg/assets/img/parts/fire.gif"
      width="256" height="200" style="position: relative;"/>
</div>
	  
<br><br><br><br><br><br><br><br><br><br><br><br>
<form id="myForm">
<table>
<tr><td>
<p><b>First Name<input type=text class="style" id="demo1" name="FirstName" placeholder="First Name"></input></td><td><span class="demo1"> </span>
</td></tr>
<tr><td>
<p><b>Last Name<input type=text class="style" id="demo2" name="LastName" placeholder="Last Name"></input><span class="demo2"> </span>
</td></tr>
<tr><td>
<p><b>Email Id <input type=text style="margin-left:61px;cursor:pointer;" id="demo3" name="Email" placeholder="Email Id"></input><span class="demo3"> </span>
</td></tr>
<tr><td>
<p><b>Phone No. <input type=text class="style" id="demo4" name="Phoneno" placeholder="Phone No."></input><span class="demo4"> </span>
</td></tr>
<tr><td>
<p><b>Address
<textarea row="5" columns="7" style="margin-left:65px;cursor:pointer;" id="demo5" name="Address" placeholder="Address"></textarea><span class="demo5"> </span>
</td></tr>
<tr><td>
</table>
</form>
<input type="submit" id="btn1" value="Submit" style="cursor:pointer;" name="submit"> </input>
<button type="button" id="btn2" style="cursor:pointer;">reset</button>
<input type="submit" id="btn3" style="cursor:pointer;" value="Show Table"></button><br><br><br>

<table id="table" border="1px" class="tab" style="background-color:orange;">
	<tr>
		<td>First Name</td>
		<td>Last Name</td>
		<td>EmailId</td>
		<td>Phone No.</td>
		<td>Address </td>
	</tr>
    <tr>
		<td><?php echo $fname ?></td>
		<td><?php echo $lname ?></td>
		<td><?php echo $mail ?></td>
		<td><?php echo $phone ?></td>
		<td><?php echo $addr ?></td><tr>
</table>


<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$("#div1").animate({right: '650px'},3000);
	$("#div2").animate({left: '505px'},3000);
 
	$(":input:not(#btn2,#btn1,#btn3)").focusin(function(){
		$(this).addClass("green");
   });
	$(":input:not(#btn2,#btn1,#btn3)").focusout(function(){
		$(this).removeClass("green");
   });   
   $(":input:not(#btn2,#btn1,#btn3)").mouseover(function(){
		$(this).addClass("orange");
   });
   $(":input:not(#btn2,#btn1,#btn3)").mouseout(function(){
		$(this).removeClass("orange");
    });    
   $("#btn2,#btn1,#btn3").mouseover(function(){
		$(this).addClass("red");
   });
   $("#btn2,#btn1,#btn3").mouseout(function(){
		$(this).removeClass("red");
   });
   
   

	$("#btn3").click(function(){
	$("#table").fadeToggle(1000);
	//$("#btn3").text("Don't show Table");
		if($("#btn3").val()=="Show Table")
		{
		$("#btn3").val("Don't show Table");
		}
		else{
		$("#btn3").val("show Table");
		}
	});


	$("#btn1").click(function(){
	$("#btn1").addClass("green");
        var FirstName = $("#demo1").val();
		var LastName= $("#demo2").val();
		var EmailId = $("#demo3").val();
		var PhoneNo = $("#demo4").val();
		var Address = $("#demo5").val();
		var letters = /^[A-Za-z]+$/;  
		var numbers = /^[0-9]+$/;
		var mail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		var numbers = /^[0-9]+$/;  
		var text1,text2,text3,text4,text5;
				
			if(FirstName.match(letters))   
				  {  
				  text1="Your FirstNamename have accepted";
				
				  } 
			else if(isNaN(FirstName) || FirstName == "")
				  {  
				  text1="Please fill FirstName field";  
				  }  
				  
			else  
				  {  
				 text1="Please input alphabet characters only";   
				  }  

			 if(LastName.match(letters))    
			 {  
				  text2="Your name have accepted";  
				  
				  }  
				  else if(isNaN(LastName) || LastName == "")
				  {  
				  text2="Please fill lastname field";  
				  }   
				  
			else  
				  {  
				  text2="Please input alphabet characters only";  
				  }  

			if(EmailId.match(mail))    
			 {  
				  text3="Your email have accepted";  

				  } 
			 else if(isNaN(EmailId) || EmailId == "")
				  {  
				 text3="Please fill email field"; 
				 
				  } 
				  
			else  
				  {  
				  text3="Please input email only";  
				 
				  }  

			if(PhoneNo.match(numbers))    
			 {  
				  text4="Your phone number have accepted"; 
				  
				  }  
				  
			else if(isNaN(PhoneNo) || PhoneNo == "")
				  {  
				  text4="Please fill phone number field";       
				  } 
			else  
				  {  
				 text4="Please input phone number only";      
				  }  	  
			if(Address == "")
				  {  
				  text5="Please fill Address field";  
				   } 
			else
				   {
				   text5="Your Address have accepted"; 
				   }
				   
				   	$.ajax({
		url:"ajaxsql.php",
		//Data:{checkFirstName:FirstName,checkLastName:LastName,checkEmailId:EmailId,checkPhoneNo:PhoneNo,checkAddress:Address},
		data:{checkFirstName:FirstName,checkLastName:LastName},
		type:"POST",
		success:function(data){
		
		$(".demo1").html(data);
		}
		});
	alert(text1+"\n"+text2+"\n"+text3+"\n"+text4+"\n"+text5); 
	 
	 
	
	});	 
	$("#btn2").click(function(){
		$("#myForm")[0].reset();
   });    
});
</script>
</head>

</body>
</html> 
