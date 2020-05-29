<?php

if ((isset($_SESSION['a_id']) || isset($_GET['edit'])) && !isset($_POST['editsupplier'])) {
    if (isset($_GET['edit'])) {
        $shop_id = $_GET['edit'];
    } else {
        $id = $_SESSION['a_id'];
    }

    $sqlQuery = "SELECT * FROM merchant WHERE m_id = :m_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':m_id' => $shop_id));

    while ($rs = $statement->fetch()) {
        $shop_id = $rs['m_id'];
        $shop_name = $rs['m_shop_name'];
        $shop_description = $rs['m_description'];
        $shop_id = $rs['m_id'];
        $shop_email = $rs['shop_email'];
        $shop_cell = $rs['shop_cell'];
        $shop_province = $rs['shop_province'];
        $shop_city = $rs['shop_city'];
        $shop_kasi = $rs['shop_kasi'];
        $shop_address = $rs['shop_address'];
        $shop_zip = $rs['shop_zip'];
        $image = $rs['m_image'];
    }
} else if (isset($_POST['editsupplier'])) {


// Get all records from inputs
$shop_name            = test_input($_POST['Shop_Name']);
$shop_description     = test_input($_POST['About']);

$shop_email           = test_input($_POST['Shop_Email']);
$shop_cell            = test_input($_POST['Shop_Cell']);
$shop_province        = test_input($_POST['Shop_Province']);
$shop_kasi            = test_input($_POST['Shop_Kasi']);
$shop_city            = test_input($_POST['Shop_City']);
$shop_address  = test_input($_POST['Shop_Address']);
$shop_zip             = test_input($_POST['Shop_Zip']);
$date                 = current_date();
$image            = $_FILES["image"]["name"];
$tmp_image         = $_FILES["image"]["tmp_name"];
$size_image        = $_FILES["image"]["size"]; 
$id       = $_GET['edit']; 

if 
(empty($shop_name)) {
    $_SESSION["errorMessage"] = "Shop name Required";
}
else if
(strlen($shop_name)<1) { 
    $_SESSION["errorMessage"] = "Shop should be more then 1 charactors";
}


else if 
(empty($shop_email)) {
    $_SESSION["errorMessage"] = "Enter Province";
}
else if 
(empty($shop_cell)) {
    $_SESSION["errorMessage"] = "Enter Province";
} else if
(strlen($shop_cell)<9) { 
    $_SESSION["errorMessage"] = "Name should be more then 9 charactors";
}

else if 
(empty($shop_province)) {
    $_SESSION["errorMessage"] = "Enter Province";
}else if 
(empty($shop_kasi)) {
    $_SESSION["errorMessage"] = "Enter Province";
}
else if 
(empty($shop_city)) {
    $_SESSION["errorMessage"] = "Enter Province";
}else if 
(empty($shop_address)) {
    $_SESSION["errorMessage"] = "Enter Province";
}
else if 
(empty($shop_zip)) {
    $_SESSION["errorMessage"] = "Enter Province";

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
        $update_supplier = "UPDATE merchant SET 
        m_shop_name=:m_shopname,m_description=:m_description,shop_email=:shop_email,shop_cell=:shop_cell,
        shop_province=:shop_province,shop_city=:shop_city,shop_kasi=:shop_kasi,shop_address=:shop_address,shop_zip=:shop_zip,
         m_image=:image WHERE m_id =:id ";

         // use PDO to prepare and sanitize the data
         $statement = $db->prepare($update_supplier);

         // Add the data into the database 
         $statement->execute(array(':m_shopname' => $shop_name, ':m_description' => $shop_description, ':shop_email' => $shop_email, ':shop_cell' => $shop_cell, ':shop_province' => $shop_province, ':shop_city' => $shop_city, ':shop_kasi' => $shop_kasi, ':shop_address' => $shop_address, ':shop_zip' => $shop_zip, ':image' => $image ,':id' => $id));
    } else {

        // create sql to insert into database
        $update_supplier = "UPDATE merchant SET 
        m_shop_name=:m_shopname,m_description=:m_description,shop_email=:shop_email,shop_cell=:shop_cell,
        shop_province=:shop_province,shop_city=:shop_city,shop_kasi=:shop_kasi,shop_address=:shop_address,shop_zip=:shop_zip WHERE m_id =:id ";

         // use PDO to prepare and sanitize the data
         $statement = $db->prepare($update_supplier);

         // Add the data into the database 
         $statement->execute(array( ':m_shopname' => $shop_name, ':m_description' => $shop_description, ':shop_email' => $shop_email, ':shop_cell' => $shop_cell, ':shop_province' => $shop_province, ':shop_city' => $shop_city, ':shop_kasi' => $shop_kasi, ':shop_address' => $shop_address, ':shop_zip' => $shop_zip, ':id' => $id));
    }

    move_uploaded_file($tmp_image,"uploads/suppliers/$image");

 //Check is one data was created in database the echo result
 if ($statement->rowcount() == 1) {
    $result = flashMessage("Supplier Updated", "Pass");
} else {
    $result = flashMessage("Failed to Update Supplier");
}

}
}
?>

