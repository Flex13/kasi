<?php
if (isset($_POST['registersupplier'])) {

// Get all records from inputs
$m_name               = test_input($_POST['Name']);
$m_surname            = test_input($_POST['Surname']);
$m_email              = test_input($_POST['Email']);
$password             = test_input($_POST['Password']);
$cpassword            = test_input($_POST['Password2']);
$m_username           = test_input($_POST['Username']);

$m_cell               = test_input($_POST['Cell']);
$province             = test_input($_POST['Province']);
$kasi                 = test_input($_POST['Kasi']);
$city                 = test_input($_POST['City']);
$street_address       = test_input($_POST['Address']);
$zip                  = test_input($_POST['Zip']);
$gender               = test_input($_POST['Gender']);
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

if (empty($m_username)) {
    $_SESSION["errorMessage"] = "Username required";
}
else if
(strlen($m_username)<3) { 
    $_SESSION["errorMessage"] = "Name should be more then 3 charactors";
}


else if 
(empty($m_email)) {
    $_SESSION["errorMessage"] = "Email required";
}
else if (checkDuplicateEmail2($m_email,$db)) {
    $_SESSION["errorMessage"] = "Email Already Taken, please try another one";
}
else if 
(empty($password)) {
    $_SESSION["errorMessage"] = "Password required";
}
else if ($password != $cpassword) {
    $_SESSION["errorMessage"] = "Passwords do not match please try again";
}
else if 
(empty($m_name)) {
    $_SESSION["errorMessage"] = "Username required";
}
else if
(strlen($m_name)<3) { 
    $_SESSION["errorMessage"] = "Username should be more then 3 charactors";
}else if 
(checkDuplicateUsername($m_username, $db)) {
    $_SESSION["errorMessage"] = "Username Already Taken, please try another one";
}
else if 
(empty($m_surname)) {
    $_SESSION["errorMessage"] = "Surname required";
}
else if
(strlen($m_surname)<3) { 
    $_SESSION["errorMessage"] = "Surname should be more then 3 charactors";
}
else if 
(empty($m_cell)) {
    $_SESSION["errorMessage"] = "Cell Required";
}
else if
(strlen($m_cell)<9) { 
    $_SESSION["errorMessage"] = "Cell should be more then 10 charactors";
}
else if 
(empty($province)) {
    $_SESSION["errorMessage"] = "Province Required";
}
else if 
(empty($kasi)) {
    $_SESSION["errorMessage"] = "Kasi Required";
}
else if 
(empty($city)) {
    $_SESSION["errorMessage"] = "City Required";
}
else if 
(empty($street_address)) {
    $_SESSION["errorMessage"] = "Address Required";
}
else if 
(empty($zip)) {
    $_SESSION["errorMessage"] = "Zip code Required";
}
else if 
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

} else if 
(empty($image)) {
    $_SESSION["errorMessage"] = "Please Select Image";
}
else if
($size_image>=5000000) {
    $_SESSION["errorMessage"] = "Please upload image less the 5mb";
} else {
    global $db;

    //hash the password input
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $img_ext=explode(".",$image);
    $image_ext=$img_ext['1'];
    $image=rand(1,000).rand(1,100).time().".".$image_ext;

    if($image_ext=='jpg' || $image_ext=='png' || $image_ext=='PNG' || $image_ext=='JPG'|| !empty($_FILES["image"]["name"])) {

// create sql to insert into database
$insert_merchant = "INSERT INTO merchant (m_username,m_email,m_password,m_reg_date,m_firstname,m_surname,m_contact,m_gender,m_province,m_city,m_kasi,m_street_address,m_zip,m_shop_name,m_description,shop_email,shop_cell,shop_province,shop_city,shop_kasi,shop_address,shop_zip,m_image) VALUES (:username,:email,:password,:date,:name,:surname,:contact,:gender,:province,:city,:kasi,:street_address,:zip,:shop_name,:shop_description,:shop_email,:shop_cell,:shop_province,:shop_city,:shop_kasi,:shop_address,:shop_zip,:image)";

// use PDO to prepare and sanitize the data
$statement = $db->prepare($insert_merchant);

   // Add the data into the database 
   $statement->execute(array(':username' => $m_username, ':email' => $m_email, ':password' => $password_hash, ':date' => $date, ':name' => $m_name, ':surname' => $m_surname, ':contact' => $m_cell, ':gender' => $gender, ':province' => $province, ':city' => $city, ':kasi' => $kasi, ':street_address' => $street_address, ':zip' => $zip, ':shop_name' => $shop_name, ':shop_description' => $shop_description, ':shop_email' => $shop_email, ':shop_cell' => $shop_cell, ':shop_province' => $shop_province, ':shop_city' => $shop_city, ':shop_kasi' => $shop_kasi, ':shop_address' => $shop_address, ':shop_zip' => $shop_zip, ':image' => $image));


    } else {
                           // create sql to insert into database
// create sql to insert into database
$insert_merchant = "INSERT INTO merchant (m_username,m_email,m_password,m_reg_date,m_firstname,m_surname,m_contact,m_gender,m_province,m_city,m_kasi,m_street_address,m_zip,m_shop_name,m_description,shop_email,shop_cell,shop_province,shop_city,shop_kasi,shop_address,shop_zip,m_image) VALUES (:username,:email,:password,:date,:name,:surname,:contact,:gender,:province,:city,:kasi,:street_address,:zip,:shop_name,:shop_description,:shop_email,:shop_cell,:shop_province,:shop_city,:shop_kasi,:shop_address,:shop_zip)";

// use PDO to prepare and sanitize the data
$statement = $db->prepare($insert_merchant);

 // Add the data into the database 
 $statement->execute(array(':username' => $m_username, ':email' => $m_email, ':password' => $password_hash, ':date' => $date, ':name' => $m_name, ':surname' => $m_surname, ':contact' => $m_cell, ':gender' => $gender, ':province' => $province, ':city' => $city, ':kasi' => $kasi, ':street_address' => $street_address, ':zip' => $zip, ':shop_name' => $shop_name, ':shop_description' => $shop_description, ':shop_email' => $shop_email, ':shop_cell' => $shop_cell, ':shop_province' => $shop_province, ':shop_city' => $shop_city, ':shop_kasi' => $shop_kasi, ':shop_address' => $shop_address, ':shop_zip' => $shop_zip));

    }

move_uploaded_file($tmp_image,"uploads/suppliers/$image");

 //Check is one data was created in database the echo result
 if ($statement->rowcount() == 1) {
    $result = flashMessage("Supplier Created", "Pass");
} else {
    $result = flashMessage("Failed to Create Supplier");
}

}
}







  

?>
