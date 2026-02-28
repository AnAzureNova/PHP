<?php
    echo "<h1>USER LOG</h1>";
    //check if logged in
    if (isset($_SESSION["username"]) && $_SESSION["isLoggedIn"] === 1){
        $loggedUser = getbyUsername($_SESSION["username"]);
        $users = getALL("userdata");
        foreach($users as $user){
            if($loggedUser["permissions"] === "admin"){
                echo"<hr><img style='width: 50px; heigth = 50px;' src='".$user["profileimg"]."' alt='pfp'<br>";
                echo"<br>ID: ".$user["id"]."<br>USERNAME: ".$user["username"]."<br>PASSWORD: ".$user["usrpassword"]."<br>EMAIL: ".$user["email"]."<br>PERMISSIONS: ".$user["permissions"];
            }
            else{
                echo"<hr><img style='width: 50px; heigth = 50px;' src='".$user["profileimg"]."' alt='pfp'<br>";
                echo"<br>ID: ".$user["id"]."<br>USERNAME: ".$user["username"]."<br>EMAIL: ".$user["email"];
            }
        }
    }
    else{
        echo "<strong>PERMISSION DENIED:</strong> Not logged in";
    }
?>