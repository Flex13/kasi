<?php

if ((isset($_SESSION['m_id']) || isset($_GET['editProducts'])) && !isset($_POST['editProducts'])) {
    if (isset($_GET['editProducts'])) {
        $product_id = $_GET['editProducts'];
    } else {
        $shop_id = $_SESSION['m_id'];
    }

    $sqlQuery = "SELECT * FROM products WHERE product_id = :product_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('product_id' => $product_id));

    while ($rs = $statement->fetch()) {
        $product_id = $rs['product_id'];
        $product_name  = $rs['product_name'];
        $product_description  = $rs['product_description'];
        $product_category  = $rs['cat_name'];
        $product_sub_category  = $rs['sub_cat_name'];
        $product_price = $rs['product_price'];
        $shop_id = $rs['m_id'];
    }

    $sqlQuery1 = "SELECT * FROM category WHERE m_id = :id";
    $stmt = $db->prepare($sqlQuery1);
    $stmt->execute(array('id' => $shop_id));

    $stmt2 = $db->prepare($sqlQuery1);
    $stmt2->execute(array('id' => $shop_id));
} else if (isset($_POST['editProducts'])) {



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
    if (isset($_FILES['image']['name']) ? $product1 = $_FILES['image']['name'] : $product1 =  null);


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
    $shop_product_id         = $_GET['editProducts'];



    if (empty($form_errors)) {
        try {

            // create sql to insert into database
            $update_product = "UPDATE products SET product_name=:product_name,product_description=:product_description,cat_name=:product_category,sub_cat_name=:sub_category,product_price=:product_price WHERE product_id=:product_id";

            // use PDO to prepare and sanitize the data
            $statement = $db->prepare($update_product);

            if ($product1 != null) {

                // create sql to insert into database
                $update_productImages = "UPDATE products SET 
                product_name=:product_name,
                product_description=:product_description,
                cat_name=:product_category,
                sub_cat_name=:sub_category,
                product_price=:product_price,
                product1=:product_image 
                WHERE 
                product_id=:product_id";

                $product_path1 = uploadProduct($product_name, $shop_hidden_id);

                if (!$product_path1) {

                    $product_path1 = "uploads/product1.jpg";
                }

                // use PDO to prepare and sanitize the data
                $statement = $db->prepare($update_productImages);

                // Add the data into the database 
                $statement->execute(array(
                ':product_category' => $product_category_name, 
                ':sub_category' => $product_sub_category, 
                ':product_name' => $product_name,
                ':product_description' => $product_description,
                ':product_price' => $product_price,
                ':product_image' => $product_path1,
                ':product_id' => $shop_product_id));
            }

            // Add the data into the database 
            $statement->execute(array(':product_category' => $product_category_name, ':sub_category' => $product_sub_category, ':product_name' => $product_name, ':product_description' => $product_description, ':product_price' => $product_price, ':product_id' => $shop_product_id));

            //Check is one data was created in database the echo result
            if ($statement->rowcount() == 1) {
                $page = "products.php?products={$encode_id}";
                $result = flashMEssage("Update Successfull", "Pass");
                $_SESSION['successMessage'] = "Product Updated";
                redirectTo($page);
            } else {
                $page = "products.php?products={$encode_id}";
                $_SESSION["errorMessage"] =  "Product Not Updated.Please try again";
                redirectTo($page);
            }
        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occerred" . $ex->getMessage());
            $page = "products.php?products={$encode_id}";
            $_SESSION['successMessage'] = "Product Updated";
            redirectTo($page);
        }
    } else {
        if (count($form_errors) == 1) {
        } else {
        }
    }
}
