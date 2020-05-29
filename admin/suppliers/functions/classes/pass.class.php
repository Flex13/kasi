<?php



if ((isset($_SESSION['a_id']) || isset($_GET['pass'])) && !isset($_POST['updatePassword'])) {
    if (isset($_GET['pass'])) {
        $shop_id = $_GET['pass'];
    } else {
        $id = $_SESSION['a_id'];
    }

    $sqlQuery = "SELECT * FROM merchant WHERE m_id = :m_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':m_id' => $shop_id));

    while ($rs = $statement->fetch()) {
        $DB_password = $rs['m_password'];
        $shop_id = $rs['m_id'];
    }
} else if (isset($_POST['updatePassword'])) {

        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation to be passed to function of check_empty_fields();
        $required_fields = array('Password');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //Fields that requires checking for minimum length
        $fields_to_check_length = array('Password' => 6);

        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        if (empty($form_errors)) {
            // Get all records from inputs
            $newpassword         = $_POST['Password'];
            $confirmpassword            = $_POST['Password2'];
            $id =                 $_POST['hidden_id'];

            if ($newpassword != $confirmpassword) {
                $result = flashMEssage("New Password does not match confirm Confirm Password");
            } else {
                try {
                            //hash the new password

                            $hashed_password = password_hash($newpassword, PASSWORD_DEFAULT);
                            //check current password matches in database
                            $sqlQuery = "UPDATE merchant SET m_password = :password WHERE m_id = :id";

                            // use PDO to prepare and sanitize the data
                            $statement = $db->prepare($sqlQuery);

                            // Add the data into the database 
                            $statement->execute(array(':password' => $hashed_password, ':id' => $id));

                            if ($statement->rowcount() === 1){
                                $result = flashMessage("Password Updated Successfully", "Pass");
                            } else {
                                $result = flashMessage("No changes saved");
                            }

                } catch (PDOException $ex) {
                    $result = flashMessage("An Error Occerred" . $ex->getMessage());
                }
            }
        } else {
            if (count($form_errors) == 1) {
                
            } else {
                
            }
        }
   
}

?>
