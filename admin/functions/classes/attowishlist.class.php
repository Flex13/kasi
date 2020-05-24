<?php
session_start();
include_once("../../functions/db.php");
include("../../functions/functions.php");

if (!isset($_SESSION['id']) & empty($_SESSION['c_email'])) {
    $_SESSION["errorMessage"] =  "Login to add products to wishlist.";
    echo "<script>window.open('../../../login.php','_self')</script>";
} else if (isset($_SESSION['id']) && isset($_GET['product_id'])) {

    $ip_add = getRealIpUser();
    $product_id = $_GET['product_id'];
    $date = current_date();
    $user_id = $_SESSION['id'];

    $sqlQuery = "SELECT * FROM products WHERE product_id=:product_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':product_id' => $product_id));

    while ($rs = $statement->fetch()) {
        $shop_id = $rs['m_id'];
        $product_id = $rs['product_id'];
        $product_name = $rs['product_name'];
        $category  = $rs['cat_name'];
        $product_price  = $rs['product_price'];
        $product_description  = $rs['product_description'];
        $product_image  = $rs['product1'];
    }


    if (empty($form_errors)) {
        try {

            $sqlwishlistcheck = "SELECT * FROM wishlist WHERE ip_address=:ip_address AND product_id=:product_id";
            $statementCheckwishlist = $db->prepare($sqlwishlistcheck);
            $statementCheckwishlist->execute(array(':ip_address' => $ip_add, ':product_id' => $product_id));


            if ($statementCheckwishlist->rowcount() > 0) {
                $_SESSION["errorMessage"] =  "Product already added to wishlist.";
                $page = "../../../products.php?mid={$shop_id}";
                redirectTo($page);
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

                $sqlQuerylikeproduct = "INSERT INTO wishlist (user_id,product_id,product_name,product_image,shop_id,liked,ip_address,prodcut_price,product_description) VALUES (:user_id,:product_id,:product_name,:product_image,:shop_id,:liked,:ip_address,:prodcut_price,:product_description)";
                $likeProduct = $db->prepare($sqlQuerylikeproduct);
                $likeProduct->execute(array(':user_id' => $user_id, ':product_id' => $product_id, ':product_name' => $product_name, ':product_image' => $product_image, ':shop_id' => $shop_id, ':liked' => '1', ':ip_address' => $ip_add,':product_price' => $product_price, ':product_description' => $product_description));



                if ($likeProduct->rowcount() == 1) {
                    $result = flashMEssage("Products added to wishlist", "Pass");
                    $_SESSION["successMessage"] =  "Products added to wishlist.";
                    $page = "../../../products.php?mid={$shop_id}";
                    redirectTo($page);
                } else {
                    $_SESSION["errorMessage"] =  "Something went wrong. Please try again.";
                    $page = "../../../products.php?mid={$shop_id}";
                    redirectTo($page);
                }
            }
        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occerred" . $ex->getMessage());
        }
    } else {
        if (count($form_errors) == 1) {
        } else {
        }
    }
}
