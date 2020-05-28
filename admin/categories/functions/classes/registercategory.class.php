<?php
if (isset($_POST['registercategory'])) {

// Get all records from inputs
    $name           = test_input($_POST['Name']);
    $sub_name        = test_input($_POST['Sub']);
    $date               = current_date();
    $image            = $_FILES["image"]["name"];
    $tmp_image         = $_FILES["image"]["tmp_name"];
    $size_image        = $_FILES["image"]["size"]; 


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
$insert_category = "INSERT INTO category (category_name, sub_category, image, added_by, reg_date)
VALUES (:name,:sub_name,:image,:added_by,:date)";

// use PDO to prepare and sanitize the data
$statement = $db->prepare($insert_category);

 // Add the data into the database 
 $statement->execute(array(':name' => $name, ':sub_name' => $sub_name, ':image' => $image, ':added_by' => "admin", ':date' => $date));

        } else {
                               // create sql to insert into database
$insert_category = "INSERT INTO category (category_name, sub_category, added_by, reg_date)
VALUES (:name,:sub_name,:added_by,:date)";

    // use PDO to prepare and sanitize the data
    $statement = $db->prepare($insert_category);

   // Add the data into the database 
 $statement->execute(array(':name' => $name, ':sub_name' => $sub_name, ':added_by' => "admin", ':date' => $date));

        }

    move_uploaded_file($tmp_image,"uploads/categories/$image");

     //Check is one data was created in database the echo result
     if ($statement->rowcount() == 1) {
        $result = flashMessage("Category Created", "Pass");
    } else {
        $result = flashMessage("Failed to Create Category");
    }

}
}


?>
