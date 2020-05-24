
<?php
session_start();
include_once("../../functions/db.php");
include("../../functions/functions.php");

if ((isset($_SESSION['id']) || isset($_GET['deletewishlist']))) {
    if (isset($_GET['deletewishlist'])) {
        $product_id = $_GET['deletewishlist'];

        try {
            $sqlQuery = "SELECT product_id FROM wishlist WHERE product_id = :product_id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':product_id' => $product_id));


            while ($rs = $statement->fetch()) {
                $product_id = $rs['product_id'];
            }

            $db->exec("DELETE FROM wishlist WHERE product_id = $product_id LIMIT 1");
            $result = flashMEssage("Delete Successfull", "Pass");
            $_SESSION["successMessage"] =  "Delete Successfull.";
            $page = "../../../wishlist.php";
            redirectTo($page);

        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occurred" . $ex->getMessage());
        }

    } else {
        $user_id = $_SESSION['id'];
    }

}



?>