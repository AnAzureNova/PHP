<?php
    echo "<h1>ALL CREATED FILES</h1>";
    echo "<h3>TOTAL FILES: ".$amount."</h3><br>";

    //each file writeout
    foreach ($files as $filepath){
        $loggedUser = getbyUsername($_SESSION["username"]); //get current user

        /*$chars = strlen(trim(file_get_contents($filepath)));
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
        }*/
    }
?>