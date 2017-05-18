<html><body>
<table>
<tr><td><h style="color:gold; font-size:30px;"><b><i>Average Rating = </i></b></h><input type="text" name="ave" id="ave" value=""></input>
<br>
<body background="E:\pictures\py.jpg">
<br>
<img src="E:\pictures\sb.jpg" height="360px" width="500px"><br><br>
<p style="color:gold; font-size:20px;"><b><i>Rate this image:</i></p> 
<div class="basic" data-average="12" data-id="1"></div><br>
 <form method="POST">
  
<input type="hidden" name="r1" id="r" value=""></input>
<input type="hidden" name="r15" id="r15" value=""></input>
<input type="submit" value="Submit" name="submit1" class="submit" style="cursor:pointer;font-size:20px;color:greenyellow;background-color:black;margin-left:20px;"></input>
      </Form>
</td>
 
 
 <td>
 <Div style="margin-left:170px;">
<br>
<img src="E:\pictures\bs.jpg" height="360px" width="500px"><br><br>

<p style="color:gold; font-size:20px;"><b><i>Rate this image:</i></p> 
<div class="basic1" data-average="12" data-id="1"></div><br>
<Div>
</td>
</tr>



 </body>
 <head>
<link rel="stylesheet" type="text/css" href="jquery/jRating.jquery.css" media="screen" />
<link rel="stylesheet" href="style.css"/>
<!-- jQuery files -->
<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jRating.jquery.js"></script>


 <script type="text/javascript">
$(document).ready(function(){
 $(".basic").jRating({
   decimalLength : 1,
	         rateMax : 5,
       



      }); 
	  
	  $(".basic").jRating({
        onClick : function(element,rate) {
     var x=rate;
	 
         alert("Your Rating is" +x);
		 $('#r').attr("value",rate);
		 	 
        }
      }); 
	  
	   $(".basic1").jRating({
   decimalLength : 1,
	         rateMax : 5,
       



      }); 
	  
	  $(".basic1").jRating({
        onClick : function(element,rate) {
     var x=rate;
	 
         alert("Your Rating is" +x);
		 $('#r15').attr("value",rate);
		 	 
        }
      }); 

});
</script>
</head>
 
<?php
if (isset($_POST['submit1'])) {
session_start();

error_reporting(E_ERROR|E_PARSE);

$star=$_POST['r1'];
$star15=$_POST['r15'];
//echo $star;
//echo $star15;


$db="user";

$con=mysqli_connect("localhost", "root", "", "$db");

$count=mysqli_query($con,"insert into items(rating,rating2) values('".$star."', '".$star15."')");




$result1 = mysqli_query($con,"SELECT COUNT(rating) FROM items;");
  while($row = mysqli_fetch_array($result1)) {
  $rows=$row['COUNT(rating)'];
 
  }
  //echo $rows;
 $result = mysqli_query($con,"SELECT SUM(rating) FROM items;");
 while($row = mysqli_fetch_array($result)) {
 $rate=$row['SUM(rating)'];

}

//echo $rate;
 $result2 = mysqli_query($con,"SELECT SUM(rating2) FROM items;");
 while($row = mysqli_fetch_array($result2)) {
 $rate2=$row['SUM(rating2)'];

}
}
//echo $rate2;
?>	  

</body></html>