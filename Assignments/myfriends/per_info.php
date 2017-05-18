<?php
include("includes/db_conn.php");



$fname="";
$lname="";

$city="";
$mode="ADD";
if(@$_POST["SaveBtn"]!="")
{
	if($_POST["mode"]=="ADD")
	{
	$sql="INSERT INTO `myfriends`.`per_info` (`per_info_id`, `user_id`, `fname`, `lname`, `city`) 
			VALUES (NULL, '".$_SESSION["user_id"]."', '".$_POST["fname"]."', '".$_POST["lname"]."', '".$_POST["city"]."');";
		$res = mysql_query($sql);
	//	echo "<br>".mysql_affected_rows();
	$_SESSION["phpMessage"]="Personal Information Added successfully ";
	}
	else if($_POST["mode"]=="EDIT")
	{
	$sql="UPDATE `myfriends`.`per_info` SET  `fname` =  '".$_POST["fname"]."', `lname` = '".$_POST["lname"]."', `city` = '".$_POST["city"]."' WHERE `user_id` = '".$_SESSION["user_id"]."'";
		$res = mysql_query($sql);
	//	echo "<br>".mysql_affected_rows();'".$_POST["lname"]."'
	$_SESSION["phpMessage"]="Personal Information Updated successfully ";
	}
	header("Location:main.php");

}
else{
	$sql="SELECT * FROM `myfriends`.`per_info` WHERE `user_id` = '".$_SESSION["user_id"]."' ";
	$res = mysql_query($sql);
//	echo "<br>".mysql_affected_rows();
	
	while ($row = mysql_fetch_array($res)) {
		//echo "<br> aa ".$row["fname"];
		
		$fname=$row["fname"];
		$lname=$row["lname"];
		$city=$row["city"];
		$mode="EDIT";
}

}
?>
<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/jquery-1.11.1.js"></script>

<script>
$( document ).ready(function() {

//console.log( "document loaded" );
});





function frmValidation()
	{
	
	
		var isError=false;
		$(".errorMsg").hide();
		if($("#fname").val()=="")
			{
				isError=true;
				$("#errorFname").show(500);
				
			}

		if($("#lname").val()=="")
			{
				isError=true;
				$("#errorLname").show(500);
				
			}
			
			
			if($("#city").val()=="")
			{
				isError=true;
				$("#errorCity").show(500);
			
			}
			
			if(isError)
				return false;
			else
				return true;
	} // end function frmValidation()
</script>
<body>
<div id="maindiv" >
	
	
	<div class="mainContent">
	
	<?php 
	$pageHeading="Personal Information...";
	include("includes/header.php");
	?>
<form action="" method="post">
	<table width="500" align="center" border="0">
		<tr>
			<td align="right" width="100">
			
				First Name
			</td>
			<td align="left" width="160">
				<input type="text" name="fname" id="fname" value="<?php echo $fname?>"  />
			</td>
			<td >
				<div class="errorMsg" id="errorFname">Please enter valid First Name</div>
			</td>
		</tr>
		<tr>
			<td align="right">
			
				Last  Name
			</td>
			<td align="left">
				<input type="text" name="lname" id="lname" value="<?php echo $lname?>"  />
			</td>
			<td >
				<div class="errorMsg" id="errorLname">Please enter valid Last Name</div>
			</td>
		</tr>
		<tr>
			<td align="right">
			
				City
			</td>
			<td align="left">
				<select name="city" id="city" >
					<option value="">Select City</option>
					<option value="Pune" <?php echo ($city=="Pune"? " SELECTED " : " " )?> >Pune</option>
					<option value="Mumbai" <?php echo ($city=="Mumbai"? " SELECTED " : " " )?>>Mumbai</option>
					<option value="Nagpur" <?php echo ($city=="Nagpur"? " SELECTED " : " " )?>>Nagpur</option>
				</select>
			</td>
			<td >
				<div class="errorMsg" id="errorCity">Please select City</div>
			</td>
		</tr>
		<tr>
			<td align="right">
			
				&nbsp;
			</td>
			<td align="left">
				<input type="hidden" name="mode" value="<?php echo $mode?>" />
				<input type="submit" name="SaveBtn" value="Save" id="SaveBtn" onclick="return frmValidation();"  />
			</td>
		</tr>
		</table>
	</div>
</div>
</body>
</html>
