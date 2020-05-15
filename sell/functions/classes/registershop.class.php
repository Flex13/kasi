
<?php

if ((isset($_SESSION['id'])  && !isset($_POST['shopregister']))){
    $id = $_SESSION['id'];

    $sqlQuery = "SELECT * FROM customers WHERE id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':id' => $id));

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
} else if (isset($_POST['shopregister'])) {


    //initialize an array to store any error message from the form
    $form_errors = array();

    //Form validation to be passed to function of check_empty_fields();
    $required_fields = array('Name', 'Province', 'Kasi', 'Password', 'Email');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('Name' => 3, 'Province' => 3, 'Kasi' => 3, 'Password' => 6);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));




    // Get all records from inputs
    $shopname               = $_POST['Name'];
    $province            = $_POST['Province'];
    $email              = $_POST['Email'];
    $kasi              = $_POST['Kasi'];
    $password           = $_POST['Password'];
    $cpassword          = $_POST['Password2'];
    $ip               = getRealIpUser();
    $date               = current_date();
    $user_hidden_id     = $_POST['hidden_id'];

    //CHeck Email exists 
    if (checkDuplicateEmail($email, $db)) {
        $result = flashMessage("Email Already Taken, please try another one");
    } else if ($password != $cpassword) {
        $result = flashMessage("Passwords to do not match, Please try again");
        //check if error array is empty, if yes process form data and insert record
    } else if (empty($form_errors)) {

        //hash the password input
        $password_hash = password_hash($password, PASSWORD_DEFAULT);


        try {

            // create sql to insert into database
            $insert_customer = "INSERT INTO merchant (user_id,m_email,m_password,m_shop_name,m_province,m_city,m_reg_date,activated)
            VALUES (:user_id,:email,:password,:shopname,:province,:kasi,:date,:activated)";

            // use PDO to prepare and sanitize the data
            $statement = $db->prepare($insert_customer);

            // Add the data into the database 
            $statement->execute(array(':user_id' => $user_hidden_id, ':email' => $email, ':password' => $password_hash,':date' => $date, ':shopname' => $shopname, ':kasi'=> $kasi, ':activated' => '1',':province' => $province));

            //Check is one data was created in database the echo result
            if ($statement->rowcount() == 1) {

                $_SESSION["successMessage"] =  "Thank you for joining Kasi Mall Online. Sign in and start updating you shop profile";
                echo "<script>window.open('m_login.php','_self')</script>";
                
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
