<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfigurátor Kuchyňské Linky</title>
</head>
<body>
    <form action="userOutput.php" method="post">
        <h1>Konfigurátor kuchyňské linky</h1>
        <div>
            <h2>Délka kuchyňské linky</h2>
            <hr>
            <p>Zadejte délku kuchyňské linky kterou si přejete (v metrech)</p>
            <input id="size" name="size" type="number" min="1" required>
        </div>
        <div>
            <h2>Barva kuchyňské linky</h2>
            <hr>
            <p>Prosím vyberte barvu vaší kuchyňské linky (zvolte jednu z možností)</p>
            <input id="white" name="color" type="radio" value="white" required><label for="white">Bílá (+ 0 Kč)</label><br>
            <input id="gray" name="color" type="radio" value="gray"><label for="gray">Šedá (+ 1 500 Kč)</label><br>
            <input id="black" name="color" type="radio" value="black"><label for="black">Černá (+ 3 000 Kč)</label><br>
            <input id="wood" name="color" type="radio" value="wood"><label for="wood">Dřevo (+ 2 000 Kč)</label>
        </div>
        <div>
            <h2>Materiál pracovní desky</h2>
            <hr>
            <p>Prosím vyberte materiál ze kterého bude pracovní deska vyrobena (zvolte jednu z možností)</p>
            <input id="laminate" name="material" type="radio" value="laminate" required><label for="laminate">Laminát (+ 2 000 Kč / metr)</label><br>
            <input id="wood" name="material" type="radio" value="wood"><label for="wood">Dřevo (+ 4 000 Kč / metr)</label><br>
            <input id="stone" name="material" type="radio" value="stone"><label for="stone">Kámen (+ 6 000 Kč / metr)</label>
        </div>
        <div>
            <h2>Styl dvířek</h2>
            <hr>
            <p>Zvolte si styl dvířek linky (zvolte jednu z možností)</p>
            <input id="smooth" name="cabtype" type="radio" value="smooth" required><label for="smooth">Hladká (+ 0 Kč)</label><br>
            <input id="frame" name="cabtype" type="radio" value="frame"><label for="frame">Rámová (+ 2 500 Kč)</label><br>
            <input id="glossy" name="cabtype" type="radio" value="glossy"><label for="glossy">Lesklá (+ 3 500 Kč)</label>
        </div>
        <div>
            <h2>Vestavěné spotřebiče</h2>
            <hr>
            <p>Vyberte podle vaší potřeby které spotřebiče budou vestavěné do vaší kuchyňské linky</p>
            <input id="oven" name="devices[]" type="checkbox" value="oven"><label for="oven">Trouba (+ 8 000 Kč)</label><br>
            <input id="hob" name="devices[]" type="checkbox" value="hob"><label for="hob">Varná deska (+ 6 000 Kč)</label><br>
            <input id="dishwasher" name="devices[]" type="checkbox" value="dishwasher"><label for="dishwasher">Myčka (+ 10 000 Kč)</label><br>
            <input id="microwave" name="devices[]" type="checkbox" value="microwave"><label for="microwave">Mikrovlnná trouba (+ 5 000 Kč)</label>
        </div>
        <div>
            <h2>Montáž linky</h2>
            <hr>
            <p>Zvolte zda si přejete zřízení montáže (zvolte jednu z možností)</p>
            <input id="yes" name="assembly" type="radio" value="yes" required><label for="yes">Ano (+ 5 000 Kč)</label><br>
            <input id="no" name="assembly" type="radio" value="no"><label for="no">Ne (+ 0 Kč)</label>
        </div>
        <div>
            <button type="submit">Dokončit výběr</button>
        </div>
    </form>
</body>
</html>