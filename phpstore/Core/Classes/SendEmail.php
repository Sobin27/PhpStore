<?php

namespace Core\Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SendEmail
{
    public function enviar_email_confirm()
    {

        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function


        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {

            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authenticationcls
            $mail->Username   = 'sobscorps@gmail.com';                     //SMTP username
            $mail->Password   = 'asp200500';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('sobscorps@gmail.com', APP_NAME);
            $mail->addAddress('sobscorpos@gmail.com', APP_NAME);     //Add a recipient

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = APP_NAME;
            $mail->Body    = 'Mensagem de teste <strong>bold!!!</strong>';


            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}