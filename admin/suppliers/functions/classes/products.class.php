<?php

if ((isset($_SESSION['a_id']) || isset($_GET['v_products']))  && !isset($_POST['delete'])) {

    if (isset($_GET['v_products'])) {
        $shop_id = $_GET['v_products'];
    }

    $sqlQuery = "SELECT * FROM products WHERE m_id = :id ";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':id' => $shop_id));

} else if (isset($_POST['delete'])) {

        $product_id = $_POST['hidden_id'];
        $shop_id = $_GET['v_products'];

        try {

            $query = "DELETE FROM products WHERE product_id=:id";
            $statement = $db->prepare($query);
            $statement->execute(array(':id' => $product_id));
    
            if ($statement->rowCount() == 1) {
                echo " 
            <script>
            window.location.replace('supplier.php?v_products={$shop_id}');
            </script>
            ";
            }

        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occorrd" . $ex->getMessage());
        }

        

    } 
