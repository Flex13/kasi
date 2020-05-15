
<?php

if ((isset($_SESSION['m_id']) || isset($_GET['deleteCategory'])) && !isset($_POST['deleteCategory'])) {
    if (isset($_GET['deleteCategory'])) {
        $cat_id = $_GET['deleteCategory'];
    } else {
        $shop_id = $_SESSION['m_id'];
    }

    $sqlQuery = "SELECT * FROM category WHERE cat_id = :cat_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('cat_id' => $cat_id));

    while ($rs = $statement->fetch()) {
        $cat_id = $rs['cat_id'];
        $shop_category_name  = $rs['category_name'];
        $shop_sub_category  = $rs['sub_category'];
    }

    $shop_encode_id = base64_encode("encodeuserid{$_SESSION['m_id']}");
} else if (isset($_POST['deleteCategory'])) {

        $shop_cat_id = $_GET['deleteCategory'];

        try {
            $sqlQuery = "SELECT cat_id FROM category WHERE cat_id = :cat_id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array('cat_id' => $shop_cat_id));


            while ($rs = $statement->fetch()) {
                $cat_id = $rs['cat_id'];
            }

            $db->exec("DELETE FROM category WHERE cat_id = $cat_id LIMIT 1");
            $result = flashMEssage("Delete Successfull", "Pass");

        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occurred" . $ex->getMessage());
        }
    
}



?>