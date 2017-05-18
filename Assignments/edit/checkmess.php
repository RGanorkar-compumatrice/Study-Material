

<html>
<body background="E:\pictures\wd.jpg">



<br><br><br>



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
}
       </style>

	   
	        <td class="text">
     <p><b><?php include('header.php');?>
	   </tr>
	  
	   
 </table>
			 
			 
<br><br>

            
<table  width="1300px;height=20px;">
			
        <tr>
		
             <th style="text-align:center;font-size:40px;background-color:brown;color:Gainsboro;"><b>Received Message</th>
    
	   </tr>
</table>
<br><br><br>


<?php
session_start();
error_reporting(E_ERROR|E_PARSE);


$toname=$_POST['friend'];


$name=$_SESSION["id"];

$text=$_POST['text'];

$d=date('Y-m-d H:i:s');
$sid="";
$db="user";

$con=mysqli_connect("localhost","root","",$db);

//if(mysqli_connect_errno()){

//echo "Error".mysqli_connect_error();}




$result=mysqli_query($con,"SELECT id FROM friend WHERE name='".$toname."'");



while($row=mysqli_fetch_array($result))
{

$sid=$row['id'];
}

if (isset($_POST['send'])) {
//die("inside save 89898989");
$count=mysqli_query($con,"insert into message(message, loginid, datetime, toid) values ('".$text."', '".$name."', '".$d."','".$sid."')");
//echo "Affetced".mysqli_affected_rows($con);
//die("after qu");
if($count==true){

header("location:message.php");}
}
?>
<?php
$result1= mysqli_query($con,"SELECT f.name,m.message,m.datetime from friend as f,message as m where m.toid='".$name."' and m.loginid=f.id");



echo "<table border='1'>
<tr>
<th>Message</th>
<th>From</th>
<th>Date & Time</th>
</tr>";
//$recv=$row['name'];
//echo $recv;
//die("ddd");
while($row=mysqli_fetch_array($result1))
{
  echo "<tr>";
  echo "<td>" . $row['message'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
   echo "<td>" . $row['datetime'] . "</td>";
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>

<br><br><br><br><br><br><br><br><br><footer style="text-align:right;"> Copyright 1999-2014 by Compumatrice Multimedia Pvt Ltd. All Rights Reserved.</footer>

</body>
</html>

