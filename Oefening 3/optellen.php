<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optellen</title>
</head>
<body>
    
    <?php

    $a = rand(1, 10);
    $b = rand(1, 10);

    if (!(isset($_POST["button"]))) {
        echo '
        
            <h1>Optellen</h1>
            <form method="post" action="optellen.php">
                <p>' . $a . ' + ' . $b . '</p>
                <input type="text" name="solution" />
                <input type="hidden" name="value_a" value=' . $a .' />
                <input type="hidden" name="value_b" value=' . $b .' />
                <input type="submit" name="button" value="Controleer" />
            </form>

        ';

        return;
    }

    $solution = $_POST["value_a"] + $_POST["value_b"];

    if ($_POST["solution"] == $solution) {
        echo '

            <p>Dat is juist!</p>

            <form method="post" action="optellen.php">
            <input type="submit" name ="reset" value="Volgende oefening">
            </form>
        
        ';

        return;

    }

    echo '
    
        <p>Dat is helaas niet juist, het antwoord is ' . $solution . '</p>

        <form method="post" action="optellen.php">
        <input type="submit" name ="reset" value="Probeer het opnieuw">
        </form>

    ';

    ?>

</body>
</html>