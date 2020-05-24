


if (isset($_POST['updateCart'], $_POST['token'])) {

if (validate_token($_POST['token'])) {

    //initialize an array to store any error message from the form
    $form_errors = array();

    $ip_add = getRealIpUser();
    $product_id = $_POST['remove'];



    if (empty($form_errors)) {
        try {

            foreach ($_POST['remove'] as $remove_id) {
            $sqlCheckCart2 = "SELECT * FROM cart WHERE ip_address=:ip_address AND product_id=:product_id";
            $statementDeleteCart2 = $db->prepare($sqlCheckCart2);
            $statementDeleteCart2->execute(array(':ip_address' => $ip_add, ':product_id' => $remove_id));

            while ($rs = $statementDeleteCart2->fetch()) {
                $cart_id = $rs['cart_id'];
                $shop_id = $rs['m_id'];
                $product_id  = $rs['product_id'];
                $quantity  = $rs['quantity'];
                $unit_price  = $rs['unit_price'];
                $total_price  = $rs['total_price'];
                $date = current_date();
                $product_image  = $rs['product_image'];
                $shop_name  = $rs['shop_name'];
                $product_name  = $rs['product_name'];
            }
        
        
            $sqlInsertTrashCart = "INSERT INTO Trash_cart (cart_id,m_id,product_id,quantity,unit_price,total_price,cart_date,ip_address,product_image,shop_name,product_name) VALUES (:cart_id,:shop_id,:product_id,:quantity,:unit_price,:total_price,:cart_date,:ip_address,:product_image,:shop_name,:product_name)" ;
            $statementTrashCart = $db->prepare($sqlInsertTrashCart);
            $statementTrashCart->execute(array(':cart_id' => $cart_id,':shop_id' => $shop_id,':product_id' => $product_id,':quantity' => $quantity,':unit_price' => $unit_price,':total_price' => $total_price,':cart_date' => $date,':ip_address' => $ip_add,':product_image' => $product_image,':shop_name' => $shop_name,':product_name' => $product_name,));
        

                $sqlQueryDeleteCartItem = "DELETE FROM cart WHERE ip_address=:ip_address AND product_id=:product_id";
                $statementDeleteCart = $db->prepare($sqlQueryDeleteCartItem);
                $statementDeleteCart->execute(array(':ip_address' => $ip_add, ':product_id' => $remove_id));

                if ($statementDeleteCart->rowcount() > 0) {
                    $result = flashMEssage("Items Deleted in iTrolley", "Pass");
                    echo "<meta http-equiv='refresh' content='0'>";
                } else {
                    $result = flashMEssage("Something Went Wrong Please try Again");
                    echo "<meta http-equiv='refresh' content='0'>";
                }
            }
        } catch (PDOException $ex) {
            $result = flashMessage("An Error Ocerred" . $ex->getMessage());
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
