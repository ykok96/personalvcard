<?php
require 'PHPMailerAutoload.php';

$subject = $_POST["subject"];
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.transip.email';                 // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hello@yonikok.com';                 // SMTP username
$mail->Password = 'Super001!';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                  // TCP port to connect to


//$mail->addReplyTo($email, $name);// Add a recipient
$mail->setFrom('hello@yonikok.com', 'Site Messager');
$mail->addAddress('hello@yonikok.com', 'Yoni Kok');

$body = "$email <br> $message";
$mail->Subject = $subject;
$mail->Body    = $body;
$mail->AltBody  = $body;


if(!$mail->send()) {
    echo "<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Somethig went wrong, please try again.</div>";
} else {
    echo "<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Thank's for your message, I'll reply asap!</div>";
}
