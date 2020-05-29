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
$sub        = test_input($_POST['Sub']);
$date               = current_date(); 
$id        = $_GET['edit']; 


if 
(empty($name)) {
    $_SESSION["errorMessage"] = "Enter Category Name";
}
else if
(strlen($name)<3) { 
    $_SESSION["errorMessage"] = "Name should be more then 3 charactors";
}  else {


// create sql to insert into database
$update_category = "UPDATE category SET category_name=:name,  sub_category=:sub_name  WHERE cat_id=:id";


// use PDO to prepare and sanitize the data
$statement = $db->prepare($update_category);


 // Add the data into the database 
 $statement->execute(array(':name' => $name, ':sub_name' => $sub, ':id' => $id));

    } 


     //Check is one data was created in database the echo result
     if ($statement->rowcount() == 1) {
        $result = flashMessage("Category Updates", "Pass");
    } else {
        $result = flashMessage("Failed to Update Category");
    }

}



?>
