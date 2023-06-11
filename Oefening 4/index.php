<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <title>Oefening 4 - Vierkantsvergelijkingen</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="../Oefening 1/">Oefening 1</a></li>
            <li><a href="../Oefening 2/">Oefening 2</a></li>
            <li><a href="../Oefening 3/">Oefening 3</a></li>
            <li><a href="../Oefening 4/">Oefening 4</a></li>
            <li><a href="../Oefening 5/">Oefening 5</a></li>
            <li><a href="../Oefening 6/">Oefening 6</a></li>
            <li><a href="../Oefening 7/">Oefening 7</a></li>
            <li><a href="../Oefening 8/">Oefening 8</a></li>
        </ul>
    </nav>
    <h1>Vierkantsvergelijkingen</h1>
    <?php
    if (!isset($_POST["controleren"])) {
        echo '
        <form action="index.php" method="post">
            <input type="number" name="input_a" required>
            x<sup>2</sup>+
            <input type="number" name="input_b" required>
            x +
            <input type="number" name="input_c" required>
            = 0
            <br />
            <input type="submit" name="controleren" value="Controleren" />
            <input type="submit" name="reset" value="Reset" />
        </form>
        ' . (isset($_POST["reset"]) ? '' : '');
    }

    if (isset($_POST["controleren"])) {
        $a = $_POST["input_a"];
        $b = $_POST["input_b"];
        $c = $_POST["input_c"];

        // calculate discriminant (D = b² - 4ac)
        $discriminant = pow($b, 2) - 4 * $a * $c;

        echo '
        <p>De opgave was ' . $a . 'x<sup>2</sup> ' . $b . 'x ' . $c . ' = 0</p>
        <p>D = ' . $discriminant . '</p>
        ';

        echo ($discriminant < 0) ? '
        <p>Geen oplossing want de discriminant is negatief.</p>
        <form action="index.php" method="post">
            <input type="submit" name="reset" value="Een andere oefening ingeven" />
        </form>
    ' : (($discriminant == 0) ? '
        <p>x = ' . (- ($b)) / (2 * $a) . '</p>
        <form action="index.php" method="post">
            <input type="submit" name="reset" value="Een andere oefening ingeven" />
        </form>
    ' : '
        <p>x<sub>1</sub> = ' . (- ($b) + sqrt($discriminant)) / (2 * $a) . '</p>
        <p>x<sub>2</sub> = ' . (- ($b) - sqrt($discriminant)) / (2 * $a) . '</p>
        <form action="index.php" method="post">
            <input type="submit" name="reset" value="Een andere oefening ingeven" />
        </form>
    ');
    }
    ?>
</body>

</html>