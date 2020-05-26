<?php

if ((isset($_SESSION['a_id']) || isset($_GET['edit'])) && !isset($_POST['editcustomer'])) {
    if (isset($_GET['edit'])) {
        $user_id = $_GET['edit'];
    } else {
        $id = $_SESSION['a_id'];
    }

    $sqlQuery = "SELECT * FROM customers WHERE id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':id' => $user_id));

    while ($rs = $statement->fetch()) {
        $id = $rs['id'];
        $c_username = $rs['c_username'];
        $c_email = $rs['c_email'];
        $c_name = $rs['c_firstname'];
        $c_surname  = $rs['c_surname'];
        $c_cell  = $rs['c_contact'];
        $c_gender  = $rs['c_gender'];
        $c_country  = $rs['c_country'];
        $c_province  = $rs['c_province'];
        $c_city  = $rs['c_city'];
        $c_kasi  = $rs['c_kasi'];
        $c_street_address  = $rs['c_street_address'];
        $c_zip  = $rs['c_zip'];
        $c_image  = $rs['c_image'];
        $activated = $rs['activated'];
        $reg_date = $rs['c_reg_date'];
    }
} else if (isset($_POST['editcustomer'])) {



    //initialize an array to store any error message from the form
    $form_errors = array();

    //Form validation to be passed to function of check_empty_fields();
    $required_fields = array('Name', 'Surname', 'Email','Username', 'Gender', 'Cell', 'Province', 'Kasi', 'Address', 'Zip', 'City');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('Name' => 3, 'Surname' => 3, 'Username' => 3, 'Cell' => 10);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));




    // Get all records from inputs
    $c_name               = $_POST['Name'];
    $c_surname            = $_POST['Surname'];
    $c_email              = $_POST['Email'];
    $c_username         = $_POST['Username'];
    $c_cell        = $_POST['Cell'];
    $c_province         = $_POST['Province'];
    $c_kasi         = $_POST['Kasi'];
    $c_city         = $_POST['City'];
    $c_street_address         = $_POST['Address'];
    $c_zip         = $_POST['Zip'];
    $c_gender         = $_POST['Gender'];
    $id = $_GET['edit'];



    if (empty($form_errors)) {
        try {

            // create sql to insert into database
            $update_customer = "UPDATE customers SET 
            c_username=:username,
            c_email=:email,
            c_contact=:contact,
            c_province=:province,
            c_city=:city,
            c_kasi=:kasi,
            c_gender=:gender,
            c_firstname=:name,
            c_surname=:surname,
            c_street_address=:street_address,
            c_zip=:zip
            WHERE id =:id ";

            // use PDO to prepare and sanitize the data
            $statement = $db->prepare($update_customer);

            // Add the data into the database 
            $statement->execute(array(':username' => $c_username, ':email' => $c_email,':name' => $c_name, ':surname' => $c_surname, ':contact' => $c_cell, ':gender' => $c_gender, ':province' => $c_province, ':city' => $c_city, ':kasi' => $c_kasi, ':street_address' => $c_street_address, ':zip' => $c_zip,':id' => $id));

            //Check is one data was created in database the echo result
            if ($statement->rowcount() == 1) {
                $result = flashMEssage("Customer Updated", "Pass");
            } else {
                $result = flashMEssage("Did not update");
            }
        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occerred" . $ex->getMessage());
        }
    } else {
        if (count($form_errors) == 1) {
        } else {
        }
    }
}
