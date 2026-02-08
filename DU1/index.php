<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="hover.css">
    <link rel="stylesheet" href="fonts.css">
    <title>Konfigurátor Kuchyňské Linky</title>
</head>
<body>
    <header>
        <h1>Konfigurátor kuchyňské linky</h1>
    </header>
    <form action="userOutput.php" method="post">
        <section>
            <h2>Délka kuchyňské linky</h2>
            <div>
                <p>Zadejte délku kuchyňské linky kterou si přejete (v metrech)</p>
                <input id="size" name="size" type="number" min="1" required>
            </div>
        </section>
        <section>
            <h2>Barva kuchyňské linky</h2>
            <div>
                <p>Prosím vyberte barvu vaší kuchyňské linky (zvolte jednu z možností)</p>
                <input id="white" name="color" type="radio" value="white" required><label for="white">Bílá (+ 0 Kč)</label><br>
                <input id="gray" name="color" type="radio" value="gray"><label for="gray">Šedá (+ 1 500 Kč)</label><br>
                <input id="black" name="color" type="radio" value="black"><label for="black">Černá (+ 3 000 Kč)</label><br>
                <input id="wood1" name="color" type="radio" value="wood"><label for="wood1">Dřevo (+ 2 000 Kč)</label>
            </div>
        </section>
        <section>
            <h2>Materiál pracovní desky</h2>
            <div>
                <p>Prosím vyberte materiál ze kterého bude pracovní deska vyrobena (zvolte jednu z možností)</p>
                <input id="laminate" name="material" type="radio" value="laminate" required><label for="laminate">Laminát (+ 2 000 Kč / metr)</label><br>
                <input id="wood2" name="material" type="radio" value="wood"><label for="wood2">Dřevo (+ 4 000 Kč / metr)</label><br>
                <input id="stone" name="material" type="radio" value="stone"><label for="stone">Kámen (+ 6 000 Kč / metr)</label>
            </div>
        </section>
        <section>
            <h2>Styl dvířek</h2>
            <div>
                <p>Zvolte si styl dvířek linky (zvolte jednu z možností)</p>
                <input id="smooth" name="cabtype" type="radio" value="smooth" required><label for="smooth">Hladká (+ 0 Kč)</label><br>
                <input id="frame" name="cabtype" type="radio" value="frame"><label for="frame">Rámová (+ 2 500 Kč)</label><br>
                <input id="glossy" name="cabtype" type="radio" value="glossy"><label for="glossy">Lesklá (+ 3 500 Kč)</label>
            </div>
        </section>
        <section>
            <h2>Vestavěné spotřebiče</h2>
            <div>
                <p>Vyberte podle vaší potřeby které spotřebiče budou vestavěné do vaší kuchyňské linky</p>
                <input id="oven" name="devices[]" type="checkbox" value="oven"><label for="oven">Trouba (+ 8 000 Kč)</label><br>
                <input id="hob" name="devices[]" type="checkbox" value="hob"><label for="hob">Varná deska (+ 6 000 Kč)</label><br>
                <input id="dishwasher" name="devices[]" type="checkbox" value="dishwasher"><label for="dishwasher">Myčka (+ 10 000 Kč)</label><br>
                <input id="microwave" name="devices[]" type="checkbox" value="microwave"><label for="microwave">Mikrovlnná trouba (+ 5 000 Kč)</label>
            </div>
        </section>
        <section>
            <h2>Montáž linky</h2>
            <div>
                <p>Zvolte zda si přejete zřízení montáže (zvolte jednu z možností)</p>
            <input id="yes" name="assembly" type="radio" value="yes" required><label for="yes">Ano (+ 5 000 Kč)</label><br>
            <input id="no" name="assembly" type="radio" value="no"><label for="no">Ne (+ 0 Kč)</label>
            </div>
        </section>
        <div id="submitDiv">
            <button type="submit">Dokončit výběr</button>
        </div>
    </form>
</body>
</html>