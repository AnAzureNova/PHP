<?php
    session_start();
    include "../DU2/comps/staticdata.php"; //user class

    echo "<header>";
    echo "<div>LOGO</div><div>";
    if (isset($_SESSION["currentuser"]) && $_SESSION["isLoggedIn"] === 1){
        echo "<a href='logout.php'>LOG-OUT</a>";
    }
    else{
        echo "<a href='login.php'>LOG-IN</a><a href='register.php'>REGISTER</a>";
    }
    echo "</div></header>";
?>