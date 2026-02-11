<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    include "../DU2/comps/staticdata.php";
    function registerUser($currName, $currMail, $currPass): void{
        $_SESSION["id"] += 1;
        $user = new User();
        $user->setUser($currName, $currMail, $currPass, $_SESSION["id"]);
        $_SESSION[$currMail] = serialize($user);
        $_SESSION["isLoggedIn"] = 1;
        header("Location: index.php");
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (!empty($_POST["usernameRegister"]) && !empty($_POST["emailRegister"]) && !empty($_POST["passwordRegister"]) && !empty($_POST["passwordRetype"])){
            registerUser($_POST["usernameRegister"], $_POST["emailRegister"], $_POST["passwordRegister"]);
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
            <button type="submit">LOGIN</button>
        </form>
    </div>
</body>
</html>