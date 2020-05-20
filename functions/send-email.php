<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require 'class.phpmailer.php';

                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->Port = 465;
                $mail->Host = 'mail.a-2-c.co.za';
                $mail->IsHTML(true);
                $mail->Mailer = 'smtp';
                $mail->SMTPSecure = 'ssl';
                
                $mail->Username = '_mainaccount@a-2-c.co.za';
                $mail->Password = 'upVq-(6~6PR~'; 
                
                //Sender Info
                $mail->From = "info@kasimall.co.za";
                $mail->FromName = "Kasi Mall Online";
                
?>