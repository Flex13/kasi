<?php


if ((isset($_SESSION['a_id']) || isset($_GET['view'])) && !isset($_POST['activate']) && !isset($_POST['deactivate'])) {

    if (isset($_GET['view'])) {
        $kasi_id = $_GET['view'];
    }

    $sqlQuery = "SELECT * FROM kasi WHERE location_id = :id ";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':id' => $kasi_id));


    while ($rs = $statement->fetch()) {
        $id = $rs['location_id'];
        $name = $rs['name'];
        $alt_name = $rs['alt_name'];
        $province  = $rs['province'];
        $city  = $rs['city'];
        $image  = $rs['image1'];
        $activated = $rs['activated'];
        $reg_date = $rs['reg_date'];
    }
} else if (isset($_POST['activate'])) {

    $kasi_id = $_GET['view'];

    

        $sql = "UPDATE kasi SET activated=:activated WHERE location_id=:id AND activated='0'";

        $statement = $db->prepare($sql);
        $statement->execute(array(':activated' => "1", ':id' => $kasi_id));
        
        if ($statement->rowCount() == 1) {
            echo " 
            <script>
            window.location.replace('amakasi.php?view={$kasi_id}');
            </script>
            ";
        }


    

} else if (isset($_POST['deactivate'])) {

    $kasi_id = $_GET['view'];

    try {

        $sql = "UPDATE kasi SET activated=:activated WHERE location_id=:id AND activated='1'";

        $statement = $db->prepare($sql);
        $statement->execute(array(':activated' => "0", ':id' => $kasi_id));
       
        if ($statement->rowCount() == 1) {
            echo " 
            <script>
            window.location.replace('amakasi.php?view={$kasi_id}');
            </script>
            ";
        }


    } catch (PDOException $ex) {
        $result = flashMessage("An Error Occorrd" . $ex->getMessage());
    }

}

