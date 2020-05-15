<?php

if ((isset($_SESSION['cab_id']))) {
        $id = $_SESSION['cab_id'];
    

    $sqlQuery = "SELECT * FROM cab WHERE cab_id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('id' => $id));

    while ($rs = $statement->fetch()) {
        $username = $rs['username'];
        $email = $rs['email'];
        $contact = $rs['contact'];
        $country = $rs['country'];
        $province = $rs['province'];
        $city = $rs['city'];
        $street = $rs['street_address'];
        $zip = $rs['zip'];
        $gender = $rs['gender'];
    }
}