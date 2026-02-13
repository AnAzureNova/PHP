<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>
<body>
    <?php
        session_start();
        include "../DU2/comps/header.php";
        include "../DU2/comps/staticdata.php"; //user class

        //if currentuser is set and isLoggedIn is true (both from successful login) displays current username on main page
        if (isset($_SESSION["currentuser"]) && $_SESSION["isLoggedIn"] === 1) {
            $user = unserialize($_SESSION["currentuser"]);
            echo "<h3>Hello, ".$user->name."!</h3>";
        }
    ?>


    <section>
        <p>Temp</p>
        <a href="login.php">LOG-IN</a><br>
        <a href="register.php">REGISTER</a><br><br>
        <a href="logout.php">LOG-OUT</a>

        <br><br><br>
        <hr>
        <h5>DEBUG</h5>
        <a href="../DU2/debug/logusrs.php">LOG REGISTERED USERS</a><br>
        <a href="../DU2/debug/clrdata.php">CLEAR SESSION</a>
    </section>
</body>
</html>