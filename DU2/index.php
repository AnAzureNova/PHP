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
        $_SESSION["id"] = 0;
        include "../DU2/comps/header.php";
        include "../DU2/comps/staticdata.php";
        if (isset($_SESSION["admin@web.com"]) && $_SESSION["isLoggedIn"] === 1) {
            echo "<h5>Logged in user data</h5><ul>";
            $user = unserialize($_SESSION["admin@web.com"]);
            echo "<li>Name: " . $user->name . "</li>";
            echo "<li>Email: " . $user->email . "</li>";
            echo "<li>Passwd: " . $user->password . "</li>";
            echo "<li>ID: " . $user->usrid . "</li></ul>";
        }
    ?>
    <section>
        <p>Temp</p>
        <a href="login.php">LOGIN</a><br>
        <a href="register.php">REGISTER</a><br><br>
        <a href="clrtemp.php">CLEAR SESSION</a>
    </section>
</body>
</html>