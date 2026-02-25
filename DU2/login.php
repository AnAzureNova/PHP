<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <?php
    session_start();
    include "../DU2/comps/database.php";

    //Check if user exists

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
                echo("Bad secrets");
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
            <input type="password" placeholder="Enter your password" id="passwordLogin" name="passwordLogin" required>

            <button type="submit">LOGIN</button>
        </form>
    </div>
</body>
</html>