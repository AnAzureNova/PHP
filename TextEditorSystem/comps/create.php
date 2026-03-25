<?php
    $loggedUser = getbyUsername($_SESSION["username"]);

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["create"])){
        try{
            $result = uploadFile($_POST["createnm"], $_POST["createext"], $loggedUser["username"], $_POST["creatects"], $_POST["createvis"]);
            
            if($result){
                header("Location: index.php?page=editor");
                exit();
            }
            else{
                $error = "Something went wrong, please try again.";
            }
        } 
        catch (Exception $e){
            $error = "Exception: ".$e->getMessage();
        } 
        catch (PDOException $e){
            $error = "DB Error: ".$e->getMessage();
        }
    }
?>
<section class="filecreate_section">
    <h3>CREATE FILES</h3>
    <form method="post" action="">
        <div>
            <input type='hidden' name='create' value='create'>
            <input type='text' placeholder="FILENAME" name='createnm' required>
            <select id='createext' name='createext' required>
                <option value="txt">.txt</option>
                <option value="md">.md</option>
            </select>
            <select id='createvis' name='createvis' required>
                <option value="private">Private</option>
                <option value="public">Public</option>
            </select><br>
        </div>
        <textarea name="creatects" placeholder="FILECONTENTS" required></textarea><br>
        <?php
            if($error){
                echo "<p id='errText'>".$error."</p><br>";
            }
        ?>
        <button type="submit">SEND</button>
    </form>
</section>