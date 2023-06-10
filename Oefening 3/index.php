<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <title>Oefening 3 - Optellen</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="../Oefening 1/">Oefening 1</a></li>
            <li><a href="../Oefening 2/">Oefening 2</a></li>
            <li><a href="../Oefening 3/">Oefening 3</a></li>
            <li><a href="../Oefening 4/">Oefening 4</a></li>
            <li><a href="../Oefening 5/">Oefening 5</a></li>
        </ul>
    </nav>
    <?php
    $a = rand(1, 10);
    $b = rand(1, 10);

    if (!isset($_POST["button"])) {
    ?>
        <h1>Optellen</h1>
        <form action="index.php" method="post">
            <p><?= $a ?> + <?= $b ?></p>
            <input type="text" name="solution" />
            <input type="hidden" name="value_a" value="<?= $a ?>" />
            <input type="hidden" name="value_b" value="<?= $b ?>" />
            <input type="submit" name="button" value="Controleer" />
        </form>
    <?php
        return;
    }

    $solution = $_POST["value_a"] + $_POST["value_b"];

    if ($_POST["solution"] == $solution) {
    ?>
        <p>Dat is juist!</p>
        <form action="index.php" method="post">
            <input type="submit" name="reset" value="Volgende oefening">
        </form>
    <?php
        return;
    }

    ?>

    <p>Dat is helaas niet juist, het antwoord is <?= $solution ?></p>
    <form action="index.php" method="post">
        <input type="submit" name="reset" value="Probeer het opnieuw">
    </form>
    <?php
    ?>
</body>

</html>