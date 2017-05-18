
<?php 
session_start();
$db="user";


$con=mysqli_connect("localhost","root","",$db);
$lgid=$_SESSION['id'];

   function GetImageExtension($imagetype) 
  { 
      
	  if(empty($imagetype)) return false; 
       switch($imagetype) 
       { 
           case 'image/bmp': return '.bmp'; 
           case 'image/gif': return '.gif'; 
           case 'image/jpeg': return '.jpg'; 
          case 'image/png': return '.png'; 
          default: return false; 
      } 
     } 
	 
	 $file_name=$_FILES["SelectFile"]["name"];
	 $temp_name=$_FILES["SelectFile"]["tmp_name"]; 
//echo "value is".$file_name;



	//die("123");
if (!empty($_FILES["SelectFile"]["name"])) {

    $file_name=$_FILES["SelectFile"]["name"]; 
    $temp_name=$_FILES["SelectFile"]["tmp_name"]; 
    $imgtype=$_FILES["SelectFile"]["type"]; 
    $ext= GetImageExtension($imgtype); 
    $imagename=date("d-m-Y")."-".time().$ext; 
    $target_path = "upload/".$imagename; 
	
	//move_uploaded_file($temp_name, $target_path);
	
	$s=$target_path;
$d=date("Y-m-d");
echo "target path of image".$s;
echo "date of image".$d;
//die("after getting values");

if(move_uploaded_file($temp_name, $target_path)) { 

//die("inside upload");

 $count1=mysqli_query($con,"insert into upload(imgfile, submissiondate, user_id) VALUES ('".$s."', '".$d."', '".$lgid."')"); 
 
echo "affected rows".mysqli_affected_rows($con);
//die("after upload");
header("Location:main.php?upload=true");  



}else{ 

   exit("Error While uploading image on the server"); 
}  
mysqli_close($con);

} 

?>
