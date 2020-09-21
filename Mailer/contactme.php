<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "../vendor/autoload.php";
$mail = new PHPMailer(true);

//Enable SMTP debugging.
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "g4gamcacochin@gmail.com";                 
$mail->Password = "gamcacochin2020";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;                                   

$mail->From = 'g4gamcacochin@gmail.com';

$mail->addAddress("g4gamcacochin@gmail.com");
//$mail->addCC("kinoshkochin2000@gmail.com");

$mail->addReplyTo($_POST['email'], "Reply");

$mail->isHTML(true);

$mail->Subject = "Enquiry From : " . $_POST['name'];
$mail->Body = $_POST['message'].'<br>Email: '.$_POST['email'].'<br>Phone: '.$_POST['phone'];

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
