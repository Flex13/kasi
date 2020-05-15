<?php
if ((isset($_SESSION['id']))) {
    
    $id = $_SESSION['id'];
    

    $sqlQuery = "SELECT * FROM customers WHERE id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('id' => $id));

    while ($rs = $statement->fetch()) {
        $username = $rs['c_username'];
        $email = $rs['c_email'];
        $name = $rs['c_firstname'];
        $surname = $rs['c_surname'];
        $contact = $rs['c_contact'];
        $country = $rs['c_country'];
        $province = $rs['c_province'];
        $city = $rs['c_city'];
        $image = $rs['c_image'];
        $date_joined = strftime("%b %d, %Y", strtotime($rs['c_reg_date']));
    }
    $encode_id = base64_encode("encodeuserid{$id}");
}