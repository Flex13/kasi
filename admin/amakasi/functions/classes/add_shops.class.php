<?php

if ((isset($_SESSION['a_id']) || isset($_GET['add_shops'])) && !isset($_POST['addshop'])) {
    if (isset($_GET['add_shops'])) {
        $kasi_id = $_GET['add_shops'];
    } else {
        $id = $_SESSION['a_id'];
    }

    $sqlQuery = "SELECT * FROM kasi WHERE location_id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':id' => $kasi_id));

    while ($rs = $statement->fetch()) {
        $id = $rs['location_id'];
        $name = $rs['name'];
        $alt_name = $rs['alt_name'];
        $province  = $rs['province'];
        $city  = $rs['city'];
        $image  = $rs['image1'];
        $activated = $rs['activated'];
        $reg_date = $rs['reg_date'];
    }

    $sqlQuery1 = "SELECT * FROM merchant WHERE shop_kasi = :kasi";
    $statement1 = $db->prepare($sqlQuery1);
    $statement1->execute(array(':kasi' => $name));

} else if (isset($_POST['addshop'])) {

    $image            = $_FILES["image"]["name"];
    $tmp_image         = $_FILES["image"]["tmp_name"];
    $size_image        = $_FILES["image"]["size"]; 

    $image2            = $_FILES["image2"]["name"];
    $tmp_image2         = $_FILES["image2"]["tmp_name"];
    $size_image2       = $_FILES["image2"]["size"]; 

    $image3            = $_FILES["image3"]["name"];
    $tmp_image3         = $_FILES["image3"]["tmp_name"];
    $size_image3        = $_FILES["image3"]["size"]; 

    $image4            = $_FILES["image4"]["name"];
    $tmp_image4         = $_FILES["image4"]["tmp_name"];
    $size_image4        = $_FILES["image4"]["size"]; 

    $image5            = $_FILES["image5"]["name"];
    $tmp_image5         = $_FILES["image5"]["tmp_name"];
    $size_image5        = $_FILES["image5"]["size"]; 

    $image6            = $_FILES["image6"]["name"];
    $tmp_image6         = $_FILES["image6"]["tmp_name"];
    $size_image6        = $_FILES["image6"]["size"]; 

    $image7            = $_FILES["image7"]["name"];
    $tmp_image7         = $_FILES["image7"]["tmp_name"];
    $size_image7        = $_FILES["image7"]["size"]; 


    $kasi_id        = $_GET['add_shops'];
    $shop_name        = $_GET['hidden_name'];

    if
    ($size_image>=5000000) {
        $_SESSION["errorMessage"] = "Please upload image less the 5mb";
    } else {

    global $db;

    $img_ext=explode(".",$image);
    $image_ext=$img_ext['1'];
    $image=rand(1,000).rand(1,100).time().".".$image_ext;


    if($image_ext=='jpg' || $image_ext=='png' || $image_ext=='PNG' || $image_ext=='JPG'|| !empty($_FILES["image"]["name"])) {

        // create sql to insert into database
$update_kasi = "UPDATE kasi SET name=:name,  province=:province, city=:city, alt_name=:alt_name, reg_date=:date, image1=:image  WHERE location_id=:id";


// use PDO to prepare and sanitize the data
$statement = $db->prepare($update_kasi);

// Add the data into the database 
$statement->execute(array(':name' => $name, ':province' => $province, ':city' => $city, ':alt_name' => $alt_name, ':date' => $date, ':image' => $image ,':id' => $id));

    }
    }




}