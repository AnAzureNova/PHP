<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../TextEditorSystem/style/header.css">
    <link rel="stylesheet" href="../TextEditorSystem/style/profile.css">
    <link rel="stylesheet" href="../TextEditorSystem/style/main.css">
    <link rel="stylesheet" href="../TextEditorSystem/style/userlog.css">
    <link rel="stylesheet" href="../TextEditorSystem/style/textediting.css">
    <title>Main Page</title>
</head>
<body>
    <?php
        session_start();
        include "../TextEditorSystem/comps/database.php";
        include "../TextEditorSystem/comps/header.php";
        echo "<section>";
        echo "<div>";
        //if logged in
        if ($_SESSION["isLoggedIn"] === 1 && isset($_SESSION["username"])) {
            //switch comps using get page
            $page = $_GET["page"] ?? "home";
            switch ($page) {
                case "profile":
                    include "../TextEditorSystem/comps/profile.php";
                    break;
                case "logusrs":
                    include "../TextEditorSystem/comps/logusrs.php";
                    break;
                case "editor":
                    include "../TextEditorSystem/comps/editor.php";
                    break;
                 case "create":
                    include "../TextEditorSystem/comps/create.php";
                    break;
                default:
                    include "../TextEditorSystem/comps/home.php";
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