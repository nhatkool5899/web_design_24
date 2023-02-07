<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class mailer{

    public function send_message($title, $name, $email, $noidung){
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'levantu7979@gmail.com';
            $mail->Password = 'kwzdpmmgtmcnpxmx';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
        
            //Recipients
            $mail->setFrom('levantu7979@gmail.com', 'CÔNG TY TNHH KHỞI NGHIỆP HOA SINH TÂN HD');
            $mail->addAddress($email, $name);

            $mail->addCC('levantu7979@gmail.com', $email);
        
            // Content
            $mail->isHTML(true);   
            $mail->Subject = $title;
            $mail->Body = $noidung;
        
            $mail->send();
            echo '<h2>Cảm ơn bạn đã quan tâm, chúng tôi sẽ phản hồi trong thời gian sớm nhất.</h2>
                    <h2><a href="./index.html">Quay lại trang chủ!</a></h2>
            ';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}


?>




