<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Wijzig</title>
</head>

<body>
    <?php
    if (isset($_POST["back"])) {
        header("Location: index.php");
        return;
    }

    if (isset($_POST["wijzigen"])) {
        $id = $_POST["id"];
        $naam = $_POST["naam"];
        $voornaam = $_POST["voornaam"];
        $klas = $_POST["klas"];
        $straat = $_POST["straat"];
        $postcode = $_POST["postcode"];
        $plaats = $_POST["plaats"];

        $leerlingen = "UPDATE leerlingen SET naam='" . $naam . "', voornaam='" . $voornaam . "', klas='" . $klas . "', straat='" . $straat . "', postcode='" . $postcode . "' WHERE id='" . $id . "';";

        if ($mysqli->query($leerlingen)) {
            echo 'Het record is successvol gewijzigd.';
        } else {
            echo "Er is een fout bij het verwijderen van dit record.";
        }

        echo '<br><a href="index.php">Ga terug naar de lijst</a>';
        return;
    }

    $leerlingen = "SELECT * FROM leerlingen WHERE id=" . $_GET["wijzigen"] . "";
    $leerlingenResult = $mysqli->query($leerlingen);
    $leerlingenRow = $leerlingenResult->fetch_assoc();

    if ($leerlingenRow == null) {
        echo '<p>Het ID ' . $_GET["wijzigen"] . ' bestaat niet.</p>';
        return;
    }

    $postcode = "SELECT * FROM postcode WHERE postcode=" . $leerlingenRow["postcode"] . "";
    $postcodeResult = $mysqli->query($postcode);
    $postcodeRow = $postcodeResult->fetch_assoc();

    echo '
        <form action="change.php" method="post">
            <input type="hidden" name="id" value="' . $leerlingenRow["id"] . '">

            <h1>Wijzig record nummer ' . $leerlingenRow["id"] . '</h1>
            
            <label for="voornaam">Voornaam</label>
            <input type="text" name="naam" value="' . $leerlingenRow["naam"] . '">

            <label for="voornaam">Voornaam</label>
            <input type="text" name="voornaam" value="' . $leerlingenRow["voornaam"] . '">
            
            <label for="klas">Klas</label>
            <input type="text" name="klas" value="' . $leerlingenRow["klas"] . '">
            
            <label for="straat">Straat</label>
            <input type="text" name="straat" value="' . $leerlingenRow["straat"] . '">
            
            <label for="postcode">Postcode</label>
            <input type="text" name="postcode" value="' . $leerlingenRow["postcode"] . '">
            
            <label for="plaats">Plaats</label>
            <input type="text" name="plaats" value="' . $postcodeRow["plaats"] . '">

            <input type="submit" name="wijzigen" value="Wijzig">
            <input type="submit" name="back" value="Ga terug">
        </form>
    ';
    ?>
</body>

</html>