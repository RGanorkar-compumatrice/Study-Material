
		
	


Hi <?php 

	error_reporting(E_ERROR|E_PARSE);

echo $_SESSION["name"]?> <br>
		<font class="text">Date: </font><?php $d=date('d-m-Y'); echo "$d";?><br>
		<br><a href="login.php"><input type="button" value="Logout" style="cursor:pointer;font-size:20px;color:crimson;background-color:black;"></a>
	
<a href="main.php"><input type="button" value="Back" style="cursor:pointer;width:83px;font-size:20px;color:greenyellow;background-color:black;"></a>
	

