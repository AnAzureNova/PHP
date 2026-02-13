<?php
    //destroys all logged in data
    session_start();
    $_SESSION["isLoggedIn"] = 0;
    unset($_SESSION["currentuser"]);
    header("Location: index.php");
?>