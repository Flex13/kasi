<?php


if ((isset($_SESSION['a_id']) || isset($_GET['view'])) && !isset($_POST['activate']) && !isset($_POST['deactivate'])) {

    if (isset($_GET['view'])) {
        $cat_id = $_GET['view'];
    }

    $sqlQuery = "SELECT * FROM category WHERE cat_id = :id ";
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
} else if (isset($_POST['activate'])) {

    $cat_id = $_GET['view'];

    

        $sql = "UPDATE category SET activated=:activated WHERE cat_id=:id AND activated='0'";

        $statement = $db->prepare($sql);
        $statement->execute(array(':activated' => "1", ':id' => $cat_id));
        
        if ($statement->rowCount() == 1) {
            echo " 
            <script>
            window.location.replace('categories.php?view={$cat_id}');
            </script>
            ";
        }


    

} else if (isset($_POST['deactivate'])) {

    $cat_id = $_GET['view'];

    try {

        $sql = "UPDATE category SET activated=:activated WHERE cat_id=:id AND activated='1'";

        $statement = $db->prepare($sql);
        $statement->execute(array(':activated' => "0", ':id' => $cat_id));
       
        if ($statement->rowCount() == 1) {
            echo " 
            <script>
            window.location.replace('categories.php?view={$cat_id}');
            </script>
            ";
        }


    } catch (PDOException $ex) {
        $result = flashMessage("An Error Occorrd" . $ex->getMessage());
    }

}

