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
        include "../DU2/comps/header.php";
        if (isset($_SESSION["user"])) {
            $user = unserialize($_SESSION["user"]);
            echo "Name: " . $user->name . "<br>";
            echo "Email: " . $user->email . "<br>";
            echo "Passwd: " . $user->password . "<br>";
            echo "ID: " . $user->usrid . "<br>";
        }
    ?>
    <section>
        <p>Temp</p>
        <a href="login.php">LOGIN</a>
        <a href="register.php">REGISTER</a>
    </section>
</body>
</html>