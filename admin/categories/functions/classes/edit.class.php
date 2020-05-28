<?php

if ((isset($_SESSION['a_id']) || isset($_GET['edit'])) && !isset($_POST['editcategory'])) {
    if (isset($_GET['edit'])) {
        $cat_id = $_GET['edit'];
    } else {
        $id = $_SESSION['a_id'];
    }

    $sqlQuery = "SELECT * FROM category WHERE cat_id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':id' => $cat_id));

    while ($rs = $statement->fetch()) {
        $id = $rs['cat_id'];
        $m_id = $rs['m_id'];
        $name = $rs['category_name'];
        $sub = $rs['sub_category'];
        $image = $rs['image'];
        $added_by = $rs['added_by'];
        $activated = $rs['activated'];
        $reg_date = $rs['reg_date'];
    }
} else if (isset($_POST['editcategory'])) {

// Get all records from inputs
$name           = test_input($_POST['Name']);
$sub_name        = test_input($_POST['Sub']);
$date               = current_date();
$image            = $_FILES["image"]["name"];
$tmp_image         = $_FILES["image"]["tmp_name"];
$size_image        = $_FILES["image"]["size"]; 
$id        = $_GET['edit']; 


if 
(empty($name)) {
    $_SESSION["errorMessage"] = "Enter Category Name";
}
else if
(strlen($name)<3) { 
    $_SESSION["errorMessage"] = "Name should be more then 3 charactors";
} 
else if
($size_image>=5000000) {
    $_SESSION["errorMessage"] = "Please upload image less the 5mb";
} else {
    global $db;

    $img_ext=explode(".",$image);
    $image_ext=$img_ext['1'];
    $image=rand(1,000).rand(1,100).time().".".$image_ext;

    if($image_ext=='jpg' || $image_ext=='png' || $image_ext=='PNG' || $image_ext=='JPG'|| !empty($_FILES["image"]["name"])) {

// create sql to insert into database
$update_category = "UPDATE category SET category_name=:name,  sub_category=:sub_name, image=:image  WHERE cat_id=:id";


// use PDO to prepare and sanitize the data
$statement = $db->prepare($update_category);


 // Add the data into the database 
 $statement->execute(array(':name' => $name, ':sub_name' => $sub_name, ':image' => $image, ':id' => $id));

    } else {
                           // create sql to insert into database
// create sql to insert into database
// create sql to insert into database
$update_category = "UPDATE category SET category_name=:name,  sub_category=:sub_name  WHERE cat_id=:id";


// use PDO to prepare and sanitize the data
$statement = $db->prepare($update_category);


 // Add the data into the database 
 $statement->execute(array(':name' => $name, ':sub_name' => $sub_name, ':id' => $id));

    }

    move_uploaded_file($tmp_image,"uploads/categories/$image");

     //Check is one data was created in database the echo result
     if ($statement->rowcount() == 1) {
        $result = flashMessage("Category Updates", "Pass");
    } else {
        $result = flashMessage("Failed to Update Category");
    }

}
}


?>
