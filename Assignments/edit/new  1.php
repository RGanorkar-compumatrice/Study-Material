


<?php

$db="user";


$con=mysqli_connect("localhost","root","",$db);
if(mysqli_connect_errno())
{

echo "Error".mysqli_connect_error();
}
session_start();

$frid=$_SESSION["id"];




$result=mysqli_query($con,"select * from message where id='".$frid."'");



$frid12="";

while($row=mysqli_fetch_array($result))
{

//echo $row['message'];
//die("zzz");


$frid12=$row['id'];
//die("zzz");
}

if($frid12!=""||$frid12!=null){

$count=mysqli_query($con,"select * from friend where id='".$frid."'");

while($row=mysqli_fetch_array($count)){


?>



<html>
<body background="E:\pictures\images.jpg">

<form action="checkmess.php" method="post">





<table width="1300px" ">
	<tr>
		<td>
	    
<table width="1300px">

     <tr>

        <td >
<img src="E:\pictures\cm.jpg" height="100px" width="170px" style="float:left;">
        </td>

      <style>	
td.text
{
text-align:right;
font-size:20px;
color:purple;
}

       </style>

	   
	        <td class="text">
<p><b><?php include('header.php');?>
     
	   </tr>

 </table>
			 
			 
<br><br>

            
<table  width="1300px;height=20px;">
			
			
			
			
       
	   <tr><th style="text-align:center;font-size:40px;background-color:brown;color:Gainsboro;"><b>Message</th> </tr>	 



<table>
<tr>
<td>

 <b>To:</b> 

<?php
$db="user";
$con=mysqli_connect("localhost","root","",$db);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT name FROM friend");
?>
<select name="friend" style="margin-left:40px;height:40px;width:250px;">
<option value=""> Select Friend </option>
<?php 
while($row = mysqli_fetch_array($result)) {
?>

<option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
<?php
}?>
</select>

</td>
</tr>

<tr>
<td>
<br><b>Message:<br><textarea rows="5" cols="60" style="margin-left:64px;" name="text"><?php echo $row['message'];?></textarea><br></div>

<br>

<input type="submit" value="send" style="cursor:pointer;margin-left:65px;font-size:20px;color:greenyellow;background-color:black;">

</td>

</tr>

</table>





<?php




mysqli_close($con);
?> 



<br><br><br><br><br><br><br><br><br><footer style="text-align:right;color:purple;"><b> Copyright 1999-2014 by Compumatrice Multimedia Pvt Ltd. All Rights Reserved.</footer>
</body>
</html>

<?php }

}else{

} ?>





<html>
<body background="E:\pictures\images.jpg">

<form action="checkmess.php" method="post">





<table width="1300px" ">
	<tr>
		<td>
	    
<table width="1300px">

     <tr>

        <td >
<img src="E:\pictures\cm.jpg" height="100px" width="170px" style="float:left;">
        </td>

      <style>	
td.text
{
text-align:right;
font-size:20px;
color:purple;
}

       </style>

	   
	        <td class="text">
<p><b><?php include('header.php');?>
     
	   </tr>

 </table>
			 
			 
<br><br>

            
<table  width="1300px;height=20px;">
			
			
			
			
       
	   <tr><th style="text-align:center;font-size:40px;background-color:brown;color:Gainsboro;"><b>Message</th> </tr>	 



<table>
<tr>
<td>

 <b>To:</b> 

<?php
$db="user";
$con=mysqli_connect("localhost","root","",$db);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT name FROM friend");
?>
<select name="friend" style="margin-left:40px;height:40px;width:250px;">
<option value=""> Select Friend </option>
<?php 
while($row = mysqli_fetch_array($result)) {
?>

<option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
<?php
}?>
</select>

</td>
</tr>

<tr>
<td>
<br><b>Message:<br><textarea rows="5" cols="60" style="margin-left:64px;" name="text"></textarea><br></div>

<br>

<input type="submit" value="send" style="cursor:pointer;margin-left:65px;font-size:20px;color:greenyellow;background-color:black;">

</td>

</tr>

</table>





<?php




mysqli_close($con);
?> 



<br><br><br><br><br><br><br><br><br><footer style="text-align:right;color:purple;"><b> Copyright 1999-2014 by Compumatrice Multimedia Pvt Ltd. All Rights Reserved.</footer>
</body>
</html>

