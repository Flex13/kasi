<?php

if ((isset($_SESSION['a_id']) || isset($_GET['edit'])) && !isset($_POST['editkasi'])) {
    if (isset($_GET['edit'])) {
        $kasi_id = $_GET['edit'];
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
} else if (isset($_POST['editkasi'])) {

// Get all records from inputs
$name           = test_input($_POST['Name']);
$alt_name        = test_input($_POST['Alternative']);
$city          = test_input($_POST['City']);
$province        = test_input($_POST['Province']);
$date               = current_date();
$image            = $_FILES["image"]["name"];
$tmp_image         = $_FILES["image"]["tmp_name"];
$size_image        = $_FILES["image"]["size"]; 
$id        = $_GET['edit']; 


if 
(empty($name)) {
    $_SESSION["errorMessage"] = "Enter Kasi name";
}
else if 
(empty($city)) {
    $_SESSION["errorMessage"] = "Enter City";
}
else if 
(empty($province )) {
    $_SESSION["errorMessage"] = "Enter Province";
} else if
(strlen($name)<3) { 
    $_SESSION["errorMessage"] = "Name should be more then 3 charactors";
}
elseif 
(strlen($city)<3) { 
    $_SESSION["errorMessage"] = "City should be more then 3 charactors";
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
$update_kasi = "UPDATE kasi SET name=:name,  province=:province, city=:city, alt_name=:alt_name, reg_date=:date, image1=:image  WHERE location_id=:id";


// use PDO to prepare and sanitize the data
$statement = $db->prepare($update_kasi);

// Add the data into the database 
$statement->execute(array(':name' => $name, ':province' => $province, ':city' => $city, ':alt_name' => $alt_name, ':date' => $date, ':image' => $image ,':id' => $id));

    } else {
                           // create sql to insert into database
// create sql to insert into database
$update_kasi = "UPDATE kasi SET name=:name,  province=:province, city=:city, alt_name=:alt_name, reg_date=:date  WHERE location_id=:id";

// use PDO to prepare and sanitize the data
$statement = $db->prepare($update_kasi);

// Add the data into the database 
$statement->execute(array(':name' => $name, ':province' => $province, ':city' => $city, ':alt_name' => $alt_name, ':date' => $date,':id' => $id));

    }

move_uploaded_file($tmp_image,"uploads/amakasi/$image");

 //Check is one data was created in database the echo result
 if ($statement->rowcount() == 1) {
    $result = flashMessage("Kasi Updated", "Pass");
} else {
    $result = flashMessage("Failed to Create Kasi");
}

}
}


?>
