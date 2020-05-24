<?php

if ((isset($_SESSION['id']) || isset($_GET['p_id'])) && !isset($_POST['updateshipping'])) {
    if (isset($_GET['p_id'])) {
        $product_id = $_GET['p_id'];
        $ip_add = getRealIpUser();
        $user_id = $_SESSION['id'];
    } else {
        $user_id = $_SESSION['id'];
        $ip_add = getRealIpUser();
    }


    $sqlQuery = "SELECT * FROM cart WHERE product_id = :product_id AND ip_address = :ip_address";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':product_id' => $product_id, ':ip_address' => $ip_add));

    while ($rs = $statement->fetch()) {
        $cart_id = $rs['cart_id'];
        $shop_id = $rs['m_id'];
        $product_id  = $rs['product_id'];
        $quantity  = $rs['quantity'];
        $unit_price  = $rs['unit_price'];
        $total_price  = $rs['total_price'];
        $product_image  = $rs['product_image'];
        $shop_name  = $rs['shop_name'];
        $product_name  = $rs['product_name'];
    }
} else if (isset($_POST['updateshipping'])) {



    //initialize an array to store any error message from the form
    $form_errors = array();

    //Form validation to be passed to function of check_empty_fields();
    $required_fields = array('Name', 'Surname', 'Email', 'Country', 'Province', 'Kasi', 'Address', 'Zip', 'Cell');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('Name' => 3, 'Surname' => 3, 'Email' => 3, 'Kasi' => 3, 'Address' => 3, 'Cell' => 3);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));




    // Get all records from inputs
    $name         = $_POST['Name'];
    $surname         = $_POST['Surname'];
    $email         = $_POST['Email'];
    $country         = $_POST['Country'];
    $province         = $_POST['Province'];
    $kasi        = $_POST['Kasi'];
    $address         = $_POST['Address'];
    $zip         = $_POST['Zip'];
    $cell         = $_POST['Cell'];
    $gender         = $_POST['Gender'];
    $ip               = getRealIpUser();
    $date               = current_date();
    $user_id = $_POST['hidden_user'];
    $shop_id = $_POST['hidden_shop'];
    $product_id = $_POST['hidden_product'];



    if (empty($form_errors)) {
        try {

            // create sql to insert into database
            $insert_delivery = "INSERT INTO order_delivery (m_id,user_id,ip_address,name,surname,email,country,province,kasi,street_address,zip,cell,order_date,order_status,gender,product_id)
VALUES (:m_id,:user_id,:ip_address,:name,:surname,:email,:country,:province,:kasi,:street_address,:zip,:cell,:order_date,:order_status,:gender,:product_id)";

            // use PDO to prepare and sanitize the data
            $statement = $db->prepare($insert_delivery);



            // Add the data into the database 
            $statement->execute(array(':m_id' => $shop_id, ':user_id' => $user_id, ':ip_address' => $ip, ':name' => $name, ':surname' => $surname, ':email' => $email, ':country' => $country, ':province' => $province, ':kasi' => $kasi, ':street_address' => $address, ':zip' => $zip, ':cell' => $cell, ':order_date' => $date, ':order_status' => 'pending', ':gender' => $gender,':product_id' => $product_id));


            //Check is one data was created in database the echo result
            if ($statement->rowcount() == 1) {
                $_SESSION["successMessage"] =  "Added to Orders. Please Make Payment";
                echo "<script>window.open('payment.php','_self')</script>";
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
