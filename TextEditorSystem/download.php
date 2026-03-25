<?php
    session_start();
    include "comps/database.php";

    if(!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] !== 1){
        header("Location: index.php");
        exit();
    }

    if(isset($_GET["file"])){
        $file = getFile($_GET["file"]);
        if($file){
            $filename = $file["file_name"].".".$file["extension"];
            header("Content-Type: text/plain");
            header("Content-Disposition: attachment; filename=\"".$filename."\"");
            header("Content-Length: ".strlen($file["file_contents"]));
            echo $file["file_contents"];
            exit();
        }
    }
    // fallback
    header("Location: index.php?page=editor");
    exit();
?>