<?php include_once('functions/send-email.php'); ?>
<?php



if ((isset($_SESSION['id']) || isset($_GET['del'])) && !isset($_POST['yes'])) {
    if (isset($_GET['del'])) {
        $url_encoded_id = $_GET['del'];
        $decode_id = base64_decode($url_encoded_id);
        $user_id_array = explode("encodeuserid", $decode_id);
        $id = $user_id_array[1];
    } else {
        $id = $_SESSION['id'];
    }

    $sqlQuery = "SELECT * FROM customers WHERE id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('id' => $id));

    while ($rs = $statement->fetch()) {
        $username = $rs['c_username'];
        $email = $rs['c_email'];
        $name = $rs['c_firstname'];
        $surname = $rs['c_surname'];
        $contact = $rs['c_contact'];
        $country = $rs['c_country'];
        $province = $rs['c_province'];
        $city = $rs['c_city'];
        $gender = $rs['c_gender'];
    }
    $encode_id = base64_encode("encodeuserid{$id}");
} else if (isset($_POST['yes'])) {

        $id = $_POST['hidden_id'];

        try {
            //Step 1 -Get User information from database
            $sqlQuery = "SELECT * FROM customers WHERE id = :id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':id' => $id));

            if ($row = $statement->fetch()) {
                //Step 2 - Deactivate the account
                $username   = $row['c_username'];
                $firstname   = $row['c_firstname'];
                $email      = $row['c_email'];
                $user_id    = $row['id'];

                $deactivateQuery = $db->prepare("UPDATE customers SET activated = :activated WHERE id = :id");
                $deactivateQuery->execute(array(':activated' => 0, ':id' => $user_id));

                if ($deactivateQuery->rowCount() === 1) {
                    //Step 3 - Insert Row into Trash Table
                    $InsertRecord = $db->prepare("INSERT INTO trash (user_id,deleted_at) VALUES (:id, NOW())");
                    $InsertRecord->execute(array(':id' => $user_id));

                    if ($InsertRecord->rowCount() === 1) {
                        //Step 4 - Send User an Notification via and display notification
                        //prepare email body
                        $mail_body = '<html>
                        <style type="text/css">
                            .link__btn:hover {
                                background-color: #00c551 !important
                            }
                        </style>
                        <div style="background-color: #FF8800; padding: 20px 0; margin:0">
                        <div style="max-width:600px; margin:0 auto; padding: 40px; background:#ffffff; font-size: 14px; border:1px solid #cccccc; border-radius: 4px; font-family: arial,sans-serif; line-height: 1.7em; color: #555555">
                        
    
                    <h2 style="font-weight:600; color: #FF8800;">Kasi Mall Online - Account Deactivated</h2>
                    <div>
                    <p>Dear ' . $firstname . '<br><br>You have requested to deactivate your account,
                                    your information will be kept for 14 days. If you wish to continue using Kasi Mall Online, login whithin 
                                    the next 14 days to reactivate your account or it will be permanently deleted.</p>
                                    <p><a href="http://127.0.0.1:8080/login.php">Login</a></p>
                    </div>
    
                    <div style="padding: 20px;">
                    <p><a class="link__btn" style="padding: 14px; font-size: 18px; background-color:#848484; border-radius: 8px; display: block; color: #ffffff; text-align: center; text-decoration: none; cursor: pointer" href="http://127.0.0.1:8080/login.php"> Login</a></p>
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





                        $mail_body = '<html>
                                    <body style="background-color:#CCCCCC; color:#000; font-family: Arial, Helvetica, sans-serif;
                                                        line-height:1.8em;">
                                    <h2>Account Deactivation - Kasi Mall Online</h2>
                                    <p>Dear ' . $firstname . '<br><br>You have requested to deactivate your account,
                                    your information will be kept for 14 days. If you wish to continue using Kasi Mall Online, login whithin 
                                    the next 14 days to reactivate your account or it will be permanently deleted.</p>
                                    <p><a href="http://127.0.0.1:8080/login.php">Login</a></p>
                                    <p><strong>&copy;2020 Kasi Mall online</strong></p>
                                    </body>
                                    </html>';

                        $mail->addAddress($email, $firstname);
                        $mail->Subject = " Deactivate Account ";
                        $mail->Body = $mail_body;

                        //Error Handling for PHPMailer
                        if (!$mail->Send()) {
                            $result = flashMessage(" Email sending failed: " . $mail->ErrorInfo . " ");
                        } else {
                            $result = flashMessage("Your account information will be kept for 14 days. If you wish to continue using Kasi Mall Online, login whithin 
                            the next 14 days to reactivate your account or it will be permanently deleted.", "Pass");
                        }
                    } else {
                        $result = flashMessage("Could not complete operation. Please try again or Contact Admin");
                    }
                } else {
                    $result = flashMessage("Could not complete operation. Please try again or Contact Admin");
                }
            } else {
                signout();
            }
        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occurred" . $ex->getMessage());
        }
}


?>