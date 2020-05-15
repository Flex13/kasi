<?php


if ((isset($_SESSION['id']) && !isset($_POST['submitOrder']))) {
        $shop_id = $_GET['mid'];
        $ip_add = getRealIpUser();
        $payment_method1 = $_GET['payment'];

        if ($payment_method1 == 'COD') {
            $payment_method2 = 'Cash on delivery';
        }

    $sqlQuery = "SELECT * FROM cart WHERE ip_address = :ip_address AND m_id = :m_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':ip_address' => $ip_add, ':m_id' => $shop_id));


    $ip_add = getRealIpUser();
    $status = "pending";
    $invoice_no = mt_rand();
    $date = current_date();

} else if (isset($_POST['submitOrder'])){
    

    $sqlQuery = "SELECT * FROM cart WHERE ip_address = :ip_address";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':m_id' => $shop_id, ':ip_address' => $ip_add));

    while ($rs = $statement->fetch()) {
        $cart_id = $rs['cart_id'];
        $shop_id = $rs['m_id'];
        $product_id  = $rs['product_id'];
        $quantity  = $rs['quantity'];
        $unit_price  = $rs['unit_price'];
        $total_price  = $rs['total_price'];
        $product_image  = $rs['product_image'];
        $shop_name  = $rs['shop_name'];
        $product_name  = $rs['product_name'];

        $sqlQuery1 = "SELECT * FROM products WHERE product_id = :product_id AND m_id = :m_id";
        $statement1 = $db->prepare($sqlQuery1);
        $statement1->execute(array(':product_id' => $product_id, ':m_id' => $shop_id));


        while ($rs = $statement1->fetch()) {

            $product_price = $rs['product_price'];


            $sub_total = $product_price * $quantity;

            $insert_customer_order = "INSERT INTO customer_orders (user_id,amount_due,invoice_number,quantity,order_date,order_status,payment_method,shop_id) values (:user_id,:amount_due,:invoice_number,:quantity,:order_date,:order_status,:payment_method,:shop_id)";

            $statementInsert = $db->prepare($insert_customer_order);
            $statementInsert->execute(array(':user_id' => $user_id, ':amount_due' => $sub_total, ':invoice_number' => $invoice_no, ':quantity' => $quantity , ':order_date' => $date , ':order_status' => $status, ':payment_method' => $payment_method2,':shop_id' => $shop_id));

            $insert_pending_order = "INSERT INTO pending_orders (user_id,amount_due,invoice_number,quantity,order_date,order_status,payment_method,shop_id) values (:user_id,:amount_due,:invoice_number,:quantity,:order_date,:order_status,:payment_method,:shop_id)";

            $statementInsertPending = $db->prepare($insert_pending_order);
            $statementInsertPending->execute(array(':user_id' => $user_id, ':amount_due' => $sub_total, ':invoice_number' => $invoice_no, ':quantity' => $quantity , ':order_date' => $date , ':order_status' => $status, ':payment_method' => $payment_method2,':shop_id' => $shop_id));

            $delete_cart = "DELETE FROM cart WHERE ip_add=':ip_address' AND product_id = :product_id";
            $statementDeleteCart = $db->prepare($delete_cart);
            $statementDeleteCart->execute(array(':ip_address' => $ip_add, ':product_id' => $product_id));



            $_SESSION["successMessage"] =  "Your Orders have bee submitted";
            echo "<script>window.open('my_orders.php','_self')</script>";

        }

    }
}



