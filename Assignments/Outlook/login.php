<?php session_start();
//$id=$_SESSION['id'];


//if(!$_SESSION['logged']){ 
   // header('Location:personal information.php'); 
	//session_destroy();}
   
//else{

// header('Location:login.php'); 
?>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



<script>
$(document).ready(function(){
  $("input").focus(function(){
    $(this).css("background-color","orange");
  });
  $("select").focus(function(){
    $(this).css("background-color","orange");
  });
  $("input").blur(function(){
    $(this).css("background-color","red");
  });
});
</script>

</head>
<body background="E:\pictures\hfd.jpg">




<form action="check.php" method="post">

<h1><b>Login...</b></h1>


<div><img src="E:\pictures\cm.jpg" height="100px" width="200px" style="float:left;"><div>



<style>
.tbl
{
color:orange;
font-size:25px;
text-align:center;
height:150px;
}
h1
{
text-align:center;
background-color:orange;
}
</style>

<br><br><br><br><br>


<form action="check.php" method="post">

<table align="center" class="tbl" width="500" >

     
	 
	 <td><b>Username: 
	 
	 <select name="Username" style="height:27px;width:145px;">
<option value=""> Select </option>
<option value="Rahul">Rahul</option>
<option value="Amol">Amol</option>
<option value="Harshal">Harshal</option>
	 
	 
	 
	 
	 </td>


<br><br>


     <tr>

	 
	       <td>

		   
		   
<b>Password: <input type="password" name="Password">

            </td>

        </tr>
        
		
		<tr>
			
			<td>
				<input type="submit" value="Login"  style="cursor:pointer;font-size:20px;color:black;background-color:orange;margin-left:41px;">
			</td>
		
		
		</tr>
</table>


</form>


<br><br><br><br><br><br><br><br><br><br><br><footer style="color:cyan;text-align:right;"> Copyright 1999-2014 by Compumatrice Multimedia Pvt Ltd. All Rights Reserved.</footer>





</body>
</html>
