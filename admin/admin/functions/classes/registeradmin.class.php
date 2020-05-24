
<?php

if (isset($_POST['registeradmin'])) {


    //initialize an array to store any error message from the form
    $form_errors = array();

    //Form validation to be passed to function of check_empty_fields();
    $required_fields = array('Name', 'Surname', 'Email', 'Password', 'Username', 'Cell');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('Name' => 3, 'Surname' => 3, 'Password' => 6, 'Username' => 3, 'Cell' => 10);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));




    // Get all records from inputs
    $name               = $_POST['Name'];
    $surname            = $_POST['Surname'];
    $a_email              = $_POST['Email'];
    $password           = $_POST['Password'];
    $cpassword          = $_POST['Password2'];
    $a_username         = $_POST['Username'];
    $cell        = $_POST['Cell'];
    $date               = current_date();

    //CHeck Email exists 
    if (checkDuplicateEmail2($a_email, $db)) {
        $result = flashMessage("Email Already Taken, please try another one");
    } else if (checkDuplicateUsername($a_username, $db)) {
        $result = flashMessage("Username Already Taken, please try another one");
    } else if ($password != $cpassword) {
        $result = flashMessage("Passwords to do not match, Please try again");
        //check if error array is empty, if yes process form data and insert record
    } else if (empty($form_errors)) {

        //hash the password input
        $password_hash = password_hash($password, PASSWORD_DEFAULT);


        try {

            // create sql to insert into database
            $insert_admin = "INSERT INTO admins (name,surname,password,email,username,cell,reg_date)
            VALUES (:name,:surname,:password,:email,:username,:cell,:reg_date)";

            // use PDO to prepare and sanitize the data
            $statement = $db->prepare($insert_admin);



            // Add the data into the database 
            $statement->execute(array(':name' => $name,':surname' => $surname, ':password' => $password_hash, ':email' => $a_email, ':username' => $a_username, ':cell' => $cell, ':reg_date' => $date));

            //Check is one data was created in database the echo result
            if ($statement->rowcount() == 1) {
                $result = flashMessage("Admin Added", "Pass");
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
