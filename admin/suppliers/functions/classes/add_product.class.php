<?php

if ((isset($_SESSION['a_id']) || isset($_GET['add_products'])) && !isset($_POST['addproduct'])) {
    if (isset($_GET['add_products'])) {
        $shop_id = $_GET['add_products'];
    } else {
        $id = $_SESSION['a_id'];
    }

    $sqlQuery = "SELECT * FROM merchant WHERE m_id = :m_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':m_id' => $shop_id));

    while ($rs = $statement->fetch()) {
        $shop_id = $rs['m_id'];
        $shop_user_id  = $rs['user_id'];
    }


} else if (isset($_POST['addproduct'])) {


// Get all records from inputs
$name            = test_input($_POST['Name']);
$category     = test_input($_POST['Category']);

$sub_category           = test_input($_POST['Sub']);
$description            = test_input($_POST['Description']);
$price        = test_input($_POST['Price']);
$date                 = current_date();
$image            = $_FILES["image"]["name"];
$tmp_image         = $_FILES["image"]["tmp_name"];
$size_image        = $_FILES["image"]["size"]; 
$id       = $_GET['add_products']; 

if 
(empty($name)) {
    $_SESSION["errorMessage"] = "Product Name required";
}
else if
(strlen($name)<1) { 
    $_SESSION["errorMessage"] = "Shop should be more then 1 charactors";
}


else if 
(empty($category)) {
    $_SESSION["errorMessage"] = "Category required";
}


else if 
(empty($description)) {
    $_SESSION["errorMessage"] = "Prodcut description required";
}else if
(strlen($description)<5) { 
    $_SESSION["errorMessage"] = "Shop should be more then 5 charactors";
}
else if 
(empty($price)) {
    $_SESSION["errorMessage"] = "Price required";
}

else if 
(empty($image)) {
    $_SESSION["errorMessage"] = "Product image required";

}
else if
($size_image>=5000000) {
    $_SESSION["errorMessage"] = "Please upload image less the 5mb";
} else {
    
    $img_ext=explode(".",$image);
    $image_ext=$img_ext['1'];
    $image=rand(1,000).rand(1,100).time().".".$image_ext;

    if($image_ext=='jpg' || $image_ext=='png' || $image_ext=='PNG' || $image_ext=='JPG'|| !empty($_FILES["image"]["name"])) {

         // create sql to insert into database
         $insert_product = "INSERT INTO products (m_id,cat_name,sub_cat_name,product_name,product_description,product_price,image,reg_date) VALUES (:shop_id,:category_name,:sub_category_name,:product_name,:product_description,:product_price,:image,:reg_date)";

         // use PDO to prepare and sanitize the data
         $statement = $db->prepare($insert_product);

         // Add the data into the database 
         $statement->execute(array(':shop_id' => $id, ':category_name' => $category,':sub_category_name' => $sub_category, ':product_name' => $name, ':product_description' => $description, ':product_price' => $price, ':image' => $image,':reg_date' => $date));
    } else {

        // create sql to insert into database
        $insert_product = "INSERT INTO products (m_id,cat_name,sub_cat_name,product_name,product_description,product_price,reg_date) VALUES (:shop_id,:category_name,:sub_category_name,:product_name,:product_description,:product_price,:reg_date)";

        // use PDO to prepare and sanitize the data
        $statement = $db->prepare($insert_product);

        // Add the data into the database 
        $statement->execute(array(':shop_id' => $id, ':category_name' => $category,':sub_category_name' => $sub_category, ':product_name' => $name, ':product_description' => $description, ':product_price' => $price,':reg_date' => $date));
    }

    move_uploaded_file($tmp_image,"uploads/products/$image");

 //Check is one data was created in database the echo result
 if ($statement->rowcount() == 1) {
    $result = flashMessage("Product Added", "Pass");
} else {
    $result = flashMessage("Failed to add Product");
}

}
}
?>

