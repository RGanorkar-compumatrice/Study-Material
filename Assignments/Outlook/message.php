
<html>
<body background="E:\pictures\images.jpg">

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

            <form action="checkmess.php" method="post">
<table  width="1300px;height=20px;">
			
			
			
			
       
	   <tr><th style="text-align:center;font-size:40px;background-color:brown;color:Gainsboro;"><b>Message</th> </tr>	 



<table>
<tr>
<td>

 <b>To:</b> 

<?php
session_start();
$nsid=$_SESSION["id"];
$nsname=$_SESSION["name"];
$db="user";


$con=mysqli_connect("localhost","root","",$db);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//$result = mysqli_query($con,"SELECT name FROM friend where user_id='".$nsid."' and name!='".$nsname."'");
$result = mysqli_query($con,"SELECT name FROM friend where name!='".$nsname."' and user_id='".$nsid."'");
?>
<select name="friend" style="margin-left:40px;height:40px;width:250px;">
<option value=""> Select Friend </option>
<?php 
while($row = mysqli_fetch_array($result)) {
?>

<option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
<?php
}?>
</select>

</td>
</tr>

<tr>
<td>
<br><b>Message:

<head>

<script src="js/jquery-1.11.1.js"></script>
<script src="tinymce/tinymce.min.js"></script>
<script src="tinymce/plugins/advlist/plugin.js"></script>
<script src="tinymce/plugins/advlist/plugin.min.js"></script>

<script>
$(document).ready(function(){
//alert("inside javascript");
tinymce.init({
    selector: "#message",
    //plugins: ["advlist"],
	   plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
});
</script>

</head> 

<br><br><textarea rows="5" cols="60" style="margin-left:64px;" name="text" id="message"></textarea><br></div>

<br>

<input type="submit" value="send" name="send" style="cursor:pointer;margin-left:260px;font-size:20px;color:greenyellow;background-color:black;">

</td>

</tr>

</table>


<?php




mysqli_close($con);

?> 



<br><br><br><br><br><br><br><br><br><footer style="text-align:right;color:purple;"><b> Copyright 1999-2014 by Compumatrice Multimedia Pvt Ltd. All Rights Reserved.</footer>
</body>
</html>

