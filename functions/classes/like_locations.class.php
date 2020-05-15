<?php
session_start();
include_once("../../functions/db.php");
include("../../functions/functions.php");


if (!isset($_SESSION['id']) && empty($_SESSION['c_email'])) {
    $_SESSION["errorMessage"] =  "Login to like Amakasi.";
    echo "<script>window.open('../../../login.php','_self')</script>";
} else if (isset($_SESSION['c_email']) && isset($_GET['kasi_id'])) {
    if (isset($_GET['kasi_id'])) {
        $kasi_id = $_GET['kasi_id'];
        $user_id = $_SESSION['id'];

        $sqlQuery = "SELECT * FROM kasi WHERE location_id = :id";
        $statement = $db->prepare($sqlQuery);
        $statement->execute(array(':id' => $kasi_id));

        while ($rs = $statement->fetch()) {
            $id = $rs['location_id'];
            $kasi_province = $rs['province'];
            $kasi_name = $rs['name'];
            $kasi_city = $rs['city'];
            $kasi_image = $rs['image3'];
        }

        $sqlQuerylikekasi = "INSERT INTO saved_kasi (kasi_id,Liked,user_id,kasi_province,kasi_city,kasi_image,kasi_name) VALUES (:kasi_id,:liked,:user_id,:kasi_province,:kasi_city,:kasi_image,:kasi_name)";
        $likeKasi = $db->prepare($sqlQuerylikekasi);
        $likeKasi->execute(array(':kasi_id' => $kasi_id, ':liked' => '1', ':user_id' => $user_id, ':kasi_province' => $kasi_province, ':kasi_city' => $kasi_city, ':kasi_image' => $kasi_image, ':kasi_name' => $kasi_name));


        if ($likeKasi->rowcount() == 1) {
            $_SESSION["successMessage"] =  "Kasi added to saved locations.";
            echo "<script>window.open('../../amakasi.php','_self')</script>";
        }
    } else {
        $user_id = $_SESSION['id'];
    }
}
