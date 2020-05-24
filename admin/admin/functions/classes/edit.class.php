<?php

if ((isset($_SESSION['a_id']) || isset($_GET['edit'])) && !isset($_POST['editadmin'])) {
    if (isset($_GET['edit'])) {
        $admin_id = $_GET['edit'];
    } else {
        $id = $_SESSION['a_id'];
    }

    $sqlQuery = "SELECT * FROM admins WHERE id = :admin_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':admin_id' => $admin_id));

    while ($rs = $statement->fetch()) {
        $id = $rs['id'];
        $name = $rs['name'];
        $surname = $rs['surname'];
        $a_email = $rs['email'];
        $a_username  = $rs['username'];
        $cell = $rs['cell'];
    }
} else if (isset($_POST['editadmin'])) {



    //initialize an array to store any error message from the form
    $form_errors = array();

    //Form validation to be passed to function of check_empty_fields();
    $required_fields = array('Name', 'Surname', 'Email','Username', 'Cell');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('Name' => 3, 'Surname' => 3, 'Username' => 3, 'Cell' => 10);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));




        // Get all records from inputs
        $name               = $_POST['Name'];
        $surname            = $_POST['Surname'];
        $a_email              = $_POST['Email'];
        $a_username         = $_POST['Username'];
        $cell        = $_POST['Cell'];
        $hidden_id        = $_POST['hidden_id'];



    if (empty($form_errors)) {
        try {

            // create sql to insert into database
            $update_admin = "UPDATE admins SET name=:name,surname=:surname,email=:email,username=:username,cell=:cell WHERE id=:hidden_id";

            // use PDO to prepare and sanitize the data
            $statement = $db->prepare($update_admin);

            // Add the data into the database 
            $statement->execute(array(':name' => $name, ':surname' =>  $surname, ':email' => $a_email,':username' => $a_username, ':cell' => $cell, ':hidden_id' => $hidden_id));

            //Check is one data was created in database the echo result
            if ($statement->rowcount() == 1) {
                $result = flashMEssage("Admin Updated", "Pass");
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
