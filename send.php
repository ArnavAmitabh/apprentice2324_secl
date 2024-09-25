<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'test@gmail.com';
    $mail->Password = '0';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('test@gmail.com');

    $mail->addAddress('test2@gmail.com');

    $mail->isHTML(true);

    $mail->Subject = ('hello');
    $mail->Body = ('123');

    $mail->send();

    echo
    "
    <script>
    alert('Email Sent Successfully');
    document.location.href='new.php';
    </script>
    ";

}
?>