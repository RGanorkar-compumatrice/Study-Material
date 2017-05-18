
<?php 
session_start();
//$name=$_SESSION['name'];
//$password=$_SESSION['password'];
//die("ok");
//print_r($_FILES);

//die("123");
//error_reporting(E_ERROR|E_PARSE);
//include("include/abcd.txt");

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
	
	
if(move_uploaded_file($temp_name, $target_path)) { 

    $query_upload="insert into upload(imgfile, submissiondate) VALUES  
('".$target_path."','".date("Y-m-d")."' )"; 
 //where username='".$name."'
  //mysqli_query($con,$query_upload) or die("error in $query_upload == ----> ".mysql_error());

header("Location:main.php");  
}else{ 

   exit("Error While uploading image on the server"); 
}  
mysqli_close($con);

} 

?>
