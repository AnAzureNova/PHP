<?php
    session_start();
    include "../comps/staticdata.php"; //user class


    echo "<h1>USER LOG</h1>";
    //check if logged in
    if (isset($_SESSION["currentuser"]) && $_SESSION["isLoggedIn"] === 1){
        //for each user in database
        foreach ($_SESSION as $key => $value) {
            //trim user. and search for key
            if (strpos($key, "user.") === 0) {
                $user = unserialize($value);
                
                //print out user data (alongside pass and perms when admin)
                echo "<hr><strong>USER: ".$user->name."</strong><br>";
                echo "Email: ".$user->email;
                $currentuser = unserialize($_SESSION["currentuser"]);
                if ($currentuser->perms === "admin"){
                    echo "<br>Password: ".$user->password;
                    echo "<br>Permissions: ".$user->perms;
                }
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