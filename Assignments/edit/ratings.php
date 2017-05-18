<html><body>
	
<body background="E:\pictures\bg.jpg">
<img src="E:\pictures\sb.jpg" height="375px" width="1000px"><br><br>
<h style="color:gold; font-size:30px;"><b><i>Average Rating = </i></b></h><input type="text" name="ave" id="ave" value=""></input>
<p style="color:gold; font-size:20px;"><b><i>Rate this image:</i></p>
<form method="post">
<input type="radio" value="1" name="option" /><b>1<b/><br>
<input type="radio" value="2" name="option" /><b>2<b/><br>
<input type="radio" value="3" name="option" /><b>3<b/><br>
<input type="radio" value="4" name="option" /><b>4<b/><br>
<input type="radio" value="5" name="option" /><b>5<b/><br><br>

<input type="submit" value="Submit" name="submit" class="submit" style="cursor:pointer;font-size:20px;color:greenyellow;background-color:black;margin-left:20px;">

</form>
</html><body>
<?php 
session_start();

error_reporting(E_ERROR|E_PARSE);
$option=$_POST['option'];
$db="user";

$con=mysqli_connect("localhost", "root", "", "$db");
$count=mysqli_query($con,"insert into ratings(rating) values('".$option."')");

 $result1 = mysqli_query($con,"SELECT COUNT(rating) FROM ratings;");
  while($row = mysqli_fetch_array($result1)) {
  $rows=$row['COUNT(rating)'];
 
  }
  
 $result = mysqli_query($con,"SELECT SUM(rating) FROM ratings;");
 while($row = mysqli_fetch_array($result)) {
 $rate=$row['SUM(rating)'];

}
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
var x ='<?php echo $rate;?>';
var y ='<?php echo $rows;?>';
var average;
$(document).ready(function(){
$('.submit').click(function () {

average = x / y;
alert(average);
$('#ave').attr("value",average);

});
});
</script>
