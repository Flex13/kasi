<?php
session_start();
include_once("../../functions/db.php");
include("../../functions/functions.php");

if ((isset($_SESSION['id']) || isset($_GET['deletecartitem']))) {
    if (isset($_GET['deletecartitem'])) {
        $cart_id = $_GET['deletecartitem'];
        $user_id = $_SESSION['id'];
        $ip_add = getRealIpUser();

        try {
           

            $db->exec("DELETE FROM cart WHERE cart_id = $cart_id AND ip_address = $ip_add LIMIT 1");
            $result = flashMEssage("Delete Successfull", "Pass");
            $_SESSION["successMessage"] =  "Delete Successfull.";
            $page = "../../../cart.php";
            redirectTo($page);

        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occurred" . $ex->getMessage());
        }

    } else {
        $user_id = $_SESSION['id'];
    }

}



?>