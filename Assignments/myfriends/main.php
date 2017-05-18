<?php
include("includes/db_conn.php");
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/jquery-1.11.1.js"></script>

<script>
$( document ).ready(function() {

//console.log( "document loaded" );

$("#perinfoBox").click(function(){

window.location.href="per_info.php";
});
});

</script>
<body>
<div id="maindiv" >
	
	
	<div class="mainContent">
	
	<?php 
	$pageHeading="Main...";
	include("includes/header.php");
	?>
	
	
	<?php
		if($_SESSION["phpMessage"]!="" || 1==1) {
	?>
	<div id="phpMessage">
		<?php 
		echo $_SESSION["phpMessage"] ;
		$_SESSION["phpMessage"] = "";
		?>
	</div>
	<?php
		}
	?>
	<table width="100%" align="center" border="0">
		<tr>
			<td align="right">
			
				<div class="linkBlocks" id="perinfoBox">
					Personal Information
					<div id="perInfo" class="info">
					Click to enter your personal information
					</div>
				</div>
			</td>
			<td align="left">
				<div class="linkBlocks">
					Activities
					<div id="perInfo" class="info">
					Click to select your personal activities
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
		
				<div class="linkBlocks">
					Upload image
					<div id="perInfo" class="info">
					Click to upload profile image
					</div>
				</div>
			</td>
		</tr>
	</div>
</div>
</body>
</html>
