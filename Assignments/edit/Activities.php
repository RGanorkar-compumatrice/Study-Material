

<?php 

$db="user";


$con=mysqli_connect("localhost","root","",$db);
if(mysqli_connect_errno())
{

echo "Error".mysqli_connect_error();
}

session_start();

$userid=$_SESSION["id"];

$result=mysqli_query($con,"select * from activity where user_id='".$userid."'");
if(mysqli_affected_rows($con)>0)
{
//die("inside if");
/*$userid12="";

while($row=mysqli_fetch_array($result))
{

$userid12=$row['user_id'];
}*/

//if($userid12!=""||$userid12!=null){

$count=mysqli_query($con,"select * from activity where user_id='".$userid."'");

while($row=mysqli_fetch_array($count)){

//$userid=$row['user_id'];
$Cricket=$row['Cricket'];
$Tennis=$row['Tennis'];
$Football=$row['Football'];
$Badminton=$row['Badminton'];
$Drawing=$row['Drawing'];
$Dance=$row['Dance'];
$Singing=$row['Singing'];
$Reading=$row['Reading'];

?>

<?php
if($Cricket==""||$Cricket==null)
{
$cricket="";
}else{ $cricket="checked";} 

if($Tennis==""||$Tennis==null)
{
$Tennis="";
}else{ $Tennis="checked";} 


if($Football==""||$Football==null)
{
$Football="";
}else{ $Football="checked";} 


if($Badminton==""||$Badminton==null)
{
$Badminton="";
}else{ $Badminton="checked";} 


if($Drawing==""||$Drawing==null)
{
$Drawing="";
}else{ $Drawing="checked";} 


if($Dance==""||$Dance==null)
{
$Dance="";
}else{ $Dance="checked";} 



if($Singing==""||$Singing==null)
{
$Singing="";
}else{ $Singing="checked";} 



if($Reading==""||$Reading==null)
{
$Reading="";
}else{ $Reading="checked";}         
		 

 ?>





<html>
<body background="E:\pictures\bsk.jpg">




	

         <table width="1300px" height="630px">
    <tr>
<td>
	    <table width="1300px" >

     <tr>

<td >
<img src="E:\pictures\cm.jpg" height="100px" width="170px" style="float:left;">
</td>
      <style>	
td.text
{
text-align:right;
color:cyan;
font-size:20px;

}
       </style>
<td class="text">
<p><b><?php include('header.php');?>
     </tr>

    </table>
			 <br>
			 
			 <form action="checkactivity.php" method="post">	
            <table  width="1300px;height=10px;">
			
        <tr>
		
<th style="text-align:center;font-size:45px;background-color:gray;color:gold ;"><b>Activities</th>
    
	</tr>
	
	        </table>
			
			
	
			
			<table width="800px" height="200px" align="center" style="background-color:SkyBlue;">
		<tr>	
		
	<td>

<div style="text-align:center;font-size:30px;color:FireBrick ;background-color:gray">Sports</div>
	    
      <br>		 
<div><input type="checkbox" value="<?php echo $row['Cricket'];?>" name="cricket" <?php echo $cricket;?>><b>Cricket</div>
<div><input type="checkbox" value="<?php echo $row['Tennis'];?>" name="tennis" <?php echo $Tennis;?>><b>Tennis</div>
<div><input type="checkbox" value="<?php echo $row['Football'];?>" name="football" <?php echo $Football;?>><b>Football</div>
<div><input type="checkbox" value="<?php echo $row['Badminton'];?>" name="badminton" <?php echo $Badminton;?>><b>Badminton</div>
		
		
		
		</td>
		
		<br>
		
		<td>
		
		
		
		<div style="text-align:center;font-size:30px;color:FireBrick ;background-color:gray">Hobbies</div>
	    
      <br>
		 
		
		 
<div><input type="checkbox" value="<?php echo $row['Drawing'];?>" name="drawing" <?php echo $Drawing;?>><b>Drawing</div>
<div><input type="checkbox" value="<?php echo $row['Dance'];?>" name="dance" <?php echo $Dance;?>><b>Dance</div>
<div><input type="checkbox" value="<?php echo $row['Singing'];?>" name="singing" <?php echo $Singing;?>><b>Singing</div>
<div><input type="checkbox" value="<?php echo $row['Reading'];?>" name="reading" <?php echo $Reading;?>><b>Reading</div>
		
	
		</td>
		
		
		</tr>
		</table>
		
		<br><br><br>
		
		<div align="center"><a href="main.php" ><input type="submit" value="save" name="submit" style="cursor:pointer;font-size:25px;color:greenyellow;background-color:black;">
		
		
		
		
			
			</tr>
	
	
	      </table>
		<footer style="color:cyan;text-align:right;"> Copyright 1999-2014 by Compumatrice Multimedia Pvt Ltd. All Rights Reserved.</footer>
	
	</form>

	</body>
	</html>
	
	<?php }

//die("outside while");

}else{
//die("inside else");
//echo "You don't have records to display";
//die("qqq");} 

	
//die("ppp");	

?>
	
	
	<html>
<body background="E:\pictures\bsk.jpg">

<form action="checkactivity.php" method="post">		

         <table width="1300px" height="630px">
    <tr>
<td>
	    <table width="1300px" >

     <tr>

<td >
<img src="E:\pictures\cm.jpg" height="100px" width="170px" style="float:left;">
</td>
      <style>	
td.text
{
text-align:right;
color:cyan;
font-size:20px;

}
       </style>
<td class="text">
<p><b><?php include('header.php');?>
     </tr>

    </table>
			 <br>
            <table  width="1300px;height=10px;">
			
        <tr>
		
<th style="text-align:center;font-size:45px;background-color:gray;color:gold ;"><b>Activities</th>
    
	</tr>
	
	        </table>
			
			
	
			
			<table width="800px" height="200px" align="center" style="background-color:SkyBlue;">
		<tr>	
		
	<td>

<div style="text-align:center;font-size:30px;color:FireBrick ;background-color:gray">Sports</div>
	    
      <br>		 
<div><input type="checkbox" name="checkbox[]"><b>Cricket</div>
<div><input type="checkbox" name="tennis"><b>Tennis</div>
<div><input type="checkbox" name="football"><b>Football</div>
<div><input type="checkbox" name="badminton"><b>Badminton</div>
		
		
		
		</td>
		
		<br>
		
		<td>
		
		
		
		<div style="text-align:center;font-size:30px;color:FireBrick ;background-color:gray">Hobbies</div>
	    
      <br>
		 
		
		 
<div><input type="checkbox" name="drawing"><b>Drawing</div>
<div><input type="checkbox" name="dance"><b>Dance</div>
<div><input type="checkbox" name="singing"><b>Singing</div>
<div><input type="checkbox" name="reading"><b>Reading</div>
		
	
		</td>
		
		
		</tr>
		</table>
		
		<br><br><br>
		
		<div align="center"><a href="main.php" ><input type="submit" value="save" name="submit" style="cursor:pointer;font-size:25px;color:greenyellow;background-color:black;">
		
		
		
		
			
			</tr>
	
	
	      </table>
		<footer style="color:cyan;text-align:right;"> Copyright 1999-2014 by Compumatrice Multimedia Pvt Ltd. All Rights Reserved.</footer>
	
	</form>

	</body>
	</html>
	
	<?php }?>
	
	
	
	
	
	