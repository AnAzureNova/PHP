<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <section>
        <h1>KRUH</h1>
        <hr>
        <label>Zadej poloměr kruhu </label><input type="number" id="kruhinput" min="0" placeholder="Zadej číslo"><br>
        <button id="kruhsubmit">VYPOČÍTAT</button><hr>
        <label>OBSAH: </label><p id="obsahoutput"></p>
        <label>OBVOD: </label><p id="obvodoutput"></p>
    </section>
    <section>
        <h1>OBDELNIK</h1>
        <hr>
        <label>Zadej stranu A </label><input type="number" id="obdelnik_A" min="0" placeholder="Zadej číslo"><br>
        <label>Zadej stranu B </label><input type="number" id="obdelnik_B" min="0" placeholder="Zadej číslo"><br>
        <button id="obdelniksubmit">VYPOČÍTAT</button><hr>
        <label>OBSAH: </label><p id="obsahoutput_2"></p>
        <label>OBVOD: </label><p id="obvodoutput_2"></p>
    </section>
    <button onclick="reset();">RESET</button>
    <section class="numbers">
        <table>
            <?php
                $row = 13;
                $count = 100;

                $y = 1;
                while ($y < $count){
                    echo"<tr>";
                    for ($x = $y; $x < $row+$y; $x++){
                        $class = ($x %2== 0) ? "even" : "odd";
                        if ($x <= $count){
                            echo"<td class='{$class}'>{$x}</td>";
                        }
                        else{
                            echo"<td class='empty'></td>";
                        }
                    }
                    echo "</tr>";
                    $y += $row;
                }
            ?>
        </table>
    </section>
    <script src="script.js"></script>
</body>
</html>