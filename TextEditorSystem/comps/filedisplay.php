<?php
    $loggedUser = getbyUsername($_SESSION["username"]);
    $displayedFile = null;
    if(isset($_GET["view"])){
        $displayedFile = getFileByName($loggedUser["username"], $_GET["view"]);
        if(!$displayedFile){
            $displayedFile = getPublicFileByName($_GET["view"]);
        }
    }

    $from = isset($_GET["from"]) ? $_GET["from"] : "editor";

    if($displayedFile){
        echo "<h3>".$displayedFile["file_name"].".".$displayedFile["extension"]."</h3>";
        echo "<div>";
        echo "<pre id='textFullDisplay'>".htmlspecialchars($displayedFile["file_contents"])."</pre>";
        echo "<a href='index.php?page=".$from."'><button>BACK</button></a>";
        echo "</div>";
    } else {
        echo "<p>File not found.</p>";
        echo "<a href='index.php?page=".$from."'><button>BACK</button></a>";
    }
?>