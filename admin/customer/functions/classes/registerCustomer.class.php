<?php
if (isset($_POST['registersupplier'])) {


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





    // Get all records from inputs
    $m_name               = $_POST['Name'];
    $m_surname            = $_POST['Surname'];
    $m_email              = $_POST['Email'];
    $password           = $_POST['Password'];
    $cpassword          = $_POST['Password2'];
    $m_username         = $_POST['Username'];
    $m_cell        = $_POST['Cell'];
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
    $date               = current_date();

    //CHeck Email exists 
    if (checkDuplicateEmail2($m_email, $db)) {
        $result = flashMessage("Email Already Taken, please try another one");
    } else if (checkDuplicateUsername($m_username, $db)) {
        $result = flashMessage("Username Already Taken, please try another one");
    }  else if ($password != $cpassword) {
        $result = flashMessage("Passwords to do not match, Please try again");
        //check if error array is empty, if yes process form data and insert record
    } else if (empty($form_errors)) {

        //hash the password input
        $password_hash = password_hash($password, PASSWORD_DEFAULT);


        try {

            // create sql to insert into database
            $insert_merchant = "INSERT INTO merchant (m_username,m_email,m_password,m_reg_date,m_firstname,m_surname,m_contact,m_gender,m_province,m_city,m_kasi,m_street_address,m_zip,m_shop_name,m_description,shop_email,shop_cell,shop_province,shop_city,shop_kasi,shop_address,shop_zip)
            VALUES (:username,:email,:password,:date,:name,:surname,:contact,:gender,:province,:city,:kasi,:street_address,:zip,:shop_name,:shop_description,:shop_email,:shop_cell,:shop_province,:shop_city,:shop_kasi,:shop_address,:shop_zip)";

            // use PDO to prepare and sanitize the data
            $statement = $db->prepare($insert_merchant);

            // Add the data into the database 
            $statement->execute(array(':username' => $m_username, ':email' => $m_email, ':password' => $password_hash, ':date' => $date, ':name' => $m_name, ':surname' => $m_surname, ':contact' => $m_cell, ':gender' => $gender, ':province' => $province, ':city' => $city, ':kasi' => $kasi, ':street_address' => $street_address, ':zip' => $zip, ':shop_name' => $shop_name, ':shop_description' => $shop_description, ':shop_email' => $shop_email, ':shop_cell' => $shop_cell, ':shop_province' => $shop_province, ':shop_city' => $shop_city, ':shop_kasi' => $shop_kasi, ':shop_address' => $shop_street_address, ':shop_zip' => $shop_zip));

            

            //Check is one data was created in database the echo result
            if ($statement->rowcount() == 1) {
                $result = flashMessage("Supplier Added", "Pass");
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
