<?php

if ((isset($_SESSION['a_id']) || isset($_GET['edit'])) && !isset($_POST['editsupplier'])) {
    if (isset($_GET['edit'])) {
        $shop_id = $_GET['edit'];
    } else {
        $id = $_SESSION['a_id'];
    }

    $sqlQuery = "SELECT * FROM merchant WHERE m_id = :m_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':m_id' => $shop_id));

    while ($rs = $statement->fetch()) {
        $shop_id = $rs['m_id'];
        $shop_email = $rs['shop_email'];
        $shop_cell = $rs['shop_cell'];
        $shop_province = $rs['shop_province'];
        $shop_city = $rs['shop_city'];
        $shop_kasi = $rs['shop_kasi'];
        $shop_address = $rs['shop_address'];
        $shop_zip = $rs['shop_zip'];
        $shop_name = $rs['m_shop_name'];
        $shop_description = $rs['m_description'];

        $m_username = $rs['m_username'];
        $m_gender = $rs['m_gender'];
        $m_name = $rs['m_firstname'];
        $m_surname = $rs['m_surname'];
        $m_email = $rs['m_email'];
        $m_cell = $rs['m_contact'];
        $m_province = $rs['m_province'];
        $m_city = $rs['m_city'];
        $m_street_address = $rs['m_street_address'];
        $m_zip = $rs['m_zip'];
        $m_kasi = $rs['m_kasi'];
    }
} else if (isset($_POST['editsupplier'])) {



    //initialize an array to store any error message from the form
    $form_errors = array();

    //Form validation to be passed to function of check_empty_fields();
    $required_fields = array('Name', 'Surname', 'Email', 'Username', 'Gender', 'Cell', 'Province', 'Kasi', 'Address', 'Zip', 'City', 'Shop_Name', 'About', 'Shop_Province', 'Shop_Kasi', 'Shop_Address', 'Shop_Zip', 'Shop_City', 'Shop_Email', 'Shop_Cell');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('Name' => 3, 'Surname' => 3, 'Username' => 3, 'Cell' => 10);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));




    // Get all records from inputs
    $m_name               = $_POST['Name'];
    $m_surname            = $_POST['Surname'];
    $m_email              = $_POST['Email'];
    $m_username         = $_POST['Username'];
    $m_cell        = $_POST['Cell'];
    $m_province         = $_POST['Province'];
    $m_kasi         = $_POST['Kasi'];
    $m_city         = $_POST['City'];
    $m_street_address         = $_POST['Address'];
    $m_zip         = $_POST['Zip'];
    $m_gender  = $_POST['Gender'];

    $shop_name        = $_POST['Shop_Name'];
    $shop_description        = $_POST['About'];
    $shop_email              = $_POST['Shop_Email'];
    $shop_cell        = $_POST['Shop_Cell'];
    $shop_province         = $_POST['Shop_Province'];
    $shop_kasi         = $_POST['Shop_Kasi'];
    $shop_city         = $_POST['Shop_City'];
    $shop_address         = $_POST['Shop_Address'];
    $shop_zip         = $_POST['Shop_Zip'];
    $hidden_id        = $_POST['hidden_id'];



    if (empty($form_errors)) {
        try {

            // create sql to insert into database
            $update_supplier = "UPDATE merchant SET 
            m_username=:m_username,
            m_email=:m_email,
            m_shop_name=:m_shopname,
            m_contact=:m_contact,
            m_province=:m_province,
            m_city=:m_city,
            m_kasi=:m_kasi,
            m_gender=:m_gender,
            m_firstname=:m_firstname,
            m_surname=:m_surname,
            m_street_address=:m_street_address,
            m_zip=:m_zip,
            m_description=:m_description,
            shop_email=:shop_email,
            shop_cell=:shop_cell,
            shop_province=:shop_province,
            shop_city=:shop_city,
            shop_kasi=:shop_kasi,
            shop_address=:shop_address,
            shop_zip=:shop_zip
            WHERE m_id =:id ";

            // use PDO to prepare and sanitize the data
            $statement = $db->prepare($update_supplier);

            // Add the data into the database 
            $statement->execute(array(':m_username' => $m_username, ':m_email' => $m_email, ':m_firstname' => $m_name, ':m_surname' => $m_surname, ':m_contact' => $m_cell, ':m_gender' => $m_gender, ':m_province' => $m_province, ':m_city' => $m_city, ':m_kasi' => $m_kasi, ':m_street_address' => $m_street_address, ':m_zip' => $m_zip, ':m_shopname' => $shop_name, ':m_description' => $shop_description, ':shop_email' => $shop_email, ':shop_cell' => $shop_cell, ':shop_province' => $shop_province, ':shop_city' => $shop_city, ':shop_kasi' => $shop_kasi, ':shop_address' => $shop_address, ':shop_zip' => $shop_zip,':id' => $hidden_id));

            //Check is one data was created in database the echo result
            if ($statement->rowcount() == 1) {
                $result = flashMEssage("Supplier Updated", "Pass");
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
