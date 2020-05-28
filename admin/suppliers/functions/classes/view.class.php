<?php

if ((isset($_SESSION['a_id']) || isset($_GET['view'])) && !isset($_POST['activate']) && !isset($_POST['deactivate'])) {

    if (isset($_GET['view'])) {
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
} else if (isset($_POST['activate'])) {

        $shop_id = $_GET['view'];

        

            $sql = "UPDATE merchant SET activated=:activated WHERE m_id=:m_id AND activated='0'";

            $statement = $db->prepare($sql);
            $statement->execute(array(':activated' => "1", ':m_id' => $shop_id));
    
            if ($statement->rowCount() == 1) {
                echo " 
            <script>
            window.location.replace('supplier.php?view={$shop_id}');
            </script>
            ";
            }


        

    } else if (isset($_POST['deactivate'])) {

        $shop_id = $_GET['view'];

        try {

            $sql = "UPDATE merchant SET activated=:activated WHERE m_id=:m_id AND activated='1'";

            $statement = $db->prepare($sql);
            $statement->execute(array(':activated' => "0", ':m_id' => $shop_id));
    
            if ($statement->rowCount() == 1) {
                echo " 
            <script>
            window.location.replace('supplier.php?view={$shop_id}');
            </script>
            ";
            }


        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occorrd" . $ex->getMessage());
        }

    }

