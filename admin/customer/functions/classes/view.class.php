<?php

if ((isset($_SESSION['a_id']) || isset($_GET['view'])) && !isset($_POST['activate']) && !isset($_POST['deactivate'])) {

    if (isset($_GET['view'])) {
        $user_id = $_GET['view'];
    }

    $sqlQuery = "SELECT * FROM customers WHERE id = :id ";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':id' => $user_id));


    while ($rs = $statement->fetch()) {
        $id = $rs['id'];
                                $username = $rs['c_username'];
                                $email = $rs['c_email'];
                                $name = $rs['c_firstname'];
                                $surname  = $rs['c_surname'];
                                $contact  = $rs['c_contact'];
                                $gender  = $rs['c_gender'];
                                $country  = $rs['c_country'];
                                $province  = $rs['c_province'];
                                $city  = $rs['c_city'];
                                $kasi  = $rs['c_kasi'];
                                $street_address  = $rs['c_street_address'];
                                $zip  = $rs['c_zip'];
                                $image  = $rs['c_image'];
                                $activated = $rs['activated'];
                                $reg_date = $rs['c_reg_date'];
    }
} else if (isset($_POST['activate'])) {

        $user_id = $_GET['view'];

        

            $sql = "UPDATE customers SET activated=:activated WHERE id=:id AND activated='0'";

            $statement = $db->prepare($sql);
            $statement->execute(array(':activated' => "1", ':id' => $user_id));
    
            if ($statement->rowCount() == 1) {
                echo " 
            <script>
            window.location.replace('customer.php?view={$user_id}');
            </script>
            ";
            }


        

    } else if (isset($_POST['deactivate'])) {

        $user_id = $_GET['view'];


            $sql = "UPDATE customers SET activated=:activated WHERE id=:id AND activated='1'";

            $statement = $db->prepare($sql);
            $statement->execute(array(':activated' => "0", ':id' => $user_id));
    
            if ($statement->rowCount() == 1) {
                echo " 
                <script>
                window.location.replace('customer.php?view={$user_id}');
                </script>
                ";
            }


    }

