<div id="header">	
		<table border="1" width="100%">
			<tr>
				<td>
					LOGO
				</td>
				<td align="right">
					<div id="userinfo">
					Hi <?php echo $_SESSION["username"]?> <br>
					Date: 2-aug-2014 <br>
					<h2><a href="logout.php">Logout</a></h2>
					</div>
				</td>
			</tr>
			
		</table>
	</div>
	<div class="bar">
		<?php echo $pageHeading;?>
	</div>