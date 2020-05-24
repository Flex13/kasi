<?php
session_start();
include_once("../../functions/db.php");
include("../../functions/functions.php");

if (isset($_SESSION['id']) && isset($_GET['product_id'])) {
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $user_id = $_SESSION['id'];

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

            $sqlQuerylikeproduct = "INSERT INTO wishlist (user_id,product_id,product_name,product_image,shop_id,liked,product_price,product_description) VALUES (:user_id,:product_id,:product_name,:product_image,:shop_id,:liked,:prodcut_price,:product_description)";
            $likeProduct = $db->prepare($sqlQuerylikeproduct);
            $likeProduct->execute(array(':user_id' => $user_id, ':product_id' => $product_id, ':product_name' => $product_name, ':product_image' => $product_image, ':shop_id' => $shop_id, ':liked' => '1',':product_price' => $product_price, ':product_description' => $product_description));


            if ($likeProduct->rowcount() == 1) {
                $_SESSION["successMessage"] =  "Product added to wishlist.";
                echo "<script>window.open('../../../shops.php','_self')</script>";
            }
        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occerred" . $ex->getMessage());
        }
    }
}
