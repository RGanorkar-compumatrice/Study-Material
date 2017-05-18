
<?php session_start();?>
<html>
<body background="E:\pictures\nm.jpg">



         <table width="130px" height="600px">
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
color:orange;
font-size:20px;
}
       </style>
<td class="text"><p><b><?php include('header.php');?>
     </tr>

    

             </table>
			 
			 
<br><br>
	<form action="checkupload.php" enctype="multipart/form-data" method="post" name="form1">

            <table  width="1300px;height=20px;">
			
        <tr>
		
<th style="text-align:center;font-size:40px;background-color:purple;color:gold;"><b>Upload Image</th>
    
	</tr>
	
	       </table>
	

	
	
	      <table width="1300px;height=20px;">
	<br><br><br>
	<tr>
	
	
	
<td style="text-align:center;font-size:20px;color:cyan;"><b>Select File: <input type="file" name="SelectFile" id="upload123" style="text-align:center;font-size:17px;"></td>	
	</tr>
	
	<tr>
	
	<td><br><br>
	
<div style="text-align:center;"><input type="submit" value="upload Image" onclick="return checkPhoto()" style="cursor:pointer;text-align:center;font-size:20px;color:greenyellow;background-color:black; "> </div>	
	
	</form>
	</tr>
	
	
	      </table>
		  
		  <script>
		  
function checkPhoto() 
{

 var imagePath = document.form1.upload123.value;

 var pathLength = imagePath.length;
 var lastDot = imagePath.lastIndexOf(".");
 var fileType = imagePath.substring(lastDot,pathLength);

 if((fileType == ".gif") || (fileType == ".png")||(fileType == ".PNG")||(fileType == ".jpg") || (fileType == ".GIF") || (fileType == ".JPG")) {
  return true;
 } else {
  alert("We supports .JPG, .PNG, and .GIF image formats. Your file-type is " + fileType + ". If you are having difficulties with this step, please send an e-mail to trevor@trevor.net.");
document.getElementById("upload123").focus();
  }
  }
  </script> 

<br><br><br><br><br><br><br><br><br><br><br><br><br><footer style="color:cyan;text-align:right;"> Copyright 1999-2014 by Compumatrice Multimedia Pvt Ltd. All Rights Reserved.</footer>
	</body>
	</html>

	
	
	