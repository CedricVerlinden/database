<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <title>Oefening 5 - Rekenoefeningen</title>
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
    <h1>Rekenoefeningen</h1>
    <?php

    if (!isset($_SESSION["score"])) {
        $_SESSION["score"] = 0;
    }

    if (!isset($_SESSION["count"])) {
        $_SESSION["count"] = 0;
    }

    if (isset($_POST['submit'])) {
        $solution = $_POST["answer"];
        $correct_answer = $_SESSION["correct_answer"];

        if ($solution == $correct_answer) {
            $_SESSION["score"]++;
        }

        $_SESSION["count"]++;

        if ($_SESSION["count"] >= 10) {
            session_destroy();
            echo "
            <form action='index.php' method='post'>
                <p>Eindresultaat: " . $_SESSION["score"] . "/10</p>
                <input type='submit' name='reset' value='Reset'>
            </form>
            ";
            exit;
        }
    }

    $getal1 = rand(0, 100);
    $getal2 = rand(0, 100);
    $bewerkingen = array("+", "-", "*", "/");
    $bewerking = $bewerkingen[array_rand($bewerkingen)];

    $uitkomst = 0;
    switch ($bewerking) {
        case "+":
            $uitkomst = $getal1 + $getal2;
            break;
        case "-":
            $uitkomst = $getal1 - $getal2;
            break;
        case "*":
            $uitkomst = $getal1 * $getal2;
            break;
        case "/":
            while ($getal2 == 0) {
                $getal2 = rand(0, 100);
            }

            $uitkomst = floor($getal1 / $getal2);
            break;
    }

    $_SESSION["correct_answer"] = $uitkomst;

    ?>

    <form action="" method="post">
        <p>Oefening <?php echo $_SESSION["count"] + 1; ?></p>
        <?php echo $getal1 . " " . $bewerking . " " . $getal2 . " = "; ?>
        <input type="text" name="answer" autofocus>
        <input type="submit" name="submit" value="Volgende">
    </form>
</body>

</html>