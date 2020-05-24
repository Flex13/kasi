<?php
if ((isset($_SESSION['id']) || isset($_GET['s_id'])) && !isset($_POST['updateshipping'])) {
    if (isset($_GET['s_id'])) {
        $url_encoded_id = $_GET['s_id'];
        $decode_id = base64_decode($url_encoded_id);
        $user_id_array = explode("encodeuserid", $decode_id);
        $shop_id = $user_id_array[1];
        $ip_add = getRealIpUser();
        $user_id = $_SESSION['id'];
    } else {
        $user_id = $_SESSION['id'];
        $ip_add = getRealIpUser();
    }


    $sqlQuery = "SELECT * FROM cart WHERE m_id = :m_id AND ip_address = :ip_address";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':m_id' => $shop_id, ':ip_address' => $ip_add));

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
}