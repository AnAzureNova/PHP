<?php
    $loggedUser = getbyUsername($_SESSION["username"]); //get current user
    $files = getAllFiles(true, "id DESC");
    $amount = count($files);

    echo "<h3>PUBLIC FILE LIBRARY</h3>";
    echo "<p>Total files: ".$amount."</h3><p>";

    echo "<section class='filegrid_section'>";
    foreach($files as $file){
        $chars = strlen(trim($file["file_contents"]));
        $words = preg_split("/[\s\n]+/", $file["file_contents"]);
        $lines = preg_split("/\r\n|\n|\r/", $file["file_contents"]);

        echo "<div id='".$file["file_name"]."Div'>";
        echo "<h4 class='file_title'>".$file["file_name"].".".$file["extension"]."</h4>";
        echo "<p id='fileStats'><b>By: ".$file["author_username"]."</b><br>Chars: ".$chars." Words: ".count($words)." Lines: ".count($lines)."</p>";
        echo "<div class='text_preview'>";
        echo "<pre>".htmlspecialchars($file["file_contents"])."</pre>";
        echo "</div>";
        echo "<p id='fileStatsCrTime'> Created: ".$file["create_time"]."</p>";
        echo "<div class='file_buttons'>";
        echo "<a href='index.php?page=fileview&view=".urlencode($file["file_name"])."&from=library'><button>👁</button></a>";
        echo "<a href='download.php?file=".urlencode($file["file_name"])."'><button>⤓</button></a>";
        echo "</div>";
        echo "</div>";
    }
    echo "</section>";
?>