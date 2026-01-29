<?php
    echo "Text: ".$_POST["text"]."<br>";
    echo "Range: ". $_POST["range"]."<br>";
    $checkbox = $_POST["checkbox"] ?? "off";
    echo "Checkbox: ".$checkbox."<br>";
?>