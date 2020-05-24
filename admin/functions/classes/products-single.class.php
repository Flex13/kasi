<?php
if ((isset($_GET['p_id']) && !isset($_POST['addtocart']))) {
    if (isset($_GET['p_id'])) {
        $product_id = $_GET['p_id'];
    }

    $sqlQuery = "SELECT * FROM products WHERE product_id = :p_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('p_id' => $product_id));

    while ($rs = $statement->fetch()) {
        $shop_id = $rs['m_id'];
        $product_id = $rs['product_id'];
        $category  = $rs['cat_name'];
        $product_name  = $rs['product_name'];
        $product_price  = $rs['product_price'];
        $product_description  = $rs['product_description'];
        $product_image  = $rs['product1'];
    }
} else if (isset($_POST['addtocart'], $_POST['token'])) {

    if (validate_token($_POST['token'])) {

        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation to be passed to function of check_empty_fields();
        $required_fields = array('Quantity');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        $ip_add = getRealIpUser();
        $product_id = $_GET['p_id'];
        $product_qty = $_POST['Quantity'];
        $date = current_date();


        if (empty($form_errors)) {
            try {

                $sqlCheckCart = "SELECT * FROM cart WHERE ip_address=:ip_address AND product_id=:product_id";
                $statementCheckCart = $db->prepare($sqlCheckCart);
                $statementCheckCart->execute(array(':ip_address' => $ip_add, ':product_id' => $product_id));
                

                if ($statementCheckCart->rowcount() > 0) {
                    $result = flashMEssage("Item in Trolley");
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



                    
                    $total_price = $product_price * $product_qty;

                    $sqlInsertCart = "INSERT INTO cart (m_id,product_id,quantity,unit_price,total_price,cart_date,ip_address,product_image,shop_name,product_name) VALUES (:shop_id,:product_id,:quantity,:unit_price,:total_price,:cart_date,:ip_address,:product_image,:shop_name,:product_name)" ;
                    $statementInsertCart = $db->prepare($sqlInsertCart);
                    $statementInsertCart->execute(array(':shop_id' => $shop_id,':product_id' => $product_id,':quantity' => $product_qty,':unit_price' => $product_price,':total_price' => $total_price,':cart_date' => $date,':ip_address' => $ip_add,':product_image' => $product_image,':shop_name' => $shop_name,':product_name' => $product_name,));

                    if ($statementInsertCart->rowcount() == 1) {
                        $result = flashMEssage("Product added to iTrolley","Pass");
                        echo "<meta http-equiv='refresh' content='0'>";
                    } else {
                        
                    }
                }
            } catch (PDOException $ex) {
                $result = flashMessage("An Error Occerred" . $ex->getMessage());
            }
        } else {
            if (count($form_errors) == 1) {
                $result = flashMessage("There was one error in the form<br>");
            } else {
                $result = flashMessage("There were " . count($form_errors) . " error in the form<br>");;
            }
        }
    } else {
        //Throw and error
        $result = flashMessage("This request originates from an unknown source. Possible attack");
    }
}
