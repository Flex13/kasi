<?php

if ((isset($_SESSION['a_id']) || isset($_GET['categories']))) {

    $sqlQuery = "SELECT * FROM category";
    $statement = $db->prepare($sqlQuery);
    $statement->execute();

    $stmt = $db->prepare('SELECT COUNT(*) FROM kasi');
    $stmt->execute();
   
    $row = $stmt->fetch();
    $count = $row[0];
} 