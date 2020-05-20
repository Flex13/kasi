<?php include_once('functions/send-email.php'); ?> 
<?php
if (isset($_POST['register'])) {


    //initialize an array to store any error message from the form
    $form_errors = array();

    //Form validation to be passed to function of check_empty_fields();
    $required_fields = array('Name', 'Surname', 'Email', 'Password', 'Username', 'Gender', 'Cell', 'Province', 'Kasi', 'Address', 'Zip', 'City', 'Shop_Name', 'About', 'Shop_Province', 'Shop_Kasi', 'Shop_Address', 'Shop_Zip', 'Shop_City', 'Shop_Email', 'Shop_Cell');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('Name' => 3, 'Surname' => 3, 'Password' => 6, 'Username' => 3, 'Cell' => 10);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));

    //validate if file has valid image extention
    if (isset($_FILES['image']['name']) ? $shoppic = $_FILES['image']['name'] : $shoppic =  null);


    if ($shoppic  != null) {
        $form_errors = array_merge($form_errors, isValidImage($shoppic));
    }





    // Get all records from inputs
    $name               = $_POST['Name'];
    $surname            = $_POST['Surname'];
    $email              = $_POST['Email'];
    $password           = $_POST['Password'];
    $cpassword          = $_POST['Password2'];
    $m_username         = $_POST['Username'];
    $cell        = $_POST['Cell'];
    $province         = $_POST['Province'];
    $kasi         = $_POST['Kasi'];
    $city         = $_POST['City'];
    $street_address         = $_POST['Address'];
    $zip         = $_POST['Zip'];
    $gender         = $_POST['Gender'];
    $shop_name        = $_POST['Shop_Name'];
    $shop_description        = $_POST['About'];

    $shop_email              = $_POST['Shop_Email'];
    $shop_cell        = $_POST['Shop_Cell'];
    $shop_province         = $_POST['Shop_Province'];
    $shop_kasi         = $_POST['Shop_Kasi'];
    $shop_city         = $_POST['Shop_City'];
    $shop_street_address         = $_POST['Shop_Address'];
    $shop_zip         = $_POST['Shop_Zip'];


    $ip               = getRealIpUser();
    $date               = current_date();

    //CHeck Email exists 
    if (checkDuplicateEmail2($email, $db)) {
        $result = flashMessage("Email Already Taken, please try another one");
    } else if ($password != $cpassword) {
        $result = flashMessage("Passwords to do not match, Please try again");
        //check if error array is empty, if yes process form data and insert record
    } else if (empty($form_errors)) {

        //hash the password input
        $password_hash = password_hash($password, PASSWORD_DEFAULT);


        try {

            // create sql to insert into database
            $insert_merchant = "INSERT INTO merchant (m_username,m_email,m_password,m_reg_date,m_firstname,m_surname,m_contact,m_gender,m_province,m_city,m_kasi,m_street_address,m_zip,ip_address,m_shop_name,m_description,shop_email,shop_cell,shop_province,shop_city,shop_kasi,shop_address,shop_zip)
            VALUES (:username,:email,:password,:date,:name,:surname,:contact,:gender,:province,:city,:kasi,:street_address,:zip,:ipAddress,:shop_name,:shop_description,:shop_email,:shop_cell,:shop_province,:shop_city,:shop_kasi,:shop_address,:shop_zip)";

            // use PDO to prepare and sanitize the data
            $statement = $db->prepare($insert_merchant);

            if ($shoppic != null) {

                // create sql to insert into database
                $insert_merchant_image = "INSERT INTO merchant (m_username,m_email,m_password,m_reg_date,m_firstname,m_surname,m_contact,m_gender,m_province,m_city,m_kasi,m_street_address,m_zip,ip_address,m_shop_name,m_description,shop_email,shop_cell,shop_province,shop_city,shop_kasi,shop_address,shop_zip,m_image)
VALUES (:username,:email,:password,:date,:name,:surname,:contact,:gender,:province,:city,:kasi,:street_address,:zip,:ipAddress,:shop_name,:shop_description,:shop_email,:shop_cell,:shop_province,:shop_city,:shop_kasi,:shop_address,:shop_zip,:m_image)";

                $shoppic_path1 = uploadShopImage($shop_name);

                if (!$shoppic_path1) {

                    $shoppic_path1 = "images/shops.jpg";
                }

                // use PDO to prepare and sanitize the data
                $statement = $db->prepare($insert_merchant_image);

                // Add the data into the database 
                $statement->execute(array(':username' => $m_username, ':email' => $email, ':password' => $password_hash, ':date' => $date, ':name' => $name, ':surname' => $surname, ':contact' => $cell, ':gender' => $gender, ':province' => $province, ':city' => $city, ':kasi' => $kasi, ':street_address' => $street_address, ':zip' => $zip, ':ipAddress' => $ip, ':shop_name' => $shop_name, ':shop_description' => $shop_description, ':shop_email' => $shop_email, ':shop_cell' => $shop_cell, ':shop_province' => $shop_province, ':shop_city' => $shop_city, ':shop_kasi' => $shop_kasi, ':shop_address' => $shop_street_address, ':shop_zip' => $shop_zip, ':m_image' => $shoppic));
            } else {

            



            // Add the data into the database 
            $statement->execute(array(':username' => $m_username, ':email' => $email, ':password' => $password_hash, ':date' => $date, ':name' => $name, ':surname' => $surname, ':contact' => $cell, ':gender' => $gender, ':province' => $province, ':city' => $city, ':kasi' => $kasi, ':street_address' => $street_address, ':zip' => $zip, ':ipAddress' => $ip, ':shop_name' => $shop_name, ':shop_description' => $shop_description, ':shop_email' => $shop_email, ':shop_cell' => $shop_cell, ':shop_province' => $shop_province, ':shop_city' => $shop_city, ':shop_kasi' => $shop_kasi, ':shop_address' => $shop_street_address, ':shop_zip' => $shop_zip));

            }

            //Check is one data was created in database the echo result
            if ($statement->rowcount() == 1) {


                $m_id = $db->lastInsertId();
                $encode_id = base64_encode("encodeuserid{$m_id}");


                //prepare email body
                $mail_body = '<html>
                    <style type="text/css">
                        .link__btn:hover {
                            background-color: #00c551 !important
                        }
                    </style>
                    <div style="  background: rgb(106,27,154);
                    background: linear-gradient(38deg, rgba(106,27,154,1) 22%, rgba(255,136,0,1) 56%, rgba(255,255,255,0.7147233893557423) 100%); padding: 20px 0; margin:0">
                    <div style="max-width:600px; margin:0 auto; padding: 40px; background:#ffffff; font-size: 14px; border:1px solid #cccccc; border-radius: 4px; font-family: arial,sans-serif; line-height: 1.7em; color: #555555">
                    

                <h2 style="font-weight:600; color: #FF8800;">Kasi Mall Online - Account Activation</h2>
                <div>
                <p>Hi <b> ' . $name . '</b><br><br>Thank you for registering as a Supplier in Kasi Mall. We will validate your information and will contact you as once validation is done to complete registartion</p>
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

                $mail->addAddress($email, $name);
                $mail->Subject = "Supplier Registration";
                $mail->Body = $mail_body;

                //Error Handling for PHPMailer
                if (!$mail->Send()) {
                    $result = flashMessage(" Email sending failed: " . $mail->ErrorInfo . " ");
                } else {
                    $result = flashMessage("Registration Successful. Kasi Mall will contact you to complete Registration", "Pass");
                }
            }
        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occorrd" . $ex->getMessage());
        }
    } else {
        if (count($form_errors) == 1) {
        } else {
        }
    }
}

?>
