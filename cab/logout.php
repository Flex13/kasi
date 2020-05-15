
<?php
include("functions/main.php");
 unset($_SESSION['cab_id']);
 unset($_SESSION['cab_email']);


 if (isset($_COOKIE['rememberUserCookie'])) {
     unset($_COOKIE['rememberUserCookie']);
     setcookie('rememberUserCookie', null, -1, '1');
 }

 session_destroy();
 redirectTo('index.php');
?>

