<?php
session_start();
include_once("functions/db.php");
include_once("functions/functions.php"); 
 unset($_SESSION['a_id']);
 unset($_SESSION['a_email']);
 unset($_SESSION['a_username']);
 unset($_SESSION['user_type']);


 session_destroy();
 redirectTo('login/index.php');
?>

