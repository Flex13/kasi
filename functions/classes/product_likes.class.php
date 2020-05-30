
        <?php
if (isset($_POST['like'])) {

   if ((isset($_SESSION['id']) && !empty($_SESSION['id']))) {

        $product_id = $_POST['hidden_id'];
        $customer_id = $_SESSION['id'];
        
        $sqlQuery = "SELECT * FROM products WHERE product_id = :id";
        $statement = $db->prepare($sqlQuery);
        $statement->execute(array(':id' => $product_id));

        while ($rs = $statement->fetch()) {
            $likes= $rs['likes'];
        }

        $sqlQuery1 = "INSERT INTO saved_products (customer_id, product_id,liked) VALUES (:customer_id, :product_id,:liked)";
        $statement1 = $db->prepare($sqlQuery1);
        $statement1->execute(array(':customer_id' => $customer_id,':product_id' => $product_id, ':liked' => '1'));


		$sqlQuery2 = "UPDATE products SET likes=:likes WHERE product_id=:product_id";
        $statement2 = $db->prepare($sqlQuery2);
        $statement2->execute(array(':product_id' => $product_id, ':likes' => $likes+1));


        //Check is one data was created in database the echo result
        if ($statement2->rowcount() == 1) {
            echo " 
            <script>
            window.location.replace('index.php');
            </script>
            ";
        }

        
    } else {
         
            $_SESSION["errorMessage"] =  "Please login or sign up.";
            echo "<script>window.open('login.php','_self')</script>";

    } 
	}
	if (isset($_POST['unlike'])) {

        if ((isset($_SESSION['id']) && !empty($_SESSION['id']))) {

            $product_id = $_POST['hidden_id'];
            $customer_id = $_SESSION['id'];
            
            $sqlQuery = "SELECT * FROM products WHERE product_id = :id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':id' => $product_id));
    
            while ($rs = $statement->fetch()) {
                $likes= $rs['likes'];
            }
    
            $sqlQuery1 = "DELETE FROM saved_products WHERE customer_id=:customer_id";
            $statement1 = $db->prepare($sqlQuery1);
            $statement1->execute(array(':customer_id' => $customer_id));
    
    
            $sqlQuery2 = "UPDATE products SET likes=:likes WHERE product_id=:product_id";
            $statement2 = $db->prepare($sqlQuery2);
            $statement2->execute(array(':product_id' => $product_id, ':likes' => $likes-1));

         //Check is one data was created in database the echo result
         if ($statement2->rowcount() == 1) {
            echo " 
            <script>
            window.location.replace('index.php');
            </script>
            ";
        }
        
    } else {
         
        $_SESSION["errorMessage"] =  "Please login or sign up.";
        echo "<script>window.open('login.php','_self')</script>";

}
    }
    ?>
   