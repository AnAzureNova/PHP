<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../TextEditorSystem/style/form.css">
    <title>LOGIN</title>
</head>
<body>
    <?php
        session_start();
        include "../TextEditorSystem/comps/database.php";

        //On form submittion
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (!empty($_POST["userLogin"]) && !empty($_POST["passwordLogin"])){ //check if all inputs have data - failsafe
                $username = loginAuth($_POST["userLogin"], $_POST["passwordLogin"]);
                if ($username){ //true if user exists in session and if the users password is correct
                    $_SESSION["isLoggedIn"] = 1;
                    $_SESSION["username"] = $username;
                    header("Location: index.php");
                    exit();
                }
                else{
                    echo "<p id='errText'>Bad secrets</p>";
                }
            }
        }
    ?>
    <div>
        <h1>LOGIN</h1>
        <form method="post" action="">
            <h3>USERNAME</h3>
            <input type="text" placeholder="Enter your username" id="userLogin" name="userLogin" required>
            <h3>PASSWORD</h3>
            <input type="password" placeholder="Enter your password" id="passwordLogin" name="passwordLogin" required><br>
            <button type="submit">LOGIN</button><br>
            <a id="linkToButton" href="/TextEditorSystem/index.php">BACK</a>
        </form>
    </div>
</body>
</html>