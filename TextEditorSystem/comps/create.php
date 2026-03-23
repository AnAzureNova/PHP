<?php
    $loggedUser = getbyUsername($_SESSION["username"]); //get current user

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["create"])){
        try {
            $result = uploadFile(
                $_POST["createnm"], 
                $_POST["createext"], 
                $loggedUser["username"], 
                $_POST["creatects"], 
                "private"
            );
            
            if($result){
                header("Location: ".$_SERVER['PHP_SELF']);
                exit();
            } else {
                $error = "uploadFile returned false";
            }
        } catch (Exception $e) {
            $error = "Exception: " . $e->getMessage();
        } catch (PDOException $e) {
            $error = "DB Error: " . $e->getMessage();
        }
    }
?>

<section>
    <h3>CREATE FILES</h3>
    <form method="post" action="">
        <input type='hidden' name='create' value='create'>
        <input type='text' placeholder="FILENAME" name='createnm' required>
        <input type='text' placeholder="EXTENSION" value="txt" name='createext' required>
        <textarea name="creatects" placeholder="FILECONTENTS" required></textarea>
        <button type="submit">SEND</button>
    </form>
</section>