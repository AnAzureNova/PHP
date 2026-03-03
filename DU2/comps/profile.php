<?php
    if (isset($_SESSION["username"]) && $_SESSION["isLoggedIn"] === 1) {
        $loggedUser = getbyUsername($_SESSION["username"]);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!empty(trim($_POST["password"]))){
                editUser($loggedUser["username"], "usrpassword", trim($_POST["password"]));
            }
            if (!empty(trim($_POST["email"]))){
                editUser($loggedUser["username"], "email", trim($_POST["email"]));
            }
            if (!empty(trim($_POST["profileimg"]))){
                editUser($loggedUser["username"], "profileimg", trim($_POST["profileimg"]));
            }
            if (!empty(trim($_POST["username"]))){
                editUser($loggedUser["username"], "username", trim($_POST["username"]));
                $_SESSION["username"] = trim($_POST["username"]);
            }
            $loggedUser = getbyUsername($_SESSION["username"]);
            echo "<p id='crrText'><strong>Changes saved</strong></p>";
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["delete_password"])) {
            if (trim($_POST["delete_password"]) === $loggedUser["usrpassword"]) {
                delbyUsername($loggedUser["username"]);
                header("Location: /DU2/logout.php");
                exit();
            } 
            else {
                echo "<p id='errText'><strong>PERMISSION DENIED: </strong>Bad secrets</p>";
            } 
        } 

        echo "<section><div><div class='profile_header'>
            <img src='".$loggedUser["profileimg"]."' alt='pfp' id='usrimg'>
            <h1>".$loggedUser['username']."'s profile</h1>
            </div>";

        echo "<form method='POST'>
                <label>Profile Picture URL</label>
                <input type='text' name='profileimg' value='".$loggedUser["profileimg"]."'><br><hr>
                <label>Username</label>
                <input type='text' name='username' value='".$loggedUser["username"]."'><br>
                <label>Email</label>
                <input type='text' name='email' value='".$loggedUser["email"]."'><br>
                <label>Password</label>
                <input type='password' name='password' placeholder='".str_repeat("*", strlen($loggedUser["usrpassword"]))."'><br>
                <button type='submit'>SAVE CHANGES</button>
            </form>";
        echo "<a id='linkToButton' href='/DU2/logout.php'>LOG-OUT</a></div>";
        if ($loggedUser["permissions"] != "admin"){
            echo "<div><h1>Account deletion</h1><hr><p>Please re-enter your current password to confirm account deletion</p><br>";
            echo "<form method='POST'>
                <label>Password confirmation</label>
                <input type='password' name='delete_password' placeholder='".str_repeat("*", strlen($loggedUser["usrpassword"]))."'><br><br>
                <button type='submit'>DELETE ACCOUNT</button>
            </form></div>";
        }
        echo "</section>";
    } 
    else {
        echo "<p id='errText'><strong>PERMISSION DENIED:</strong> Not logged in</p>";
    }
?>