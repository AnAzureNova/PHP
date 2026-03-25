<?php
    $loggedUser = getbyUsername($_SESSION["username"]); //get current user
    $files = getAllFiles(true, "id DESC");
    $amount = count($files);

    /*if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["delcache"])){
        delFile($loggedUser["username"], $_POST["delcache"]);
        header("Location: index.php?page=editor");
        exit();
    }*/

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
        echo "<button>👁</button>";
        echo "<button>⤓</button>";
        echo "</div>";
        echo "</div>";
    }
    echo "</section>";
?>