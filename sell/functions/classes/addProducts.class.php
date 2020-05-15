<?php

if ((isset($_SESSION['m_id']) || isset($_GET['addProducts'])) && !isset($_POST['addProducts'])) {
    if (isset($_GET['addProducts'])) {
        $url_encoded_id = $_GET['addProducts'];
        $decode_id = base64_decode($url_encoded_id);
        $shop_id_array = explode("encodeuserid", $decode_id);
        $shop_id = $shop_id_array[1];
    } else {
        $shop_id = $_SESSION['m_id'];
    }

    $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('id' => $shop_id));

    while ($rs = $statement->fetch()) {
        $shop_id = $rs['m_id'];
        $shop_user_id  = $rs['user_id'];
    }

    $sqlQuery1 = "SELECT * FROM category WHERE m_id = :id";
    $stmt = $db->prepare($sqlQuery1);
    $stmt->execute(array('id' => $shop_id));

    $stmt2 = $db->prepare($sqlQuery1);
    $stmt2->execute(array('id' => $shop_id));

    $shop_encode_id = base64_encode("encodeuserid{$shop_id}");
} else if (isset($_POST['addProducts'])) {



        //initialize an array to store any error message from the form
        $form_errors = array();

        //Form validation to be passed to function of check_empty_fields();
        $required_fields = array('Name', 'Category', 'Sub', 'Description', 'Price');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //Fields that requires checking for minimum length
        $fields_to_check_length = array('Name' => 3, 'Price' => 2);

        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        //validate if file has valid image extention
       if( isset($_FILES['image']['name']) ? $product1 = $_FILES['image']['name'] : $product1 =  null); 
        

        if ($product1  != null) {
            $form_errors = array_merge($form_errors, isValidImage($product1));
        }


        // Get all records from inputs
        $product_name         = $_POST['Name'];
        $product_category_name         = $_POST['Category'];
        $product_sub_category         = $_POST['Sub'];
        $product_description        = $_POST['Description'];
        $product_price         = $_POST['Price'];
        $shop_hidden_id         = $_POST['hidden_id'];

        if (empty($form_errors)) {
            try {

                $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id";
                $statement = $db->prepare($sqlQuery);
                $statement->execute(array('id' => $shop_hidden_id));

                while ($rs = $statement->fetch()) {
                    $shop_id = $rs['m_id'];
                    $shop_user_id  = $rs['user_id'];
                }

                // create sql to insert into database
                $insert_product = "INSERT INTO products (m_id,m_user_id,cat_name,sub_cat_name,product_name,product_description,product_price) VALUES (:shop_id,:shop_user_id,:category_name,:sub_category_name,:product_name,:product_description,:product_price)";

                     // use PDO to prepare and sanitize the data
                     $statement = $db->prepare($insert_product);


                if ($product1 != null) {

                    // create sql to insert into database
                $insert_productImages = "INSERT INTO products (m_id,m_user_id,cat_name,sub_cat_name,product_name,product_description,product_price,product1) VALUES (:shop_id,:shop_user_id,:category_name,:sub_category_name,:product_name,:product_description,:product_price,:product1)";

                $product_path1 = uploadProduct($product_name,$shop_hidden_id);

                if (!$product_path1 ) {

                    $product_path1 = "uploads/product1.jpg";
                }

                // use PDO to prepare and sanitize the data
                $statement = $db->prepare($insert_productImages);

                // Add the data into the database 
                $statement->execute(array(':shop_id' => $shop_id, ':shop_user_id' => $shop_user_id, ':category_name' => $product_category_name,':sub_category_name' => $product_sub_category, ':product_name' => $product_name, ':product_description' => $product_description, ':product_price' => $product_price, ':product1' => $product_path1));


                
                } else {
                

                // Add the data into the database 
                $statement->execute(array(':shop_id' => $shop_id, ':shop_user_id' => $shop_user_id, ':category_name' => $product_category_name,':sub_category_name' => $product_sub_category, ':product_name' => $product_name, ':product_description' => $product_description, ':product_price' => $product_price));
                }
                

                //Check is one data was created in database the echo result
                if ($statement->rowcount() == 1) {
                    $page = "products.php?products={$encode_id}";
                    $result = flashMessage("Product Added", "Pass");
                    $_SESSION["successMessage"] =  "Product Added to Shop";
                    redirectTo($page);
                } else {
                    $page = "products.php?products={$encode_id}";
                    $_SESSION["errorMessage"] =  "Product Not Added to Shop. Please try again.";
                    redirectTo($page);
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
