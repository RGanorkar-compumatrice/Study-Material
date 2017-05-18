






<?php

$db="user";


$con=mysqli_connect("localhost","root","",$db);
if(mysqli_connect_errno())
{

echo "Error".mysqli_connect_error();
}
session_start();

$userid=$_SESSION["id"];

$result=mysqli_query($con,"select * from info where user_id='".$userid."'");

$userid12="";

while($row=mysqli_fetch_array($result))
{

$userid12=$row['user_id'];
}

if($userid12!=""||$userid12!=null){

$count=mysqli_query($con,"select * from info where user_id='".$userid."'");

while($row=mysqli_fetch_array($count)){


?>


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
     <b><?php include('header.php');?><td>
	   </tr>

 </table>
			 
			 
<br><br>
<form action="checkinfo.php" method="post">
            
<table  width="1300px;height=20px;">
			
        <tr>
		
             <th style="text-align:center;font-size:40px;background-color:brown;color:Gainsboro;"><b>Personal Information</th>
    
	   </tr>

    
	   <tr>
	
            <td><b>First Name: <input type="text" name="FirstName" value="<?php echo $row['fname'];?>" style="margin-left:74px;height:40px;width:300px;"></td>

      </tr>

      <tr>
           <td><b>Last Name: <input type="text" name="LastName" value="<?php echo $row['lname'];?>" style="margin-left:76px;height:40px;width:300px;"></td>

      </tr>

      <tr>
           <td><b>Date of Birth: <input type="text" name="DateofBirth" value="<?php echo $row['dob'];?>" style="margin-left:60px;height:40px;width:300px;"></td>

      </tr>

      <tr>
	   
           <td><b>City: <select name="City" style="margin-left:120px;height:40px;width:300px;">


<option value="<?php echo $row['City'];?>"><?php echo $row['City'];?></option>


</select>
            </td>

      </tr>

      <tr>
		
             <td><b>Address: <input type="text" name="Address" value="<?php echo $row['Address'];?>" style="margin-left:95px;height:70px;width:400px;"></td></tr>

      <tr>
		
              <td><b><input type="submit" value="Save" style="cursor:pointer;font-size:20px;margin-left:160px;color:greenyellow;background-color:black;"><a href="main.php" style="font-size:40px;height:100px;color:brown;">

      </tr>


      </tr>
	   
</table>

			  
              </td>
      </tr>
		 
</table>

</form>
<br><br><br><footer style="text-align:right;"> Copyright 1999-2014 by Compumatrice Multimedia Pvt Ltd. All Rights Reserved.</footer>

</body>
</html>
<?php }

}else{

} ?>


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
<form action="checkinfo.php" method="post">
            
<table  width="1300px;height=20px;">
			
        <tr>
		
             <th style="text-align:center;font-size:40px;background-color:brown;color:Gainsboro;"><b>Personal Information</th>
    
	   </tr>

    
	   <tr>
	
            <td><b>First Name: <input type="text" name="FirstName" style="margin-left:74px;height:40px;width:300px;"></td>

      </tr>

      <tr>
           <td><b>Last Name: <input type="text" name="LastName" style="margin-left:76px;height:40px;width:300px;"></td>

      </tr>

      <tr>
           <td><b>Date of Birth: <input type="text" name="DateofBirth" style="margin-left:60px;height:40px;width:300px;"></td>

      </tr>

      <tr>
	   
           <td><b>City: <select name="City" style="margin-left:120px;height:40px;width:300px;">

<option value=""> Select City </option>
<option value="Pune">Pune</option>
<option value="Mumbai">Mumbai</option>
<option value="Nagpur">Nagpur</option>
<option value="Amravati">Amravati</option>

</select>
            </td>

      </tr>

      <tr>
		
             <td><b>Address: <input type="text" name="Address" style="margin-left:95px;height:70px;width:400px;"></td></tr>

      <tr>
		
              <td><b><input type="submit" value="Save" style="cursor:pointer;font-size:20px;margin-left:160px;color:greenyellow;background-color:black;">

      </tr>


      </tr>
	   
</table>

			  
              </td>
      </tr>
		 
</table>

</form>
<footer style="text-align:right;"> Copyright 1999-2014 by Compumatrice Multimedia Pvt Ltd. All Rights Reserved.</footer>

</body>
</html>

