<?php
session_start();
include_once("../../functions/db.php");
include("../../functions/functions.php");

if (!isset($_SESSION['id']) & empty($_SESSION['c_email'])) {
    $_SESSION["errorMessage"] =  "Login to add products to cart.";
    echo "<script>window.open('../../../login.php','_self')</script>";
} else if (isset($_SESSION['id']) && isset($_GET['product_id'])) {

        $ip_add = getRealIpUser();
        $product_id = $_GET['product_id'];
        $date = current_date();

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

                $sqlCheckCart = "SELECT * FROM cart WHERE ip_address=:ip_address AND product_id=:product_id";
                $statementCheckCart = $db->prepare($sqlCheckCart);
                $statementCheckCart->execute(array(':ip_address' => $ip_add, ':product_id' => $product_id));
                

                if ($statementCheckCart->rowcount() > 0) {
                    $_SESSION["errorMessage"] =  "Product already added in trolley.";
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

                    $total_price = $product_price;

                    $sqlInsertCart = "INSERT INTO cart (m_id,product_id,unit_price,total_price,cart_date,ip_address,product_image,shop_name,product_name) VALUES (:shop_id,:product_id,:unit_price,:total_price,:cart_date,:ip_address,:product_image,:shop_name,:product_name)" ;
                    $statementInsertCart = $db->prepare($sqlInsertCart);
                    $statementInsertCart->execute(array(':shop_id' => $shop_id,':product_id' => $product_id,':unit_price' => $product_price,':total_price' => $total_price,':cart_date' => $date,':ip_address' => $ip_add,':product_image' => $product_image,':shop_name' => $shop_name,':product_name' => $product_name,));

                    if ($statementInsertCart->rowcount() == 1) {
                        $result = flashMEssage("Product added to iTrolley","Pass");
                        $_SESSION["successMessage"] =  "Product added to iTrolley.";
            $page = "../../../products.php?mid={$shop_id}";
            redirectTo($page);
                    } else {
                        
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
