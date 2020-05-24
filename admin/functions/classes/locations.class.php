<?php

if (!isset($_POST['likeKasi'])) {

    $sqlQueryKasi = "SELECT * FROM kasi";
    $fetchKasi = $db->prepare($sqlQueryKasi);
    $fetchKasi->execute();

} else if (isset($_POST['likeKasi'])) {

    $sqlQueryKasi = "SELECT * FROM kasi";
    $fetchKasi = $db->prepare($sqlQueryKasi);
    $fetchKasi->execute();

    $kasi_id = $_POST['hidden_kasi_id'];
    $user_id = $_SESSION['id'];
    $ip_add = getRealIpUser();
    $date = current_date();


    $sqlQuery1 = "SELECT * FROM kasi WHERE location_id = :location_id";
    $statement1 = $db->prepare($sqlQuery1);
    $statement1->execute(array(':location_id' => $kasi_id));


    while ($rs = $statement1->fetch()) {
        $location_id = $rs['location_id'];
        $location_province = $rs['province'];
        $location_name  = $rs['name'];
        $image  = $rs['image3'];
        $location_city  = $rs['city'];
    }

    try {

        $sqlkasicheck = "SELECT * FROM saved_kasi WHERE ip_address=:ip_address AND kasi_id=:kasi_id";
        $statementkasilist = $db->prepare($sqlkasicheck);
        $statementkasilist->execute(array(':ip_address' => $ip_add, ':kasi_id' => $location_id));


        if ($statementkasilist->rowcount() > 0) {
            $result = flashMEssage("Kasi already Saved");
            
        } else {

            $sqlQuery2 = "SELECT * FROM kasi WHERE location_id = :location_id";
            $statement2 = $db->prepare($sqlQuery2);
            $statement2->execute(array(':location_id' => $kasi_id));

            while ($rs = $statement2->fetch()) {
                $location_id = $rs['location_id'];
                $location_province = $rs['province'];
                $location_name  = $rs['name'];
                $image  = $rs['image3'];
                $location_city  = $rs['kasi_city'];
            }



            $user_id = $_SESSION['id'];
            $date = current_date();

            $sqlQuerylikekasi = "INSERT INTO saved_kasi (kasi_id,liked,user_id,kasi_province,kasi_city,kasi_image,kasi_name,ip_address,date) VALUES (:kasi_id,:liked,:user_id,:kasi_province,:kasi_city,:kasi_image,:kasi_name,:ip_address,:date)";
            $likekasi = $db->prepare($sqlQuerylikekasi);
            $likekasi->execute(array(':kasi_id' => $kasi_id, ':liked' => '1', ':user_id' => $user_id, ':kasi_province' => $location_province, ':kasi_city' => $location_city, ':kasi_image' =>  $image, ':date' => $date, ':kasi_name' => $location_name, ':ip_address' => $ip_add));



            if ($likekasi->rowcount() == 1) {
                $result = flashMEssage("Kasi added to saved list", "Pass");
                
            } else {
                $result = flashMEssage("Something went wrong. Please try again");
                
            }
        }
    } catch (PDOException $ex) {
        $result = flashMessage("An Error Occerred" . $ex->getMessage());
    }
}
