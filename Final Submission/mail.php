<?php
require 'mailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 0;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username    = 'noreply.iiti.lps@gmail.com';
$mail->Password    = '07121997';                          // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('noreply.iiti.lps@gmail.com', 'Dhruv');
$mail->addAddress($_SESSION['email']);     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Confirmation of Booking';

$mail->Body    = "Your URN is '$urn'. Please go <a href = 'localhost/final/payment.php/'>here</a> to complete the process.";
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent. ';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>