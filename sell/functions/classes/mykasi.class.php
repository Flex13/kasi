<?php
if ((isset($_SESSION['m_id']))) {
    
    $shop_id = $_SESSION['m_id'];
    

    $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('id' => $shop_id));

    while ($rs = $statement->fetch()) {
        $email = $rs['m_email'];
        $shopname = $rs['m_shop_name'];
    }
    $encode_id = base64_encode("encodeuserid{$shop_id}");
}