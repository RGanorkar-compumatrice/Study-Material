<?php

$pageHeading="login";

include("includes/db_conn.php");

if($_SESSION["user_id"]!="")
header("Location:main.php");


if(@$_POST["username"]!="")
{
	$sql="select * from users where username='".$_POST["username"]."' and userpass='".$_POST["userpass"]."'";
	$res = mysql_query($sql);
	//echo "<br>".mysql_affected_rows();
	if(mysql_affected_rows()>0)
		{
			$_SESSION["username"]=$_POST["username"];
			$row = mysql_fetch_array($res);
			$_SESSION["user_id"]=$row["user_id"];
			header("location:main.php");
		}
	else
		{
			header("location:login.php?err=1");
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
		
		$("#loginError").hide();
		if($("#username").val()=="" || $("#userpass").val()=="")
			{
				
				$("#loginError").show(500);
				return false;
			}

		
		return true;
	} // end function frmValidation()
</script>
<body>

<div id="login">

<div id="loginError">
	
	username and password can not be blank.
</div>
<form action="" method="post">
	<table border="0" width="100%"  class="loginTable" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="2" class="heading">
				<h2>Login...</h2>
				<div style="color:#ffffff; font-size:14px;">
					Welcome to myFriends list.
					
				</div>
				<div style="color:#ffffff; font-size:11px;">
					Small information about the site<br/>
					Some text here...
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				Username:
			</td>
			<td>
				<input type="text" name="username" id= "username" value="" style="width:100%" />
			</td>
		</tr>
		<tr>
			<td>
				Password:
			</td>
			<td>
				<input type="text" name="userpass" id="userpass" value="" style="width:100%" />
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<input type="submit" name="loginBtn" value="Login" id="loginBtn" onclick="return frmValidation();" />
			</td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>
