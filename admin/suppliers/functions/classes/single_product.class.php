<?php

if ((isset($_SESSION['a_id']) || isset($_GET['single'])) && !isset($_POST['activate']) && !isset($_POST['deactivate'])) {

    if (isset($_GET['single'])) {
        $product_id = $_GET['single'];
    }

    $sqlQuery = "SELECT * FROM products WHERE product_id = :id ";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':id' => $product_id));


    while ($rs = $statement->fetch()) {
        $product_id = $rs['product_id'];
        $shop_id = $rs['m_id'];
        $cat_name = $rs['cat_name'];
        $sub_cat_name = $rs['sub_cat_name'];
        $product_name = $rs['product_name'];
        $product_description = $rs['product_description'];
        $product_price = $rs['product_price'];
        $image = $rs['image'];
        $activated = $rs['activated'];
        $shop_date_joined = strftime("%b %d, %Y", strtotime($rs['reg_date']));
    }
} else if (isset($_POST['activate'])) {

    $product_id = $_GET['single'];

        

            $sql = "UPDATE products SET activated=:activated WHERE product_id=:id AND activated='0'";

            $statement = $db->prepare($sql);
            $statement->execute(array(':activated' => "1", ':id' => $product_id));
    
            if ($statement->rowCount() == 1) {
                echo " 
            <script>
            window.location.replace('supplier.php?single={$product_id}');
            </script>
            ";
            }


        

    } else if (isset($_POST['deactivate'])) {

        $product_id = $_GET['single'];

        try {

            $sql = "UPDATE products SET activated=:activated WHERE product_id=:id AND activated='1'";

            $statement = $db->prepare($sql);
            $statement->execute(array(':activated' => "0", ':id' => $product_id));
    
            if ($statement->rowCount() == 1) {
                
                echo " 
            <script>
            window.location.replace('supplier.php?single={$product_id}');
            </script>
            ";
            }


        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occorrd" . $ex->getMessage());
        }

    }

