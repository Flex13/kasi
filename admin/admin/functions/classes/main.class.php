<?php


if ((isset($_SESSION['a_id']) || isset($_GET['admin'])) && !isset($_POST['activate']) && !isset($_POST['deactivate'])) {

    

    $sqlQuery = "SELECT * FROM admins";
    $statement = $db->prepare($sqlQuery);
    $statement->execute();


} else if (isset($_POST['activate'])) {

    $admin_id = $_POST['hidden_id'];

    

        $sql = "UPDATE admins SET activated=:activated WHERE id=:id AND activated='0'";

        $statement = $db->prepare($sql);
        $statement->execute(array(':activated' => "1", ':id' => $admin_id));
        
        if ($statement->rowCount() == 1) {
            echo " 
            <script>
            window.location.replace('admin.php?admin');
            </script>
            ";
        }


    

} else if (isset($_POST['deactivate'])) {

    $admin_id = $_POST['hidden_id'];

    try {

        $sql = "UPDATE admins SET activated=:activated WHERE id=:id AND activated='1'";

        $statement = $db->prepare($sql);
        $statement->execute(array(':activated' => "0", ':id' => $admin_id));
       
        if ($statement->rowCount() == 1) {
            echo " 
            <script>
            window.location.replace('admin.php?admin');
            </script>
            ";
        }


    } catch (PDOException $ex) {
        $result = flashMessage("An Error Occorrd" . $ex->getMessage());
    }

}

