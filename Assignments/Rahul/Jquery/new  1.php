

<html>
<h2><?php echo $firstname;?>1222</h2>
<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
$firstname=$_POST['FirstName'];
$Lastname=$_POST['LastName'];
$email=$_POST['Email'];
$Phoneno=$_POST['Phoneno'];
$Address=$_POST['Address'];
$db="user";
$con=mysqli_connect("localhost","root","","$db");


$count=mysqli_query($con,"insert into info(FirstName, LastName, EmailId, PhoneNo, Address) values 
('".$firstname."', '".$Lastname."', '".$email."', '".$Phoneno."', '".$Address."')");

while($row=mysqli_fetch_array($result))
{
$fname=$row['FirstName'];
$lname=$row['LastName'];
$mail=$row['EmailId'];
$phone=$row['PhoneNo'];
$addr=$row['Address'];
}

$result=mysqli_query($con,"select * from information");
?>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#bb").click(function(){
	var test = 
        var p = $("#pass").val();
		var letters = /^[A-Za-z]+$/;
if(p.match(letters))
{		
$(".len").text(p);
}<html>
<body>
<?php
error_reporting(E_ERROR|E_PARSE);
$firstname=$_POST['checkFirstName'];
$Lastname=$_POST['checkLastName'];
$email=$_POST['checkEmail'];
$Phoneno=$_POST['checkPhoneno'];
$Address=$_POST['checkAddress'];
$db="test";
$con=mysqli_connect("localhost","root","","$db");

$result1=mysqli_query($con,"SELECT * from information WHERE FirstName = '".$firstname."'");
$check1=mysqli_num_rows($result1);
if($check1>=1){
$fnamestatus= "FirstName is already registered";
}
else{
$fnamestatus= "";
}

$result2=mysqli_query($con,"SELECT * from information WHERE LastName = '".$Lastname."'");
$check=mysqli_num_rows($result1);
if($check2>=1){
$lnamestatus= "LastName is already registered";
}
else{
$lnamestatus= "";
}

$result3=mysqli_query($con,"SELECT * from information WHERE EmailId = '".$email."'");
$check3=mysqli_num_rows($result1);
if($check3>=1){
$emailstatus= "Email is already registered";
}
else{
$emailstatus= "";
}

$result4=mysqli_query($con,"SELECT * from information WHERE PhoneNo = '".$Phoneno."'");
$check4=mysqli_num_rows($result1);
if($check4>=1){
$PhoneNostatus= "PhoneNo is already registered";
}
else{
$PhoneNostatus= "";
}
if($fnamestatus!= "" & $lnamestatus!="" & $emailstatus!="" & $PhoneNotatus!= "")
{
$count=mysqli_query($con,"insert into information(FirstName, LastName, EmailId, PhoneNo, Address) values 
('".$firstname."', '".$Lastname."', '".$email."', '".$Phoneno."', '".$Address."')");
}
?>


$array = array('fnamestatus'=><?php echo $fnamestatus ?>,'lnamestatus'=><?php echo $lnamestatus ?>,'emailstatus'=><?php echo $emailstatus ?>,
'PhoneNostatus'=><?php echo $PhoneNostatus ?>);
json_encode($array);


<p style="font-size:12px;color:orange:"><?php echo $fnamestatus ?> </p>




else
{
$(".len").text("error");
}
    });
});
</script>
</head>
<body>

<h2>This is a heading</h2>

<input type="password" id ="pass"></input>
<p class="len">saddddda</p>

<button id ="bb">Click me</button>

</body>
</html>