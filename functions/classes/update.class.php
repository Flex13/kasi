<?php

if (isset($_SESSION['ip_address']) || isset($_SESSION['c_email']) && !isset($_POST['update'])) {

        $email = $_SESSION['c_email'];
        $ip = $ip_address;

        $sqlQuery = "SELECT * FROM customers WHERE c_email = :email AND ip_address = :ip LIMIT 1";
        $statement = $db->prepare($sqlQuery);
        $statement->execute(array(':email' => $email, ':ip' => $ip));

        while ($rs = $statement->fetch()) {
            $username = $rs['c_username'];
            $email = $rs['c_email'];
            $id = $rs['id'];
        }

        if ($statement->rowcount() == 1) {
            $encode_id = base64_encode("encodeuserid{$id}");
        }

    
} else if (isset($_POST['update'], $_POST['token'])) {

    //Validate Token
    if (validate_token($_POST['52585'])) { //Proccess login Form

        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation to be passed to function of check_empty_fields();
        $required_fields = array('Username', 'Gender', 'Cell', 'Country', 'Province', 'City', 'Zip');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //Fields that requires checking for minimum length
        $fields_to_check_length = array('Username' => 3, 'Country' => 3, 'Province' => 3, 'City' => 3, 'Zip' => 3, 'Cell' => 10);

        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));





        // Get all records from inputs
        $username         = $_POST['Username'];
        $contact         = $_POST['Contact'];
        $country         = $_POST['Country'];
        $province         = $_POST['Province'];
        $city         = $_POST['City'];
        $zip =          $_POST['Zip'];
        $gender         = $_POST['Gender'];
        $cell        = $_POST['Cell'];
        $hidden_ip = $_POST['ip'];
        $new_ip_address = getRealIpUser();
        $email = $_SESSION['c_email'];


        if (empty($form_errors)) {
            try {


                    // create sql to insert into database
                    $update_customer = "UPDATE customers SET c_username=:username,c_contact=:contact,c_country=:country,c_province=:province,c_city=:city,zip=:zip WHERE ip=:ip";

                    // use PDO to prepare and sanitize the data
                    $statement = $db->prepare($update_customer);

                    // Add the data into the database 
                    $statement->execute(array(':username' => $username, ':contact' => $cell, ':country' => $country, ':province' => $province, ':city' => $city, ':zip' => $zip, ':id' => $hidden_id));

                    //Check is one data was created in database the echo result
                    if ($statement->rowcount() == 1) {
                        $result = flashMEssage("Welcome to Kasi Mall", "Pass");
                    }
                
            } catch (PDOException $ex) {
                $result = flashMessage("An Error Occerred" . $ex->getMessage());
            }
        } else {
            if (count($form_errors) == 1) {
            } else {
            }
        }
    } else {
        //Throw and error
        $result = flashMessage("This request originates from an unknown source. Possible attack");
    }
}
