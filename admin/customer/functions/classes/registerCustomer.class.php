<?php
if (isset($_POST['registercustomer'])) {


    //initialize an array to store any error message from the form
    $form_errors = array();

    //Form validation to be passed to function of check_empty_fields();
    $required_fields = array('Name', 'Surname', 'Email', 'Password', 'Username', 'Gender', 'Cell', 'Province', 'Kasi', 'Address', 'Zip', 'City');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('Name' => 3, 'Surname' => 3, 'Password' => 6, 'Username' => 3, 'Cell' => 10);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));





    // Get all records from inputs
    $c_name               = $_POST['Name'];
    $c_surname            = $_POST['Surname'];
    $c_email              = $_POST['Email'];
    $password           = $_POST['Password'];
    $cpassword          = $_POST['Password2'];
    $c_username         = $_POST['Username'];
    $c_cell        = $_POST['Cell'];
    $c_province         = $_POST['Province'];
    $c_kasi         = $_POST['Kasi'];
    $c_city         = $_POST['City'];
    $c_street_address         = $_POST['Address'];
    $c_zip         = $_POST['Zip'];
    $c_gender         = $_POST['Gender'];
    $date               = current_date();

    //CHeck Email exists 
    if (checkDuplicateEmail2($c_email, $db)) {
        $result = flashMessage("Email Already Taken, please try another one");
    } else if (checkDuplicateUsername($c_username, $db)) {
        $result = flashMessage("Username Already Taken, please try another one");
    }  else if ($password != $cpassword) {
        $result = flashMessage("Passwords to do not match, Please try again");
        //check if error array is empty, if yes process form data and insert record
    } else if (empty($form_errors)) {

        //hash the password input
        $password_hash = password_hash($password, PASSWORD_DEFAULT);


        try {

            // create sql to insert into database
            $insert_customer = "INSERT INTO customers (c_username,c_email,c_password,c_reg_date,c_firstname,c_surname,c_contact,c_gender,c_province,c_city,c_kasi,c_street_address,c_zip)
            VALUES (:username,:email,:password,:date,:name,:surname,:contact,:gender,:province,:city,:kasi,:street_address,:zip)";

            // use PDO to prepare and sanitize the data
            $statement = $db->prepare($insert_customer);

            // Add the data into the database 
            $statement->execute(array(':username' => $c_username, ':email' => $c_email, ':password' => $password_hash, ':date' => $date, ':name' => $c_name, ':surname' => $c_surname, ':contact' => $c_cell, ':gender' => $c_gender, ':province' => $c_province, ':city' => $c_city, ':kasi' => $c_kasi, ':street_address' => $c_street_address, ':zip' => $c_zip));

            

            //Check is one data was created in database the echo result
            if ($statement->rowcount() == 1) {
                $result = flashMessage("Customer Added", "Pass");
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
