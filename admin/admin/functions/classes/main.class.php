<?php

if ((isset($_SESSION['a_id']) || isset($_GET['admin']))) {

    $sqlQuery = "SELECT * FROM admins";
    $statement = $db->prepare($sqlQuery);
    $statement->execute();

    $stmt = $db->prepare('SELECT COUNT(*) FROM admins');
    $stmt->execute();

    $row = $stmt->fetch();
    $count = $row[0];
}
