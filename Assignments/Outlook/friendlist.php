<html>
<body background="E:\pictures\wd.jpg">

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
<form action="checkfriend.php" method="post">
            
<table  width="1300px;height=20px;">
			
			
			
			
       
	   <tr><th style="text-align:center;font-size:40px;background-color:brown;color:Gainsboro;"><b>Friend List</th> </tr>	  

  




	  <tr>

            <td style="color:purple;font-size:20px;"><b>Name:</b> 
				  <?php
session_start();
$lsid=$_SESSION["id"];
$lsname=$_SESSION["name"];
$db="user";


$con=mysqli_connect("localhost","root","",$db);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//$result = mysqli_query($con,"SELECT name FROM friend where user_id='".$nsid."' and name!='".$nsname."'");
$result = mysqli_query($con,"SELECT name FROM login where name!='".$lsname."'");
?>
			
			
			<select name="Name" style="margin-left:63px;height:35px;width:250px;">
			<option value=""> Select Friend </option>
			<?php 
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
<?php
}?>
			</td>

      </tr>

     
	  <tr>
           <td style="color:purple;font-size:20px;"><b>City: <input type="text" name="City" style="margin-left:76px;height:35px;width:250px;"></td>

      </tr>
	  
	   <tr>
           <td style="color:purple;font-size:20px;"><b>Mobile No.: <input type="integer" name="Mobile" style="margin-left:17px;height:35px;width:250px;"></td> </tr>
	  
	
	   <tr>
           <td><input type="submit" value="Add" style="cursor:pointer;margin-left:124px;font-size:20px;color:greenyellow;background-color:black;"></form>

         
	  
	  
	  </tr>
	  
	  
	  </table>
	  
	  
	  <br><br>
	  <?php
	  SESSION_START();
	  $frid="";
	  $frsid=$_SESSION["id"];
	
$db="user";
$con=mysqli_connect("localhost","root","",$db);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM friend where user_id='".$frsid."'");
//$result = mysqli_query($con,"SELECT * FROM friend");
//*echo "<table border='1'>
//<tr>
//<th>Firstname</th>
//<th>City</th>
//<th>Mobile No.</th>
//</tr>";

//while($row = mysqli_fetch_array($result)) {
  //echo "<tr>";
  //echo "<td>" . $row['name'] . "</td>";
  //echo "<td>" . $row['city'] . "</td>";
   //echo "<td>" . $row['mobile'] . "</td>";
  //echo "</tr>";}

//echo "</table>";

//mysqli_close($con);

while($row = mysqli_fetch_array($result)) {
$frid=$row['id'];
?>
<html>
<body>
<form action="edit.php" method="post">
<table border='1' width="400px">
<tr>
<th>Firstname</th>
<th>City</th>
<th>Mobile No.</th>
<th>Action</th>
</tr>


<tr>
<td><p><?php echo $row['name'];?></p></td>
<td><p><?php echo $row['city'];?></p></td>
<td><p><?php echo $row['mobile'];?></p></td>
<td><p><a href="edit.php?eid=<?php echo $frid;?>">Delete</a></p></td>
  </tr>
</table>
<?php }?>

	  
	  
	  
	
<br><br><br><br><br><br><footer style="text-align:right;color:purple;"><b> Copyright 1999-2014 by Compumatrice Multimedia Pvt Ltd. All Rights Reserved.</footer>
</body>	  
</html>
