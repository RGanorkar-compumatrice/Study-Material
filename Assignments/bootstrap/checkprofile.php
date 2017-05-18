<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
$friend=$_POST['Friends'];
$message=$_POST['message'];
$fromessage=$_GET['eid'];
$fromfriend=$_SESSION["name"];
$fromfriendid=$_SESSION["id"];
date_default_timezone_set('Asia/Kolkata');
$date=date('d-m-Y');
$time=date('h-i-s');
$tofriend="";
$tofriendid="";
$db="test";
$con=mysqli_connect("localhost","root","",$db);
$result=mysqli_query($con,"select name, id from login where name='".$friend."'");
while($row=mysqli_fetch_array($result))
{
$tofriend=$row['name'];
$tofriendid=$row['id'];

}

if (isset($_POST['send'])) {
if($tofriend!=""){
$result2=mysqli_query($con,"insert into message(message, fromfriend, tofriend, fromid, toid, date, time) values ('".$message."','".$fromfriend."',
'".$tofriend."','".$fromfriendid."','".$tofriendid."','".$date."','".$time."')");
}
else{

}
}
else
{}

$result1 = mysqli_query($con,"DELETE FROM message where message='".$fromessage."'");

//for pdf conversion
if(isset($_POST['sendpdf']))
{
//$mailpdf=$_POST['mailtexto'];
$textareacontent=$message;//further code is for server side
$html = '<h1 style="color:purple"><i>Message</i></h1>
<p><i>'.$textareacontent.'</i></p><br>';

//for convert into pdf
include("MPDF/mpdf.php");
$mpdf=new mPDF(); 
$mpdf->WriteHTML($html);
$file_pdf_r='upload pdf/mypdf_'.time().'.pdf';//converted file stored in upload folder in wordpress file in c and time() is used for unique identification
$mpdf->Output($file_pdf_r);//further code is for client side
 header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file_pdf_r));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file_pdf_r));
    readfile($file_pdf_r);
	//$con=mysqli_connect("localhost","root","","user");
//mysqli_query($con,"insert into pdf(message) values ('".$file_pdf_r."')");
   exit;
}
else{}




header("Location:profile.php");
?>
