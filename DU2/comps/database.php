<?php
    $dsn="mysql:host=localhost;dbname=sqldatabase;charset=utf8";
    $username = "azure";
    $password = "An4kOnd4_An4kOnd4";

    try{
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Success";
    }
    catch (PDOException $e){
        echo "Unable to connect DB: ". $e->getMessage();
        exit();
    }
?>