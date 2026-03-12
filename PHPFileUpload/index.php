<?php
    $directory = __DIR__ . "/files";
    $files = glob($directory.'/*');
    $amount = count($files);
    echo "TOTAL FILES:".$amount."<br>";
    foreach ($files as $file){
        echo "- ".$file."<br>";
    }

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
        $file = fopen($pathString, "w");
        fwrite($file, $contents);
        fclose($file);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["create"])){
        if (empty($_POST["createnm"])){
            createFile(True, $directory, "file", "test");
        }
        else{
            createFile(False, $directory, $_POST["createnm"], "temp");
        }

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
?> 
<div>
    <h1>CREATE FILES</h1>
    <form method="post" action="">
        <input type='hidden' name='create' value='create'>
        <input type='text' name='createnm'>
        <button type="submit">SEND</button>
    </form>
</div>