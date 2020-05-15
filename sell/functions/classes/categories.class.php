<?php

if ((isset($_SESSION['m_id']) || isset($_GET['categories']))) {
    if (isset($_GET['categories'])) {
        $url_encoded_id = $_GET['categories'];
        $decode_id = base64_decode($url_encoded_id);
        $shop_id_array = explode("encodeuserid", $decode_id);
        $shop_id = $shop_id_array[1];
    } else {
        $shop_id = $_SESSION['m_id'];
    }

    $sqlQuery = "SELECT * FROM category WHERE m_id = :m_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('m_id' => $shop_id));

    $stmt = $db->prepare('SELECT COUNT(*) FROM category WHERE m_id = :m_id');
    $stmt->execute(array('m_id' => $shop_id));
   
    $row = $stmt->fetch();
    $count = $row[0];

    $shop_encode_id = base64_encode("encodeuserid{$shop_id}");
} 