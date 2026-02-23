<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../DU2/comps/header.css">
    <link rel="stylesheet" href="main.css">
    <title>Main Page</title>
</head>
<body>
    <?php
        session_start();
        include "../DU2/comps/header.php";
        include "../DU2/comps/staticdata.php"; //user class

        //if currentuser is set and isLoggedIn is true (both from successful login) displays current username on main page
        if (isset($_SESSION["currentuser"]) && $_SESSION["isLoggedIn"] === 1) {
            $curruser = unserialize($_SESSION["currentuser"]);
            echo "<h3>Hello, ".$curruser->name."!</h3>";
        }
    ?>
    <p>TEST</p>
    <section>
        <p>Temp</p>
        <hr>
        <h5>DEBUG</h5>
        <a href="../DU2/debug/logusrs.php">LOG REGISTERED USERS</a><br>
        <a href="../DU2/debug/clrdata.php">CLEAR SESSION</a>
    </section>
</body>
</html>