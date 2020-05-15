<?php

if ((isset($_SESSION['m_id']) || isset($_GET['mid'])) && !isset($_POST['updateshop'])) {
    if (isset($_GET['mid'])) {
        $url_encoded_id = $_GET['mid'];
        $decode_id = base64_decode($url_encoded_id);
        $user_id_array = explode("encodeuserid", $decode_id);
        $shop_id = $user_id_array[1];
    } else {
        $shop_id = $_SESSION['m_id'];
    }

    $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('id' => $shop_id));

    while ($rs = $statement->fetch()) {
        $shop_id = $rs['m_id'];
        $shop_name = $rs['m_shop_name'];
        $shop_description = $rs['m_description'];
        $shop_owner_username = $rs['m_username'];
        $shop_email = $rs['m_email'];
        $shop_cell = $rs['m_contact'];
        $shop_country = $rs['m_country'];
        $shop_province = $rs['m_province'];
        $shop_kasi = $rs['m_city'];
        $shop_street_name = $rs['m_street_name'];
        $shop_zip = $rs['m_zip'];
        $shop_image = $rs['m_image'];
        $shop_date_joined = strftime("%b %d, %Y", strtotime($rs['m_reg_date']));
    }

    $shop_encode_id = base64_encode("encodeuserid{$shop_id}");
} else if (isset($_POST['updateshop'])) {


        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation to be passed to function of check_empty_fields();
        $required_fields = array('Name', 'Description', 'Province', 'Kasi', 'Street-Name', 'Zip', 'Cell', 'Email');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //Fields that requires checking for minimum length
        $fields_to_check_length = array('Name' => 1, 'Description' => 5,'Kasi' => 3,'Street-Name' => 3,'Zip' => 1, 'Cell' => 10);

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
        $shop_name         = $_POST['Name'];
        $shop_description         = $_POST['Description'];
        $shop_email         = $_POST['Email'];
        $shop_contact         = $_POST['Cell'];
        $shop_province         = $_POST['Province'];
        $shop_kasi         = $_POST['Kasi'];
        $shop_street_name         = $_POST['Street-Name'];
        $shop_zip         = $_POST['Zip'];
        $shop_cell         = $_POST['Cell'];
        $shop_hidden_id         = $_POST['hidden_id'];


        if (empty($form_errors)) {
            try {

                $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id";
                $statement = $db->prepare($sqlQuery);
                $statement->execute(array('id' => $shop_hidden_id));

                while ($rs = $statement->fetch()) {
                    $shop_id = $rs['m_id'];
                    $shop_user_id  = $rs['user_id'];
                }




                // create sql to insert into database
                $update_shop = "UPDATE merchant SET m_email=:email,m_shop_name=:shopname,m_contact=:contact,m_province=:province,m_city=:kasi,m_street_name=:street_name,m_zip=:m_zip,m_description=:description WHERE m_id=:id";

                // use PDO to prepare and sanitize the data
                $statement = $db->prepare($update_shop);


                if ($shoppic != null) {

                    $update_shopImage = "UPDATE merchant SET m_email=:email,m_shop_name=:shopname,m_contact=:contact,m_province=:province,m_city=:kasi,m_street_name=:street_name,m_zip=:m_zip, m_image=:m_image WHERE m_id=:id";

                    $shoppic_path1 = uploadShopImage($shop_name);

                    if (!$shoppic_path1) {

                        $shoppic_path1 = "uploads/shops.jpg";
                    }

                    // use PDO to prepare and sanitize the data
                    $statement = $db->prepare($update_shopImage);


                    // Add the data into the database 
                    $statement->execute(array(':email' => $shop_email, ':shopname' => $shop_name, ':contact' => $shop_contact, ':province' => $shop_province, ':kasi' => $shop_kasi,':street_name'=> $shop_street_name, ':m_zip' => $shop_zip, ':m_image' => $shoppic_path1, ':id' => $shop_id));


                } else {
                    // Add the data into the database 
                    $statement->execute(array(':email' => $shop_email, ':shopname' => $shop_name, ':contact' => $shop_contact, ':province' => $shop_province, ':kasi' => $shop_kasi,':street_name'=> $shop_street_name, ':m_zip' => $shop_zip, ':description' => $shop_description, ':id' => $shop_id));
                }


                //Check is one data was created in database the echo result
                if ($statement->rowcount() == 1) {
                    $result = flashMEssage("Update Successfull", "Pass");
                    $_SESSION["successMessage"] =  "Update Successfull";
                            echo "<script>window.open('m_index.php','_self')</script>";
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
