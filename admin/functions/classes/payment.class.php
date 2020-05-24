<?php

if ((isset($_SESSION['id']))) {
       $user_id = $_SESSION['id'];
    

    $sqlQuery = "SELECT * FROM customers WHERE id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('id' => $user_id));

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


    $sqlQuery1 = "SELECT * FROM order_delivery WHERE user_id = :user_id";
    $statement1 = $db->prepare($sqlQuery1);
    $statement1->execute(array(':user_id' => $user_id));

    while ($rs = $statement1->fetch()) {
        $shop_id = $rs['m_id'];
        $user_id = $rs['user_id'];
        $delivery_id = $rs['delivery_id'];
        $ip_address = $rs['ip_address'];
        $product_id = $rs['product_id'];
    }

}