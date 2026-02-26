<?php
    session_start();
    include "../comps/database.php";

    echo "<h1>USER LOG</h1>";
    //check if logged in
    if (isset($_SESSION["username"]) && $_SESSION["isLoggedIn"] === 1){
        $loggedUser = getbyUsername($_SESSION["username"]);
        $users = getALL("userdata");
        foreach($users as $user){
            if($loggedUser["permissions"] === "admin"){
                #echo "<img src='".$user["profileimg"]."' alt='pfp'";
                echo"<hr>ID: ".$user["id"]."<br>USERNAME: ".$user["username"]."<br>PASSWORD: ".$user["usrpassword"]."<br>EMAIL: ".$user["email"]."<br>PERMISSIONS: ".$user["permissions"]."<hr>";
            }
            else{
                #echo "<img src='".$user["profileimg"]."' alt='pfp'";
            echo"<hr>ID: ".$user["id"]."<br>USERNAME: ".$user["username"]."<br>EMAIL: ".$user["email"]."<hr>";
            }
        }
    }
    else{
        echo "<strong>PERMISSION DENIED:</strong> Not logged in";
    }
?>


<hr>
<br><br>
<a href="../index.php">Back</a>