<?php

if ((isset($_SESSION['a_id']) || isset($_GET['edit_product'])) && !isset($_POST['editproduct'])) {
    if (isset($_GET['edit_product'])) {
        $product_id = $_GET['edit_product'];
    } else {
        $id = $_SESSION['a_id'];
    }

    $sqlQuery = "SELECT * FROM products WHERE product_id = :id ";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':id' => $product_id));


    while ($rs = $statement->fetch()) {
        $product_id = $rs['product_id'];
        $shop_id = $rs['m_id'];
        $cat_name = $rs['cat_name'];
        $sub_cat_name = $rs['sub_cat_name'];
        $product_name = $rs['product_name'];
        $product_description = $rs['product_description'];
        $product_price = $rs['product_price'];
        $image = $rs['image'];
        $activated = $rs['activated'];
        $shop_date_joined = strftime("%b %d, %Y", strtotime($rs['reg_date']));
    }
} else if (isset($_POST['editproduct'])) {


// Get all records from inputs
$product_name            = test_input($_POST['Name']);
$category_name     = test_input($_POST['Category']);

$sub_category_name           = test_input($_POST['Sub']);
$product_description            = test_input($_POST['Description']);
$product_price        = test_input($_POST['Price']);
 
$product_id       = $_GET['edit_product']; 

if 
(empty($product_name)) {
    $_SESSION["errorMessage"] = "Product Name required";
}
else if
(strlen($product_name)<1) { 
    $_SESSION["errorMessage"] = "Shop should be more then 1 charactors";
}


else if 
(empty($category_name)) {
    $_SESSION["errorMessage"] = "Category required";
}


else if 
(empty($product_description )) {
    $_SESSION["errorMessage"] = "Prodcut description required";
}else if
(strlen($product_description )<5) { 
    $_SESSION["errorMessage"] = "Shop should be more then 5 charactors";
}
else if 
(empty($product_price)) {
    $_SESSION["errorMessage"] = "Price required";
} else {

    
    
// create sql to insert into database
$update_product = "UPDATE products SET 
product_name=:product_name,
product_description=:product_description,
cat_name=:product_category,
sub_cat_name=:sub_category,
product_price=:product_price
WHERE 
product_id=:product_id";

// use PDO to prepare and sanitize the data
$statement = $db->prepare($update_product);

// Add the data into the database 
$statement->execute(array(
':product_category' => $category_name, 
':sub_category' => $sub_category_name, 
':product_name' => $product_name,
':product_description' => $product_description,
':product_price' => $product_price,
':product_id' => $product_id));

 //Check is one data was created in database the echo result
 if ($statement->rowcount() == 1) {
    $result = flashMessage("Product Updated", "Pass");
} else {
    $result = flashMessage("Failed to Update Product");
}

}
}
?>

