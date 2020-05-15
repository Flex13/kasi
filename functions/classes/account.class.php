<?php

if ((isset($_SESSION['id']) || isset($_GET['edit'])) && !isset($_POST['update'])) {
    if (isset($_GET['edit'])) {
        $url_encoded_id = $_GET['edit'];
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
        $zip = $rs['c_zip'];
        $address = $rs['c_street_address'];
    }
    $encode_id = base64_encode("encodeuserid{$id}");
} else if (isset($_POST['update'])) {

    

        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation to be passed to function of check_empty_fields();
        $required_fields = array('Username', 'Gender','Cell', 'Country', 'Province', 'City','Address','Zip');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //Fields that requires checking for minimum length
        $fields_to_check_length = array('Username' => 3,'Cell' => 10);

        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));
        



        // Get all records from inputs
        $username         = $_POST['Username'];
        $contact         = $_POST['Cell'];
        $country         = $_POST['Country'];
        $province         = $_POST['Province'];
        $city         = $_POST['City'];
        $address         = $_POST['Address'];
        $zip         = $_POST['Zip'];
        $hidden_id         = $_POST['hidden_id'];
        $gender         = $_POST['Gender'];


        if (empty($form_errors)) {
            try {



                // create sql to insert into database
                $update_customer = "UPDATE customers SET c_username=:username,c_gender=:gender,c_contact=:cell,c_country=:country,c_province=:province,c_city=:city,c_street_address=:address,c_zip=:zip WHERE id=:id";

                // use PDO to prepare and sanitize the data
                $statement = $db->prepare($update_customer);

                // Add the data into the database 
                $statement->execute(array(':username' => $username, ':gender' => $gender, ':cell' => $contact, ':country' => $country, ':province' => $province, ':city' => $city, ':address' => $address, ':zip' => $zip, ':id' => $hidden_id));

                //Check is one data was created in database the echo result
                if ($statement->rowcount() == 1) {
                    $result = flashMEssage("Profile Updated", "Pass");
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
