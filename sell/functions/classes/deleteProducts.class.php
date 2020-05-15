
<?php

if ((isset($_SESSION['m_id']) || isset($_GET['deleteProducts'])) && !isset($_POST['deleteProducts'])) {
    if (isset($_GET['deleteProducts'])) {
        $product_id = $_GET['deleteProducts'];
    } else {
        $shop_id = $_SESSION['m_id'];
    }

    $sqlQuery = "SELECT * FROM products WHERE product_id = :product_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':product_id' => $product_id));

    while ($rs = $statement->fetch()) {
        $product_id = $rs['product_id'];
    }

    $shop_encode_id = base64_encode("encodeuserid{$_SESSION['m_id']}");
} else if (isset($_POST['deleteProducts'])) {

        $shop_product_id = $_GET['deleteProducts'];

        try {
            $sqlQuery = "SELECT product_id FROM products WHERE product_id = :product_id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array('product_id' => $shop_product_id));


            while ($rs = $statement->fetch()) {
                $product_id = $rs['product_id'];
            }

            $db->exec("DELETE FROM products WHERE product_id = $product_id LIMIT 1");
            $page = "products.php?products={$encode_id}";
            $result = flashMEssage("Delete Successfull", "Pass");
            $_SESSION['successMessage'] = "Product Deleted";
            redirectTo($page);
            

        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occurred" . $ex->getMessage());
        }
}



?>