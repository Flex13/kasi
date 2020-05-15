<?php

if ((isset($_SESSION['m_id']) || isset($_GET['editCategory'])) && !isset($_POST['editCategory'])) {
    if (isset($_GET['editCategory'])) {
        $cat_id = $_GET['editCategory'];
    } else {
        $shop_id = $_SESSION['m_id'];
    }

    $sqlQuery = "SELECT * FROM category WHERE cat_id = :cat_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('cat_id' => $cat_id));

    while ($rs = $statement->fetch()) {
        $cat_id = $rs['cat_id'];
        $shop_category_name  = $rs['category_name'];
        $shop_sub_category  = $rs['sub_category'];
    }

    $shop_encode_id = base64_encode("encodeuserid{$_SESSION['m_id']}");
} else if (isset($_POST['editCategory'])) {



        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation to be passed to function of check_empty_fields();
        $required_fields = array('Name', 'Sub');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //Fields that requires checking for minimum length
        $fields_to_check_length = array('Name' => 3,'Sub' => 3);

        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));




        // Get all records from inputs
        $shop_category_name         = $_POST['Name'];
        $shop_sub_category         = $_POST['Sub'];
        $shop_cat_id         = $_POST['hidden_cat_id'];
        


        if (empty($form_errors)) {
            try {

                // create sql to insert into database
                $update_category = "UPDATE category SET category_name=:cat_name,sub_category=:sub_category WHERE cat_id=:cat_id";

                // use PDO to prepare and sanitize the data
                $statement = $db->prepare($update_category);

                // Add the data into the database 
                $statement->execute(array(':cat_name' => $shop_category_name, ':sub_category' =>  $shop_sub_category, ':cat_id' => $shop_cat_id));

                //Check is one data was created in database the echo result
                if ($statement->rowcount() == 1) {
                    $result = flashMEssage("Category Updated", "Pass");
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