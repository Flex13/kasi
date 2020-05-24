<?php

//process the form if the reset password button is clicked
if (isset($_POST['Reset-link'])) {
        //process the form
        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation
        $required_fields = array('Email');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));


        //email validation / merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_email($_POST));

        //check if error array is empty, if yes process form data and insert record
        if (empty($form_errors)) {
            //collect form data and store in variables
            $email          = $_POST['Email'];

            try {
                //create SQL select statement to verify if email address input exist in the database
                $sqlQuery = "SELECT * FROM customers WHERE c_email = :c_email";

                //use PDO prepared to sanitize data
                $statement = $db->prepare($sqlQuery);

                //execute the query
                $statement->execute(array(':c_email' => $email));


                //Check if Record exists
                if ($rs = $statement->fetch()) {
                    $username  = $rs['c_username'];
                    $firstname  = $rs['c_firstname'];
                    $surname    = $rs['c_surname'];
                    $email      = $rs['c_email'];
                    $user_id    = $rs['id'];
                    $encode_id = base64_encode("encodeuserid{$user_id}");


                    //prepare email body

                    $mail_body = '<html>
                    <style type="text/css">
                        .link__btn:hover {
                            background-color: #00c551 !important
                        }
                    </style>
                    <div style="background-color: #FF8800; padding: 20px 0; margin:0">
                    <div style="max-width:600px; margin:0 auto; padding: 40px; background:#ffffff; font-size: 14px; border:1px solid #cccccc; border-radius: 4px; font-family: arial,sans-serif; line-height: 1.7em; color: #555555">
                    

                <h2 style="font-weight:600; color: #FF8800;">Password Reset - Kasi Mall Online</h2>
                <div>
                <p>Dear ' . $firstname . '<br><br>To reset your password please click on the link below</p>
                </div>

                <div style="padding: 20px;">
                <p><a class="link__btn" style="padding: 14px; font-size: 18px; background-color:#848484; border-radius: 8px; display: block; color: #ffffff; text-align: center; text-decoration: none; cursor: pointer" href="http://127.0.0.1:8080/reset_password.php?uid=' . $encode_id . '"> Reset Password</a></p>
                </div>

                <div style="padding: 40px 0; font-size: 12px; color: #999999; border-top:1px solid #e2e2e2">
                <h2 style="font-size: 14px; padding: 0; line-height: 1em; margin: 0; font-weight: 500">&copy;2020 Kasi Mall online</h2>
                <p style="padding: 20px 0 0; font-size: 11px; font-weight: 200">
                <a href="#" style="padding: 0 8px; color: #0000ff">Tearms & Condtions</a>
                </p>
                </div>
                </div>
                </div>
                
                </body>
                </html>';

                    $mail->addAddress($email, $firstname);
                    $mail->Subject = "Reset Password ";
                    $mail->Body = $mail_body;

                    //Error Handling for PHPMailer
                    if (!$mail->Send()) {
                        $result = flashMessage(" Email sending failed: " . $mail->ErrorInfo . " ");
                    } else {
                        $result = flashMessage("Email Sent. Please Check your email to activate account", "Pass");
                    }
                } else {
                    $result = flashMessage("The email address provided does not exist, please try again");
                }
            } catch (PDOException $ex) {
                $result = flashMessage("An error occurred: " . $ex->getMessage());
            }
        } else {
            if (count($form_errors) == 1) {
                
            } else {
               
            }
        }
}
