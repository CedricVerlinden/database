<?php
include "connect.php";

if (isset($_POST["back"])) {
    header("Location: index.php");
    return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <title>Toevoegen</title>
</head>

<body>
    <?php

    if (isset($_POST["submitPostcode"])) {
        if (empty($_POST["naam"]) || empty($_POST["voornaam"]) || empty($_POST["klas"]) || empty($_POST["straat"]) || empty($_POST["postcode"])) {
            header("Location: ./toevoegen.php");
            return;
        }

        $postcode = "SELECT * FROM postcode WHERE postcode='" . $_POST["postcode"] . "'";
        $postcodeResult = $mysqli->query($postcode);
        $postcodeResult = mysqli_query($mysqli, $postcode);
        $row = $postcodeResult->fetch_assoc();

        if (!($row == null)) {
            echo '
            <form action="add.php" method="post">
                <p>Zo te zien bestaat deze postcode al, je hoeft ze niet meer toe te voegen!</p>
                <input type="hidden" name="naam" value="' . $_POST["naam"] . '">
                <input type="hidden" name="voornaam" value="' . $_POST["voornaam"] . '">
                <input type="hidden" name="klas" value="' . $_POST["klas"] . '">
                <input type="hidden" name="straat" value="' . $_POST["straat"] . '">
                <input type="hidden" name="postcode" value="' . $_POST["postcode"] . '">
                <input type="hidden" name="plaats" value="' . $row["plaats"] . '">
                <input type="submit" name="submit" value="Volgende">
            </form>
            ';
            return;
        }

        echo '
            <form action="add.php" method="post">  
                <input type="hidden" name="naam" value="' . $_POST["naam"] . '">
                <input type="hidden" name="voornaam" value="' . $_POST["voornaam"] . '">
                <input type="hidden" name="klas" value="' . $_POST["klas"] . '">
                <input type="hidden" name="straat" value="' . $_POST["straat"] . '">
                <input type="hidden" name="postcode" value="' . $_POST["postcode"] . '">
                
                <h1>Postcode record toevoegen</h1>
                
                <label for="postcode">Postcode</label>
                <input type="text" name="postcode" value="' . $_POST["postcode"] . '" readonly>
                
                <label for="plaats">Plaats</label>
                <input type="text" name="plaats" required>
                
                <input type="submit" name="submit" value="Toevoegen">
            </form>
        ';
        return;
    }

    if (isset($_POST["submit"])) {
        $naam = $_POST["naam"];
        $voornaam = $_POST["voornaam"];
        $klas = $_POST["klas"];
        $straat = $_POST["straat"];
        $postcode = $_POST["postcode"];
        $plaats = $_POST["plaats"];

        $leerlingen = "INSERT INTO leerlingen (naam, voornaam, klas, straat, postcode) VALUES ('" . $naam . "', '" . $voornaam . "', '" . $klas . "', '" . $straat . "', '" . $postcode . "');";
        $postcode = "INSERT IGNORE INTO postcode (postcode, plaats) VALUES ('" . $postcode . "', '" . $plaats . "');";

        if (($mysqli->query($leerlingen) && $mysqli->query($postcode))) {
            echo 'Het record voor ' . $voornaam . ' is succesvol toegevoegd.';
        } else {
            echo "Er is een fout bij het toevoegen van dit record.";
        }

        echo '<br><a href="index.php">Ga terug naar de lijst</a>';
        return;
    }

    ?>

    <form action="add.php" method="post">
        <h1>Leerling record toevoegen</h1>

        <label for="naam">Naam</label>
        <input type="text" name="naam">

        <label for="voornaam">Voornaam</label>
        <input type="text" name="voornaam">

        <label for="klas">Klas</label>
        <input type="text" name="klas">

        <label for="straat">Straat</label>
        <input type="text" name="straat">

        <label for="postcode">Postcode</label>
        <input type="text" name="postcode">

        <input type="submit" name="submitPostcode" value="Toevoegen">
        <input type="submit" name="back" value="Ga terug">

    </form>
</body>

</html>