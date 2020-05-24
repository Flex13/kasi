
<?php

if ((isset($_SESSION['a_id']) || isset($_GET['delete'])) && !isset($_POST['yes'])) {
    if (isset($_GET['delete'])) {
        $admin_id = $_GET['delete'];
    } else {
        $id = $_SESSION['a_id'];
    }

    $sqlQuery = "SELECT * FROM admins WHERE id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('id' => $admin_id));

    while ($rs = $statement->fetch()) {
        $admin_id = $rs['id'];
    }

} else if (isset($_POST['yes'])) {

    $admin_id = $_POST['hidden_id'];

    try {
        //Step 1 -Get User information from database
        $sqlQuery = "SELECT * FROM admins WHERE id = :id";
        $statement = $db->prepare($sqlQuery);
        $statement->execute(array(':id' => $admin_id));

        if ($row = $statement->fetch()) {
            //Step 2 - Deactivate the account
            $admin_id = $row['id'];
            

            $deactivateQuery = $db->prepare("UPDATE admins SET activated = :activated WHERE id = :id");
            $deactivateQuery->execute(array(':activated' => 0, ':id' => $admin_id));

            if ($deactivateQuery->rowCount() === 1) {
                //Step 3 - Insert Row into Trash Table
                $InsertRecord = $db->prepare("INSERT INTO trash (admin_id,deleted_at) VALUES (:id, NOW())");
                $InsertRecord->execute(array(':id' => $admin_id));

                if ($InsertRecord->rowCount() === 1) {
                    //Step 4 - Send User an Notification via and display notification

                    $result = flashMessage("Account information will be kept for 14 days. If you wish to continue using Kasi Mall Online, logout from your current session and login the shop Admin Dashboard whithin 
                            the next 14 days to reactivate your account or it will be permanently deleted.", "Pass");
                    $_SESSION["successMessage"] =  "Account information will be kept for 14 days. If you wish to continue using Kasi Mall Online, logout from your current session and login the shop Admin Dashboard whithin 
                            the next 14 days to reactivate your account or it will be permanently deleted.";
                    echo "<script>window.open('admin.php?admin','_self')</script>";
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