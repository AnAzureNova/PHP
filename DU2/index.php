<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../DU2/style/header.css">
    <link rel="stylesheet" href="../DU2/style/profile.css">
    <link rel="stylesheet" href="../DU2/style/main.css">
    <link rel="stylesheet" href="../DU2/style/userlog.css">
    <title>Main Page</title>
</head>
<body>
    <?php
        session_start();
        include "../DU2/comps/database.php";
        include "../DU2/comps/header.php";
        echo "<section>";
        echo "<div>";
        //if logged in
        if ($_SESSION["isLoggedIn"] === 1 && isset($_SESSION["username"])) {
            //switch comps using get page
            $page = $_GET["page"] ?? "home";
            switch ($page) {
                case "profile":
                    include "../DU2/comps/profile.php";
                    break;
                case "logusrs":
                    include "../DU2/comps/logusrs.php";
                    break;
                default:
                    include "../DU2/comps/home.php";
                    break;
            }
        }
        else{
            echo "<h3>Please log in to access this site</h3>";
        }
        echo "</section>";
    ?>
</body>
</html>