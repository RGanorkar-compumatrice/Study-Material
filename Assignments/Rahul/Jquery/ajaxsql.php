
<?php
error_reporting(E_ERROR|E_PARSE);
$firstname=$_POST['checkFirstName'];
$laststname=$_POST['checkLastName'];

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
$check2=mysqli_num_rows($result1);
if($check2>=1){
$lnamestatus= "LastName is already registered";
}
else{
$lnamestatus= "";
}
if($firstname!="" && $laststname!="")
{
$count=mysqli_query($con,"insert into information(FirstName, LastName, EmailId, PhoneNo, Address) values 
('".$firstname."', '".$Lastname."', '".$email."', '".$Phoneno."', '".$Address."')");
}
else{
}

//$array = array('fnamestatus'=>$firstname,'lnamestatus'=>$laststname);
//echo json_encode($array);


?>
<p style="font-size:12px;color:orange:"><?php echo $fnamestatus ?> </p>


</body>
</html>


