<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require 'class.phpmailer.php';

                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->Port = 465;
                $mail->Host = 'mail.kasimall.co.za';
                $mail->IsHTML(true);
                $mail->Mailer = 'smtp';
                $mail->SMTPSecure = 'ssl';
                
                $mail->Username = 'info@kasimall.co.za';
                $mail->Password = 'Avo8457%^&&'; 
                
                //Sender Info
                $mail->From = "info@kasimall.co.za";
                $mail->FromName = "Kasi Mall Online";
                
?>