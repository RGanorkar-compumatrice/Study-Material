<html><body>

<body background="E:\pictures\bg.jpg">
<img src="E:\pictures\sb.jpg" height="360px" width="1000px"><br><br>
<h style="color:gold; font-size:30px;"><b><i>Average Rating = </i></b></h><input type="text" name="ave" id="ave" value=""></input>
<p style="color:gold; font-size:20px;"><b><i>Rate this image:</i></p> 
<div class="basic" data-average="12" data-id="1"></div><br>

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


});
</script>
</head>
  <form method="POST">
  
<input type="hidden" name="r1" id="r" value=""></input>
<input type="submit" value="Submit" name="submit1" class="submit" style="cursor:pointer;font-size:20px;color:greenyellow;background-color:black;margin-left:20px;"></input>
      </Form>
<?php
if (isset($_POST['submit1'])) {
session_start();

error_reporting(E_ERROR|E_PARSE);

$star=$_POST['r1'];
//echo $star;

$db="user";

$con=mysqli_connect("localhost", "root", "", "$db");

$count=mysqli_query($con,"insert into items(rating) values('".$star."')");
}


/*
$result1 = mysqli_query($con,"SELECT COUNT(rating) FROM items;");
  while($row = mysqli_fetch_array($result1)) {
  $rows=$row['COUNT(rating)'];
 
  }
  //echo $rows;
 $result = mysqli_query($con,"SELECT SUM(rating) FROM items;");
 while($row = mysqli_fetch_array($result)) {
 $rate=$row['SUM(rating)'];

}
//echo $rate;*/
?>	  

</body></html>