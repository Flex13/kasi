
<?php
session_start();
include_once("../../functions/db.php");
include("../../functions/functions.php");

if ((isset($_SESSION['id']) || isset($_GET['deletekasi']))) {
    if (isset($_GET['deletekasi'])) {
        $kasi_id = $_GET['deletekasi'];
        $user_id = $_SESSION['id'];

        try {
            $sqlQuery = "SELECT * FROM saved_kasi WHERE kasi_id = :kasi_id AND user_id = :user_id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':kasi_id' => $kasi_id,':user_id' => $user_id));

            while ($rs = $statement->fetch()) {
                $kasi_id = $rs['kasi_id'];
                $user_id = $rs['user_id'];
            }

            $db->exec("DELETE FROM saved_kasi WHERE kasi_id = $kasi_id && user_id = $user_id LIMIT 1");
            $result = flashMEssage("Delete Successfull", "Pass");
            $_SESSION["successMessage"] =  "Delete Successfull.";
            $page = "../../../saved_locations.php";
            redirectTo($page);

        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occurred" . $ex->getMessage());
        }

    } else {
        $user_id = $_SESSION['id'];
    }

}



?>