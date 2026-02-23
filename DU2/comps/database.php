<?php
$dsn = "mysql:host=127.0.0.1;dbname=testdb;charset=utf8mb4";
$username = "testadmin";
$password = "adminadmin";

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Success";
    }
    catch (PDOException $e){
        echo "Unable to connect DB: ". $e->getMessage();
        exit();
    }
?>