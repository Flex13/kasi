<?php
//initialize variables to hold connection parameters
$DBusername = 'root';
$dsn = 'mysql:host=localhost; dbname=kasimall';
$DBpassword = '';

try{
    //create an instance of the PDO class with the required parameters
    $db = new PDO($dsn, $DBusername, $DBpassword);

    //set pdo error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //display success message
    //echo "Connected to the register database";

}catch (PDOException $ex){
    //display error message
    echo "Connection failed ".$ex->getMessage();
}