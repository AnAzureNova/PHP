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
    function loginCheck($currUsr, $currPass): bool{
        return true;
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (!empty($_POST["emailLogin"]) && !empty($_POST["passwordLogin"])){
            $canLog = loginCheck($_POST["emailLogin"], $_POST["passwordLogin"]);
            if ($canLog){
                echo "Return attempt";
                header("Location: index.php");
            }
        }
    }
    ?>
    <div>
        <h1>LOGIN</h1>
        <form method="post" action="">
            <h3>EMAIL</h3>
            <input type="text" placeholder="Enter your email" id="emailLogin" name="emailLogin" required>
            <h3>PASSWORD</h3>
            <input type="password" placeholder="Enter your password" id="passwordLogin" name="passwordLogin" required>

            <button type="submit">LOGIN</button>
        </form>
    </div>
</body>
</html>