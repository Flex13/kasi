<?php

if ((isset($_SESSION['id']) && !empty($_SESSION['id']))) {

    $user_id = $_SESSION['id'];
    $ip_add = getRealIpUser();

    $sqlQuery = "SELECT * FROM wishlist WHERE user_id = :user_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':user_id' => $user_id));

$wishstatment= $db->prepare('SELECT COUNT(*) FROM wishlist WHERE user_id = :user_id');
$wishstatment->execute(array(':user_id'=> $user_id));

$row = $wishstatment->fetch();
$countItems = $row[0];
}