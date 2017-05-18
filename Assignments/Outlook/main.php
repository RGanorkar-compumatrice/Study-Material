
<?php 
//$_SESSION["login"]=$_POST;

session_start();
error_reporting(E_ERROR|E_PARSE);
$name=$_SESSION["id"];
$d=date('Y-m-d H:i:s');
$db="user";

$con=mysqli_connect("localhost","root","",$db);



?>

<html>
<head>
<script src="js/jquery-1.11.1.js"></script>

<style>	
td.text
{
text-align:right;
color:brown;
font-size:20px;

}
 .row-highlight
        {
            background-color: Yellow;
        }
</style>
</head>
<body background="E:\pictures\images.jpg">
<table width="1300px" >
    <tr>
	    <td>
	        <table width="1300px" >
                <tr>
				    <td >
                          <img src="E:\pictures\cm.jpg" height="100px" width="200px" style="float:left;">
                    </td>
                    <td class="text"><p><b><?php include('header1.php');?></p>
					</td>
                </tr>
             </table>
             <br>
             <table  width="1300px;height=10px;">
			     <tr>
				     <th style="text-align:center;font-size:40px;background-color:gray;color:gold;"><b>Main Page</th>
                 </tr>
	         </table>
		     <br>	   
              <table  width="1300px;">
                 <tr>
                     <td>
		<a href="Personal Information.php" style="font-size:40px;margin-left:30px;height:100px;color:orange;"><input type="button" value="Personal Information" style="cursor:pointer;font-size:20px;width:200px;height:70px;color:brown;background-color:darkkhaki;"></a>
	    <a href="Activities.php" style="font-size:40px;margin-left:px;height:10px;width:50px;color:brown;"><input type="button" value="Activities" style="cursor:pointer;font-size:20px;margin-left:px;height:70px;width:200px;color:brown;background-color:DarkKhaki;"></a>
		<a href="Upload Image.php" style="height:100px;width:400px;font-size:40px;margin-left:px;color:salmon;color:brown;"><input type="button" value="Upload Image" style="cursor:pointer;text-align:center;height:70px;width:200px;font-size:20px;margin-left:px;color:salmon;color:brown;background-color:DarkKhaki;"></a>
		<a href="friendlist.php" style="height:100px;width:400px;font-size:40px;color:salmon;color:brown;"><input type="button" value="Friend List" style="cursor:pointer;text-align:;height:70px;width:200px;font-size:20px;color:salmon;color:brown;background-color:DarkKhaki;"></a>
        <a href="message.php" style="font-size:10px;width:300px;height:50px;color:brown;"><input type="button" value="Send Message" style="cursor:pointer;font-size:20px;width:200px;height:70px;color:brown;background-color:darkkhaki;margin-left:px;"></a>
		<a href="checkmess.php" style="font-size:10px;width:300px;height:50px;color:brown;"><input type="button" value="Received Messages" style="cursor:pointer;font-size:20px;width:200px;height:70px;color:brown;background-color:darkkhaki;margin-left:2px;"></a>
		       		       </td>
                      </tr>
              </table></td>

<table><tr><td><table id="tbl" border="1" width="500px">
<tr><th style="color:brown;font-size:18px;">Messages</th><th style="color:brown;font-size:18px;">No.</th></tr>
<?php
	$result1= mysqli_query($con,"SELECT * from friend where user_id='".$name."'");		  
			
while($row=mysqli_fetch_array($result1))
{

?>



<?php
$counter=0;
$fname=$row["name"];

$count=mysqli_query($con,"SELECT f.name,m.message,m.datetime from friend as f,message as m ,login as u where m.toid=u.id and m.loginid=f.logid and m.toid=f.user_id and f.name='".$fname."'");

$counter=mysqli_affected_rows($con);

	//while($row=mysqli_fetch_array($count)){
//$mname=$row['name'];
//$mname= array_unique($row['name']);
?>



  
  <tr><td style="text-align:center;"><?php echo $fname;?></td>
  
  <td style="text-align:center;"><?php echo $counter;?></td>
  </tr>
  <?Php }?>
    </table></td>
  <?php
  /*
  if (isset("imageupload")==true)       
  {
  
  
  }
    */?>
 
<?php 
if($_GET['upload']==true)
{
echo "<script>";
echo "alert('Your image uploaded successfully')";
echo "</script>";
}
$result2=mysqli_query($con,"select * from upload where user_id='".$name."'");
  
  while($row=mysqli_fetch_array($result2))
  {
  $up=$row['imgfile'];
}
?>

 <td><img src="<?php echo $up;?>" height="100px" width="200px" style="margin-left:550px;border-color:brown;border-style:solid;"><p style="color=brown;margin-left:565px;font-size:20px;">Profile picture <a href="Upload image.php" style="color:red;">(Change)</a></p></td>
  
  </tr></table>

  
<table><tr><td style="color:brown;font-size:20;"><b>Message</b></td><tr>
<br><tr><td><div rows="5" cols="60" id="textarea" style="margin-left:0px;" name="text"></div></td></tr>
</table>

        </td>
    </tr>
</table>
 <br><br><br><footer style="color:brown;text-align:right;"> Copyright 1999-2014 by Compumatrice Multimedia Pvt Ltd. All Rights Reserved.</footer>
	<script>
	
	
      $(function() {
		
		    
            var friend="";
            var tr = $('#tbl').find('tr');
			
            tr.click( function( ) {
			    
                var values = '';
				//alert("inside click");
                tr.removeClass('row-highlight');
                var tds = $(this).addClass('row-highlight').find('td');
                

                $.each(tds, function(index, item) {
                    values = values + 'td' + (index + 1) + ':' + item.innerHTML + '<br/>';
				 friend=item.innerHTML;
					//alert(friend);
					
					document.getElementById("textarea").innerHTML=friend;
					return false;
					
                });
                $.post("mainajax.php",{name:friend},function(data,status){
                $("#textarea").html(data);
				//alert(status);
    });
				
				
				
				
				
				
            });
        });
</script>
</body>

</html>
