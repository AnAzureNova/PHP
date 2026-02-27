<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
</head>
<body>
    <?php
    session_start();
    include "../DU2/comps/database.php";

    //On form submittion
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (!empty($_POST["usernameRegister"]) && !empty($_POST["emailRegister"]) && !empty($_POST["passwordRegister"]) && !empty($_POST["passwordRetype"])){ //check if all inputs have data - failsafe
            $users = getALL("userdata");
            $isUsrInDB = false;
            $isMailInDB = false;
            foreach ($users as $user){
                if ($_POST["usernameRegister"] === $user["username"]){
                    $isUsrInDB = true;
                }
                if ($_POST["emailRegister"] === $user["email"]){
                    $isMailInDB = true;
                }
            }

            if ($isUsrInDB){
                echo "REGISTRATION FAILED: Username already taken";
            }
            elseif ($isMailInDB){
                echo "REGISTRATION FAILED: Email already in use";
            }
            else{
                if ($_POST["passwordRegister"] === $_POST["passwordRetype"]){ //check passwords
                    //Register user
                    if (register($_POST["usernameRegister"], $_POST["emailRegister"], $_POST["passwordRegister"])){
                        $_SESSION["isLoggedIn"] = 0;
                        header("Location: index.php");
                        exit();
                    }
                    else{
                        echo "REGISTRATION FAILED: Something went wrong";
                    }
                }
                else{
                    echo "BAD SECRETS: Passwords dont match";
                }
            }
        }
    }
    ?>

    <div>
        <h1>REGISTER</h1>
        <form method="post" action="">
            <h3>USERNAME</h3>
            <input type="text" placeholder="Enter your username" id="usernameRegister" name="usernameRegister" required>
            <h3>EMAIL</h3>
            <input type="email" placeholder="Enter your email" id="emailRegister" name="emailRegister" required>
            <h3>PASSWORD</h3>
            <input type="password" placeholder="Enter a strong password" id="passwordRegister" name="passwordRegister" required>
            <h3>RE-ENTER PASSWORD</h3>
            <input type="password" placeholder="Re-enter password" id="passwordRetype" name="passwordRetype" required>
            <button type="submit">REGISTER ACCOUNT</button>
        </form>
    </div>
    <br>
    <a href="/DU2/index.php">Back</a>
</body>
</html>