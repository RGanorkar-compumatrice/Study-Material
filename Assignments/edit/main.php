
<?php session_start();?>

<?php
$_SESSION["login"]=$_POST;


echo "<br>";
?>

<html>
<head>
<body background="E:\pictures\py.jpg">




<table width="1300px" >
    <tr>
        <td>
	    
		
<table width="1300px" >

     <tr>

          <td >

		  <img src="E:\pictures\cm.jpg" height="100px" width="200px" style="float:left;">

           </td>
      
	  
	  <style>	
td.text
{
text-align:right;
color:orange;
font-size:20px;

}



       </style>

	   
	       <td class="text"><p><b><?php include('header1.php');?>
     
	 
	 </tr>

    

</table>
			 
			 
<br><br>

<table  width="1300px;height=10px;">
			
        <tr>
		
            <th style="text-align:center;font-size:40px;background-color:gray;color:gold;"><b>Main Page</th>
    
	    </tr>
	
</table>
		   
		   
		   
<table  width="1300px;">
 
         <tr>
 
              <td><a href="Personal Information.php" style="font-size:40px;height:100px;color:brown;"><input type="button" value="Personal Information" style="cursor:pointer;font-size:40px;width:400px;height:70px;color:brown;background-color:darkkhaki;"></a><a href="message.php" style="font-size:10px;width:300px;height:50px;color:brown;"><input type="button" value="Send Message" style="cursor:pointer;font-size:20px;width:200px;height:70px;color:brown;background-color:darkkhaki;margin-left:530px;"></a><a href="checkmess.php" style="font-size:10px;width:300px;height:50px;color:brown;"><input type="button" value="Received Messages" style="cursor:pointer;font-size:20px;width:200px;height:70px;color:brown;background-color:darkkhaki;margin-left:2px;"></a></td>

         </tr>
 
 
         <tr>

		        <td><br><a href="Activities.php" style="font-size:40px;margin-left:150px;height:10px;width:50px;color:brown;"><input type="button" value="Activities" style="cursor:pointer;font-size:40px;margin-left:300px;height:70px;width:400px;color:brown;background-color:DarkKhaki;"></a></td>
     
	 
	     </tr> 

	 
	 <br><br>

         <tr>

		 
		        <td>
				
<br><br><a href="friendlist.php" style="height:100px;width:400px;font-size:40px;color:salmon;color:brown;"><input type="button" value="Friend List" style="cursor:pointer;text-align:;height:70px;width:400px;font-size:40px;color:salmon;color:brown;background-color:DarkKhaki;"></a><a href="Upload Image.php" style="height:100px;width:400px;font-size:40px;margin-left:30px;color:salmon;color:brown;"><input type="button" value="Upload Image" style="cursor:pointer;text-align:center;height:70px;width:400px;font-size:40px;margin-left:500px;color:salmon;color:brown;background-color:DarkKhaki;"></a>


                </td>


         </tr>
	
	
</table>
		 </tr>
	
</table>
	
  <br><br><br><footer style="color:cyan;text-align:right;"> Copyright 1999-2014 by Compumatrice Multimedia Pvt Ltd. All Rights Reserved.</footer>

		
		
</body>
</head>
</html>