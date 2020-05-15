
<?php
include("functions/main.php");
 unset($_SESSION['id']);
 unset($_SESSION['c_email']);


 if (isset($_COOKIE['rememberUserCookie'])) {
     unset($_COOKIE['rememberUserCookie']);
     setcookie('rememberUserCookie', null, -1, '1');
 }

 session_destroy();
 redirectTo('index.php');
?>

