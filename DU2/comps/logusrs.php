<?php
    echo "<h3>USER LOG</h3>";
    if (isset($_SESSION["username"]) && $_SESSION["isLoggedIn"] === 1) {
        $loggedUser = getbyUsername($_SESSION["username"]); //get current user
        $userLogout = false;
        function updateValue($coltype) : Void {
            global $userLogout;
            if ($_SESSION["username"] === $_POST["editUser"]){
                $userLogout = true;
                editUser($_POST["editUser"], $coltype, trim($_POST[$coltype]));
            }
            else{
                editUser($_POST["editUser"], $coltype, trim($_POST[$coltype]));
            }
        }

        //edit / del user
        if ($loggedUser["permissions"] === "admin" && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["editUser"])) {
            //var_dump($_POST);
            $targetUsr = $_POST["editUser"];

            if (!empty(trim($_POST["usrpassword"]))){
                updateValue("usrpassword");
            }
            if (!empty(trim($_POST["username"]))){
                updateValue("username");
            }
            if (!empty(trim($_POST["email"]))){
                updateValue("email");
            }
            if (!empty(trim($_POST["permissions"]))){
                updateValue("permissions");
            }
            if (!empty(trim($_POST["profileimg"]))){
                updateValue("profileimg");
            }
            if (isset($_POST["deleteUser"])) {
                delbyUsername($_POST["editUser"]);
            }
            echo "<p id='crrText'><strong>Change success</strong></p>";
            if ($userLogout ){
                header("Location: logout.php");
                exit();
            }
        }

        $users = getALL("userdata");

        //loop to print all users
        foreach ($users as $user) {
            echo "<div class='userDiv'>";
            echo "<img id='usrimg' src='".$user["profileimg"]."' alt='pfp'><br><div class='userDiv_info'>";
            if ($loggedUser["permissions"] === "admin") {
                if ($user["username"] === get("userdata", 1)["username"]){ //system admin change prevention
                    echo "ID: ".$user["id"]."<br>USERNAME: ".$user["username"]."<br>EMAIL: ".$user["email"]."<br>Permissions: system admin";
                }
                else{
                    echo "<form method='POST'>
                        <input type='hidden' name='editUser' value='".$user["username"]."'>
                        <label>ID:</label> ".$user["id"]."<br>
                        <label>Username</label>
                        <input type='text' name='username' value='".$user["username"]."'><br>
                        <label>Email</label>
                        <input type='text' name='email' value='".$user["email"]."'><br>
                        <label>Password</label>
                        <input type='password' name='usrpassword' placeholder='".str_repeat("*", strlen($user["usrpassword"]))."'><br>
                        <label>Profile Picture URL</label>
                        <input type='text' name='profileimg' value='".$user["profileimg"]."'><br>
                        <label>Permissions </label>";
                    echo "<select name='permissions'>
                        <option value='user'".($user["permissions"]==="user" ? "selected" : "").">user</option>
                        <option value='admin'".($user["permissions"]==="admin" ? "selected" : "").">admin</option>
                        </select>";
                    echo "<br><button type='submit'>SAVE</button>";
                    if ($user["permissions"] != "admin"){
                        echo "<button type='submit' name='deleteUser' value='1'>DELETE</button>";
                    }
                    echo "</form>";
                }
            } 
            else {
                //regular text print for normal users
                echo "ID: ".$user["id"]."<br>USERNAME: ".$user["username"]."<br>EMAIL: ".$user["email"];
            }
            echo "</div></div>";
        }
    } 
    else {
        echo "<p id='errText><strong'>PERMISSION DENIED:</strong> Not logged in</p>";
    }
?>