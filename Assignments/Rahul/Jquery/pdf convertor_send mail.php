<?php
session_start();
error_reporting(E_ERROR|E_PARSE);

 if(isset($_POST['submit']))
{
$mailpdf=$_POST['mailtexto'];
$textareacontent=$_POST['texto'];//further code is for server side
$html = '<h1 style="color:purple"><i>Generated PDF from Form Data</i></h1>
<p class="lab1" style="color:red"><strong><i>Message</i></strong><br>'.$textareacontent.'</p><br>';

/*
//for convert into pdf
include("MPDF/mpdf.php");
$mpdf=new mPDF(); 
$mpdf->WriteHTML($html);
$file_pdf_r='upload/mypdf_'.time().'.pdf';//converted file stored in upload folder in wordpress file in c and time() is used for unique identification
$mpdf->Output($file_pdf_r);//further code is for client side
 header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file_pdf_r));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file_pdf_r));
    readfile($file_pdf_r);
	$con=mysqli_connect("localhost","root","","wordpress_1");
mysqli_query($con,"insert into pdf(message) values ('".$file_pdf_r."')");
  // exit;
*/
	//further code for sending an attachment email
	echo "hi rahul <br>";

	require_once('C:\wamp\www\Rahul\Jquery\PHPMailer_5.2.4\class.phpmailer.php');
	//require_once('/Rahul/Jquery/PHPMailer_5.2.4/class.phpmailer.php');
define('GUSER', 'rahulganorkar180@gmail.com'); // GMail username
define('GPWD', 'mh27am0910'); 
function smtpmailer($to, $from, $from_name, $subject, $body, $attachmentFile="")
//function smtpmailer($to, $from, $from_name, $subject, $body)//$attachmentfile is optional parameter which store $file_pdf_r  
//function smtpmailer get required value for sending mail from smtpmailer having mails addresses of to and from. 
{ 
echo "enter into mail function";

	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail office365
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465; 
	$mail->Username = GUSER;  
	$mail->Password = GPWD;           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	$mail->AddAttachment($attachmentFile);//$attachmentFile contain $file_pdf_r
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
}

//smtpmailer($mailpdf,"rahul@compumatrice.com","Rahul Ganorkar","testing email","this is mail for checking the sending of mail with attachment");
smtpmailer($mailpdf,"rahulganorkar180@gmail.com","Rahul Ganorkar","testing email","this is mail for checking the sending of mail with attachment",$file_pdf_r);
echo $error;
}

else{}
?>

<html>

<body>
<form method="post">
<h style="color:purple;font-size:25px;"><b>Send Email</b></h>
<div id="tinyMCEError" style="display:none;color:red;">	
	<b>Please fill the required field.</b>
</div>
<textarea id="parcelpdf" cols="10" rows="10" name="texto" class="pdfbody"></textarea><br>
<div id="EmailError" style="display:none;color:red;">	
	<b>Please fill the required field.</b>
</div>
<h style="color:purple;font-size:18px;"><b>Type Email Address : </b></h>
 <input type="email" name="mailtexto" id="sendemail" style="margin-left:20px;"><br><br>
<input type="submit" name="submit" value="Submit" id="submit" style="color:yellowgreen; background-color:black;font-size:15px;"><br><br>
</form>
</body>
</html>
	 