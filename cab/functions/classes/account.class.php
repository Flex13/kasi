<?php
if (isset($_POST['update'])) {

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
                $insert_customer = "INSERT INTO cab (username,gender,contact,country,province,city,street_address,zip)
                VALUES (:username,:gender,:cell,:country,:province,:city,:address,:zip)";


                // use PDO to prepare and sanitize the data
                $statement = $db->prepare($insert_customer);

                // Add the data into the database 
                $statement->execute(array(':username' => $username, ':gender' => $gender, ':cell' => $contact, ':country' => $country, ':province' => $province, ':city' => $city, ':address' => $address, ':zip' => $zip));

                //Check is one data was created in database the echo result
                if ($statement->rowcount() == 1) {
                $_SESSION["successMessage"] =  "Thank you for a2b Deliveery. Sign in and start using our awesome service";
                echo "<script>window.open('cab_login.php','_self')</script>";
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
