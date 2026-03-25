<?php
    $loggedUser = getbyUsername($_SESSION["username"]); //get current user
    $files = getFiles($loggedUser["username"], "id DESC");

    $amount = count($files);

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["downloadcache"])){
        $file = getFile($_POST["downloadcache"]);
        if($file){
            $filename = $file["file_name"].".".$file["extension"];
            header("Content-Type: text/plain");
            header("Content-Disposition: attachment; filename=\"".$filename."\"");
            header("Content-Length: ".strlen($file["file_contents"]));
            echo $file["file_contents"];
            exit();
        }
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["delcache"])){
        delFile($loggedUser["username"], $_POST["delcache"]);
        header("Location: index.php?page=editor");
        exit();
    }


    echo "<h3>".$loggedUser["username"]."'s FILES</h3>";
    echo "<p>Total files: ".$amount."</h3><p>";

    echo "<section class='filegrid_section'>";
    foreach($files as $file){
        $chars = strlen(trim($file["file_contents"]));
        $words = preg_split("/[\s\n]+/", $file["file_contents"]);
        $lines = preg_split("/\r\n|\n|\r/", $file["file_contents"]);

        echo "<div id='".$file["file_name"]."Div'>";
        echo "<h4 class='file_title'>".$file["file_name"].".".$file["extension"]."</h4>";
        echo "<p id='fileStats'>".ucfirst($file["visibility"])."<br>Chars: ".$chars." Words: ".count($words)." Lines: ".count($lines)."</p>";
        echo "<div class='text_preview'>";
        echo "<pre>".htmlspecialchars($file["file_contents"])."</pre>";
        echo "</div>";
        echo "<p id='fileStatsCrTime'> Created: ".$file["create_time"]."</p>";
        echo "<div class='file_buttons'>";
        echo "<a href='index.php?page=fileview&view=".urlencode($file["file_name"])."&from=editor'><button>👁</button></a>";
        echo "<a href='download.php?file=".urlencode($file["file_name"])."'><button>⤓</button></a>";
        echo "<button id='disabledButton'>✎</button>";
        echo "<form method='post' action='#".$file["file_name"]."Div'>";
        echo "<input type='hidden' name='delcache' value='".$file["file_name"]."'>";
        echo "<button type='submit'>🗑</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
    }
    echo "</section>";
?>