

<?php

if ((isset($_SESSION['m_id']) || isset($_GET['mid'])) && !isset($_POST['yes'])) {
    if (isset($_GET['mid'])) {
        $url_encoded_id = $_GET['mid'];
        $decode_id = base64_decode($url_encoded_id);
        $shop_id_array = explode("encodeuserid", $decode_id);
        $shop_id = $shop_id_array[1];
    } else {
        $shop_id = $_SESSION['m_id'];
    }

    $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('id' => $shop_id));

    while ($rs = $statement->fetch()) {
        $shop_id = $rs['m_id'];
        $shop_user_id  = $rs['user_id'];
        
    }
    $shop_encode_id = base64_encode("encodeuserid{$shop_id}");
} elseif (isset($_POST['yes'])) {

        $shop_id = $_POST['hidden_id'];

        try {
            //Step 1 -Get User information from database
            $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':id' => $shop_id));

            if ($row = $statement->fetch()) {
                //Step 2 - Deactivate the account
                $activated = $row['admin_activated'];

                $deactivateQuery = $db->prepare("UPDATE merchant SET admin_activated = :activated WHERE m_id = :id");
                $deactivateQuery->execute(array(':activated' => '1', ':id' => $shop_id));

                if ($deactivateQuery->rowCount() === 1) {
                            
                            $result = flashMessage("Your shop has been Published. ", "Pass");
                        }
                    
                } else {
                    $result = flashMessage("Could not complete operation. Please try again or Contact Admin2");
                }
            
        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occurred" . $ex->getMessage());
        }
}


if (isset($_POST['no'])) {


        
    $shop_id = $_POST['hidden_id'];

        try {
            //Step 1 -Get User information from database
            $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':id' => $shop_id));

            if ($row = $statement->fetch()) {
                //Step 2 - Deactivate the account
                $activated = $row['admin_activated'];

                $deactivateQuery = $db->prepare("UPDATE merchant SET admin_activated = :activated WHERE m_id = :id");
                $deactivateQuery->execute(array(':activated' => '0', ':id' => $shop_id));

                if ($deactivateQuery->rowCount() === 1) {
                            
                            $result = flashMessage("Your shop has been taken off the public page.");
                        }
                    
                } else {
                    $result = flashMessage("Could not complete operation. Please try again or Contact Admin2");
                }
            
        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occurred" . $ex->getMessage());
        }
}


?>