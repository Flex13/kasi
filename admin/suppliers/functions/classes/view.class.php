<?php

if ((isset($_SESSION['a_id']) || isset($_GET['view']))) {

    if(isset($_GET['view'])) {
        $shop_id = $_GET['view'];
    }

    $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id ";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':id' => $shop_id));


    while ($rs = $statement->fetch()) {
        $shop_id = $rs['m_id'];
        $shop_email = $rs['shop_email'];
        $shop_cell = $rs['shop_cell'];
        $shop_province = $rs['shop_province'];
        $shop_city = $rs['shop_city'];
        $shop_kasi = $rs['shop_kasi'];
        $shop_address = $rs['shop_address'];
        $shop_zip = $rs['shop_zip'];

        $shop_name = $rs['m_shop_name'];
        $shop_description = $rs['m_description'];
        $m_email = $rs['m_email'];
        $m_cell = $rs['m_contact'];
        $shop_image = $rs['m_image'];
        $activated = $rs['activated'];
        $shop_date_joined = strftime("%b %d, %Y", strtotime($rs['m_reg_date']));
    }

} 