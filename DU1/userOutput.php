<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cena vaší kuchyňské linky</h1>
    <hr>
    <div>
        <h2>Podrobnosti</h2>
    <?php
        $price = 0;
        $size = $_POST["size"];
        echo "Size: ".$size."m";
        echo "<br>Color: ".ucfirst($_POST["color"]);
        switch ($_POST["color"]){
            case "white": 
                $price += 0; 
                break;
            case "gray": 
                $price += 1500; 
                echo " (+ 1500 Kč)"; 
                break;
            case "black": 
                $price += 3000; 
                echo " (+ 3000 Kč)"; 
                break;
            case "wood": 
                $price += 2000; 
                echo " (+ 2000 Kč)"; 
                break;
        }
        echo "<br>Material: ".ucfirst($_POST["material"]);
        switch ($_POST["material"]){
            case "laminate": 
                $price += (2000*$size);
                echo " (+ ". 2000*$size." Kč - 2000 Kč * ".$size."m )";
                break;
            case "wood": 
                $price += (4000*$size);
                echo " (+ ". 4000*$size." Kč - 4000 Kč * ".$size."m )";
                break;
            case "stone": 
                $price += (6000*$size);
                echo " (+ ". 6000*$size." Kč - 6000 Kč * ".$size."m )";
                break;
        }
        echo "<br>Cabinet type: ".ucfirst($_POST["cabtype"]);
        switch ($_POST["cabtype"]){
            case "smooth":
                $price += 0;
                break;
            case "frame":
                $price += 2500;
                echo " (+ 2500 Kč)"; 
                break;
            case "glossy":
                $price += 3500;
                echo " (+ 3500 Kč)"; 
                break;
        }
        if (!empty($_POST["devices"])){
            echo "<br>Built-in devices: <br><ul>";
            foreach($_POST["devices"] as $device){
                echo "<li>".ucfirst($device);
                switch ($device){
                    case "oven":
                        $price += 8000;
                        echo " (+ 8000 Kč)</li>";
                        break;
                    case "hob":
                        $price += 6000;
                        echo " (+ 6000 Kč)</li>";
                        break;
                    case "dishwasher":
                        $price += 10000;
                        echo " (+ 10000 Kč)</li>";
                        break;
                    case "microwave":
                        $price += 5000;
                        echo " (+ 5000 Kč)</li>";
                       break;
                }
            }
            echo "</ul>";
        }
        else{
            echo "<br>Built-in devices: None";
        }     
        echo "<br>Assembly: ".ucfirst($_POST["assembly"]);
        switch($_POST["assembly"]){
            case "no":
                $price += 0;
                break;
            case "yes":
                $price += 5000;
                echo " (+ 5000 Kč)"; 
                break;
        }
        echo "<br><hr><b>Celková cena: ".$price." Kč</b>";
    ?>
    </div>
</body>
</html>
