<?php
    session_start();
    echo "<header>";
    if ($_SESSION["isLoggedIn"] === 1 && isset($_SESSION["username"])){
        $loggedUser = getbyUsername($_SESSION["username"]);

        echo "<div class='navbar'>";
        echo "<a href='/TextEditorSystem/index.php'>HOME</a>";
        echo "<a href='/TextEditorSystem/index.php?page=library'>LIBRARY</a>";
        if ($loggedUser["permissions"] == "admin"){
            echo "<a href='/TextEditorSystem/index.php?page=logusrs'>VIEW USERS</a>";
        }
        echo "</div>";
        echo "<div class='logStat'>";
    }
    else{
        echo "<div class='navbar'>";
        echo "<a href='/TextEditorSystem/index.php'>HOME</a>";
        echo "</div>";
        echo "<div class='logStat'>";
    }
    if ($_SESSION["isLoggedIn"] === 1 && isset($_SESSION["username"])) {
        echo "<a href='/TextEditorSystem/index.php?page=create'>CREATE FILE</a>";
        echo "<a href='/TextEditorSystem/index.php?page=editor'>MY FILES</a>";
        echo "<a href='/TextEditorSystem/index.php?page=profile'>PROFILE</a>";
        $usr = getbyUsername($_SESSION["username"]);
        echo "<img id='profileimg' src='".$usr["profileimg"]."' alt='pfp'";
    }
    else{
        echo "<a href='login.php'>LOG-IN</a><a href='register.php'>REGISTER</a>";
    }
    echo "</div></header>";
?>