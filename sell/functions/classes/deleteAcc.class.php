<?php include_once('functions/send-email.php'); ?>
<?php

if ((isset($_SESSION['m_id']) || isset($_GET['mid'])) && !isset($_POST['yes'])) {
    if (isset($_GET['mid'])) {
        $url_encoded_id = $_GET['mid'];
        $decode_id = base64_decode($url_encoded_id);
        $user_id_array = explode("encodeuserid", $decode_id);
        $shop_id = $user_id_array[1];
    } else {
        $shop_id = $_SESSION['m_id'];
    }

    $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('id' => $shop_id));

    while ($rs = $statement->fetch()) {
        $shop_id = $rs['m_id'];
        $shop_email = $rs['m_email'];
        
    }

    $shop_encode_id = base64_encode("encodeuserid{$shop_id}");
} else if (isset($_POST['yes'])) {

        $shop_id = $_POST['hidden_id'];

        try {
            //Step 1 -Get User information from database
            $sqlQuery = "SELECT * FROM merchant WHERE m_id = :id";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':id' => $shop_id));

            if ($row = $statement->fetch()) {
                //Step 2 - Deactivate the account
                $shop_username   = $row['m_username'];
                $shop_owner_name   = $row['m_name'];
                $shop_email      = $row['m_email'];
                $shop_id    = $row['m_id'];
                $shop_name    = $row['m_shop_name'];

                $deactivateQuery = $db->prepare("UPDATE merchant SET activated = :activated WHERE m_id = :id");
                $deactivateQuery->execute(array(':activated' => 0, ':id' => $shop_id));

                if ($deactivateQuery->rowCount() === 1) {
                    //Step 3 - Insert Row into Trash Table
                    $InsertRecord = $db->prepare("INSERT INTO trash (m_id,deleted_at) VALUES (:id, NOW())");
                    $InsertRecord->execute(array(':id' => $shop_id));

                    if ($InsertRecord->rowCount() === 1) {
                        //Step 4 - Send User an Notification via and display notification
                            
                            $result = flashMessage("Your Shop Account information will be kept for 14 days. If you wish to continue using Kasi Mall Online, logout from your current session and login the shop Admin Dashboard whithin 
                            the next 14 days to reactivate your account or it will be permanently deleted.", "Pass");
                            $_SESSION["successMessage"] =  "Your Shop Account information will be kept for 14 days. If you wish to continue using Kasi Mall Online, logout from your current session and login the shop Admin Dashboard whithin 
                            the next 14 days to reactivate your account or it will be permanently deleted.";
                            echo "<script>window.open('m_index.php','_self')</script>";
                        }
                    } else {
                        $result = flashMessage("Could not complete operation. Please try again or Contact Admin1");
                    }
                
            } else {
                $result = flashMessage("Could not complete operation. Please try again or Contact Admin3");
            }
        } catch (PDOException $ex) {
            $result = flashMessage("An Error Occurred" . $ex->getMessage());
        }
}



?>