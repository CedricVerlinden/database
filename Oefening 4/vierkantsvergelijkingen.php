<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vierkantsvergelijkingen</title>
</head>
<body>
    <?php
        if (!(isset($_POST["controleren"]))) {
        echo '
            
                <form method="post" action="vierkantsvergelijkingen.php">
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

            ';

            return;
        }

        $a = $_POST["input_a"];
        $b = $_POST["input_b"];
        $c = $_POST["input_c"];

        // calculate discriminant (D = b² - 4ac)
        $discriminant = pow($b, 2) - 4 * $a * $c;
        
        if ($discriminant < 0) {
            echo '
            
                <p>De opgave was ' . $a . 'x<sup>2</sup> ' . $b . 'x ' . $c . ' = 0</p>

                <p>D = ' . $discriminant . '</p>

                <p>Geen oplossing want de discriminant is negatief.</p>

                <form method="post" action="vierkantsvergelijkingen.php">
                    <input type="submit" name="reset" value="Een andere oefening ingeven" />
                </form>
            
            ';

            return;
        }

        if ($discriminant == 0) {

            // (-b - sqrt(D))/(a²)
            $discriminantIsZero = (-($b)) / (2 * $a);

            echo '
            
                <p>De opgave was ' . $a . 'x<sup>2</sup> ' . $b . 'x ' . $c . ' = 0</p>

                <p>D = ' . $discriminant . '</p>

                <p>x = ' . $discriminantIsZero . '</p>

                <form method="post" action="vierkantsvergelijkingen.php">
                    <input type="submit" name="reset" value="Een andere oefening ingeven" />
                </form>
            
            ';

            return;
        }

        $discriminantHasTwoPlus = (-($b) + sqrt($discriminant)) / (2 * $a);
        $discriminantHasTwoMinus = (-($b) - sqrt($discriminant)) / (2 * $a);

        echo '
        
            <p>De opgave was ' . $a . 'x<sup>2</sup> ' . $b . 'x ' . $c . ' = 0</p>

            <p>D = ' . $discriminant . '</p>

            <p>x<sub>1</sub> = ' . $discriminantHasTwoPlus . '</p>
            <p>x<sub>2</sub> = ' . $discriminantHasTwoMinus . '</p>

            <form method="post" action="vierkantsvergelijkingen.php">
                <input type="submit" name="reset" value="Een andere oefening ingeven" />
            </form>
        
        ';

    ?>
</body>
</html>