<?php
    session_start();
    include "../comps/database.php";

    echo "<h1>USER LOG</h1>";
    //check if logged in
    if (isset($_SESSION["username"]) && $_SESSION["isLoggedIn"] === 1){
        $users = getALL("userdata");
        foreach($users as $user){
            echo"<hr>".$user["id"]."<br>".$user["username"]."<br>".$user["usrpassword"]."<br>".$user["email"]."<hr>";
        }
    }
    else{
        echo "<strong>PERMISSION DENIED:</strong> Not logged in";
    }
?>


<hr>
<br><br>
<a href="../index.php">Back</a>