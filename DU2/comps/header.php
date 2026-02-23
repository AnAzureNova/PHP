<?php
    session_start();

    echo "<header>";
    echo "<div class='logo'>LOGO</div><div class='logStat'>";
    if (isset($_SESSION["currentuser"]) && $_SESSION["isLoggedIn"] === 1){
        echo "<a href='logout.php'>LOG-OUT</a>";
    }
    else{
        echo "<a href='login.php'>LOG-IN</a><a href='register.php'>REGISTER</a>";
    }
    echo "</div></header>";
?>