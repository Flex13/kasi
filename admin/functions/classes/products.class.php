<?php

if ((isset($_SESSION['c_email']) || isset($_GET['mid'])) && !isset($_POST['likeProduct'])) {
    if (isset($_GET['mid'])) {
        $shop_id = $_GET['mid'];
    }

    $sqlQuery = "SELECT * FROM products WHERE m_id = :m_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('m_id' => $shop_id));
    
} else if  (isset($_POST['likeProduct'])) {

    

    $product_id = $_POST['hidden_product_id'];
    $user_id = $_SESSION['id'];
    $ip_add = getRealIpUser();
    $date = current_date();


    $sqlQuery = "SELECT * FROM products WHERE product_id = :product_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':product_id' => $product_id));


    while ($rs = $statement->fetch()) {
        $shop_id = $rs['m_id'];
        $product_id = $rs['product_id'];
        $category  = $rs['cat_name'];
        $product_name  = $rs['product_name'];
        $product_price  = $rs['product_price'];
        $product_description  = $rs['product_description'];
        $product_image  = $rs['product1'];
    }

    try {

        $sqlwishlistcheck = "SELECT * FROM wishlist WHERE ip_address=:ip_address AND product_id=:product_id";
        $statementCheckwishlist = $db->prepare($sqlwishlistcheck);
        $statementCheckwishlist->execute(array(':ip_address' => $ip_add, ':product_id' => $product_id));


        if ($statementCheckwishlist->rowcount() > 0) {
            $result = flashMEssage("Product already added to wishlist");
            echo "<meta http-equiv='refresh' content='0'>";
        } else {

            $sqlQuery2 = "SELECT * FROM products WHERE product_id=:product_id";
            $statement2 = $db->prepare($sqlQuery2);
            $statement2->execute(array(':product_id' => $product_id));

            while ($rs = $statement2->fetch()) {
                $shop_id = $rs['m_id'];
                $product_id = $rs['product_id'];
                $product_name = $rs['product_name'];
                $category  = $rs['cat_name'];
                $product_price  = $rs['product_price'];
                $product_description  = $rs['product_description'];
                $product_image  = $rs['product1'];
            }

            $sqlQuery3 = "SELECT * FROM merchant WHERE m_id=:m_id";
            $statement3 = $db->prepare($sqlQuery3);
            $statement3->execute(array(':m_id' => $shop_id));

            while ($rs = $statement3->fetch()) {
                $shop_name = $rs['m_shop_name'];
            }


            $user_id = $_SESSION['id'];
            $date = current_date();

            $sqlQuerylikeproduct = "INSERT INTO wishlist (user_id,product_id,product_name,product_image,shop_id,shop_name,timestamp,liked,ip_address,product_price,product_description) VALUES (:user_id,:product_id,:product_name,:product_image,:shop_id,:shop_name,:date,:liked,:ip_address,:product_price,:product_description)";
            $likeProduct = $db->prepare($sqlQuerylikeproduct);
            $likeProduct->execute(array(':user_id' => $user_id, ':product_id' => $product_id, ':product_name' => $product_name, ':product_image' => $product_image, ':shop_id' => $shop_id, ':shop_name' =>  $shop_name, ':date' => $date, ':liked' => '1', ':ip_address' => $ip_add,':product_price' => $product_price, ':product_description' => $product_description));



            if ($likeProduct->rowcount() == 1) {
                $result = flashMEssage("Product added to wishlist", "Pass");
                echo "<meta http-equiv='refresh' content='0'>";
               
            } else {
                $result = flashMEssage("Something went wrong. Please try again");
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }
    } catch (PDOException $ex) {
        $result = flashMessage("An Error Occerred" . $ex->getMessage());
    }

}
