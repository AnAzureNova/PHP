
<div>
    <h1>FILE TEST</h1>
    <form method="post" action="">
        <h3>FIELD 1</h3>
        <input type="text" placeholder="Input" id="val1" name="val1" required>
        <h3>FIELD 2</h3>
        <input type="text" placeholder="Input" id="val2" name="val2" required><br>
        <button type="submit">SEND</button>
    </form>
</div>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $val1 = $_POST["val1"];
        $val2 = $_POST["val2"];

        $file = fopen("logs.md", "a") or die("err");
        $txt = "# SESSION LOGS\n".$val1." - VALUE 1\n".$val2." - VALUE 2\n---\n";
        fwrite($file, $txt);
        fclose($file);
        readfile("logs.md");
    }
?>