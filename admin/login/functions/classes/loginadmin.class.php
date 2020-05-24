
<?php

if (isset($_POST['login'])) {


        //array to hold errors
        $form_errors = array();

        //Validate the form
        $required_fields = array('Email', 'Password');
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //Fields that requires checking for minimum length
        $fields_to_check_length = array('Password' => 6);

        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        //email validation / merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_email($_POST));



        if (empty($form_errors)) {
            //collect form data
            $a_email = $_POST['Email'];
            $password = $_POST['Password'];



            //check if user exist in the database
            $sqlQueryCustomer = "SELECT * FROM admins WHERE email = :email";
            $statementCustomer = $db->prepare($sqlQueryCustomer);
            $statementCustomer->execute(array(':email' => $a_email));




            if ($row = $statementCustomer->fetch()) {
                $id = $row['id'];
                $hashed_password = $row['password'];
                $email = $row['email'];
                $username = $row['username'];
                $name = $row['name'];
                $surname = $row['surname'];
                $activated = $row['activated'];
                $usertype = $row['user_type'];

                if ($activated == "0") {
                    //Check User in trash
                    $sqlQueryUser = "SELECT * FROM trash WHERE admin_id = :id";
                    $statement = $db->prepare($sqlQueryUser);
                    $statement->execute(array(':id' => $id));

                    if ($row = $statement->fetch()) {
                        //Activate Account
                        $sqlActivateUser = "UPDATE admins SET activated = '1' WHERE id = :id LIMIT 1";
                        $statement = $db->prepare($sqlActivateUser);
                        $statement->execute(array(':id' => $id));

                        //Remove USer From Trash
                        $sqlRemoveUser =  "DELETE FROM trash WHERE admin_id = :id LIMIT 1";
                        $statement = $db->prepare($sqlRemoveUser);
                        $statement->execute(array(':id' => $id));

                        //Login User
                        prepLogin($id,$a_email,$name,$surname,$usertype);
                    } else {
                        $result = flashMessage("Please activate your account to login. Contact IT department ");
                    }
                } else {
                    if (password_verify($password, $hashed_password)) {
                        prepLogin($id,$a_email,$name,$surname,$usertype);
                    } else {
                        $result = flashMessage("You have entered an invalid password");
                    }
                }
            } else {
                $result = flashMessage("You have entered and invalid email");
            }

           
        } else {
            if (count($form_errors) == 1) {
               
            } else {
                
            }
        }
}

?>