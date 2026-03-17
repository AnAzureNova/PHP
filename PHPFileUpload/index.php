<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Files</title>
</head>
<body>
    <?php
        $directory = __DIR__."/files"; //.../files/...
        $files = glob($directory.'/*'); // get all files within the previous directory
        $amount = count($files); // how many files are in the directory

        function createFile($isEmpty, $directory, $filename, $contents){
            global $amount;
            if($isEmpty){
                $index = $amount + 1;
                $fileString = $filename.$index.".txt";
            }
            else{
                $fileString = $filename.".txt";
            }
            $pathString = $directory."/".$fileString;
            $fh = fopen($pathString, "w");
            fwrite($fh, $contents);
            fclose($fh);
        }

        //create file
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["create"])){
            if (empty($_POST["createnm"])){
                createFile(True, $directory, "file", $_POST["creatects"]);
            }
            else{
                createFile(False, $directory, $_POST["createnm"], $_POST["creatects"]);
            }
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();

        }

        //editing files
        $savedFile = false;
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["editcache"])){
            $pathString = $directory."/".$_POST["editcache"];
            $fh = fopen($pathString, "w");
            fwrite($fh, $_POST["editcts"]);
            fclose($fh);
            $savedFile = true;
        }

        if($savedFile){
            $editingFile = null; //no ta when saved
        }
        else if(isset($_POST["editcache"])){
            $editingFile = $_POST["editcache"];
        }
        else if(isset($_POST["cache"])){
            $editingFile = $_POST["cache"];
        }
        else{
            $editingFile = null;
        }
    ?>
    <section>
        <h1>CREATE FILES</h1>
        <form method="post" action="">
            <input type='hidden' name='create' value='create'>
            <input type='text' placeholder="FILENAME" name='createnm'>
            <textarea name="creatects" placeholder="FILECONTENTS" required></textarea>
            <button type="submit">SEND</button>
        </form>
    </section>
    <section id="files">
        <?php
            echo "<h1>ALL CREATED FILES</h1>";
            echo "<h3>TOTAL FILES: ".$amount."</h3><br>";

            //each file writeout
            foreach ($files as $filepath){
                $filename = basename($filepath); //only file, no path

                $chars = strlen(trim(file_get_contents($filepath)));
                $words = preg_split("/[\s\n]+/", file_get_contents($filepath));
                $lines = preg_split("/\r\n|\n|\r/", file_get_contents($filepath));

                echo "<form method='post' action='#".$filename."header'>";
                echo "<div>";
                echo "<img id='fileicon' src='res/text-format.png'>";
                echo "<h4 id='".$filename."fullheader'>".$filename."</h4>";
                if (filesize($filepath) != 1){
                    echo "<p>".filesize($filepath)." Bytes</p>";
                }
                else{
                    echo "<p>".filesize($filepath)." Byte</p>";
                }
                echo "</div><div>";
                echo "<p>Chars: ".$chars."</p>";
                echo "<p>Words: ".count($words)."</p>";
                echo "<p>Lines: ".count($lines)."</p>";
                echo "</div>";
                echo "<i>Last modified: ".date("F d H:i:s", filemtime($filepath))."</i>";
                echo "<input type='hidden' name='cache' value='".$filename."'>";
                echo "<button type='submit'>EDIT</button>";
                echo "</form>";

                if($editingFile === $filename){
                    $contents = file_get_contents($filepath);

                    echo "<h4 id='".$filename."header'>Editing ".$filename."...</h4>";
                    echo "<form method='post' action='#".$filename."fullheader' id='".$filename."'>";
                    echo "<input type='hidden' name='editcache' value='".$filename."'>";
                    echo "<textarea name='editcts' required>".$contents."</textarea>";
                    echo "<button type='submit'>SAVE</button>";
                    echo "</form>";
                }
            }
        ?>
    </section>
</body>
</html>