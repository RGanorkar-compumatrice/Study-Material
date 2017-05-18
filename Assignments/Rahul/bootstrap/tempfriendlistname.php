
<?php
if(isset($_GET['friendlistname'])){
$friendlistname=$_GET['friendlistname'];
header("Location:userprofile.php?userfriendlistname=$friendlistname");  
}
?>