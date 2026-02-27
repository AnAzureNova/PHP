<?php
    session_start();
    echo "<header>";
    echo "<div class='navbar'><a href='/DU2/index.php'>HOME</a><a href='/DU2/debug/logusrs.php'>LOG USERS</a></div><div class='logStat'>";
    if ($_SESSION["isLoggedIn"] === 1 && isset($_SESSION["username"])) {
        echo "<a href='/DU2/logout.php'>LOG-OUT</a>";
        $usr = getbyUsername($_SESSION["username"]);
        echo "<img id='profileimg' src='".$usr["profileimg"]."' alt='pfp'";
    }
    else{
        echo "<a href='login.php'>LOG-IN</a><a href='register.php'>REGISTER</a>";
    }
    echo "</div></header>";
?>