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
    <title>Toevoegen</title>
</head>
<body>

<?php

    if (isset($_POST["submitPostcode"])) {
        $postcode = "SELECT * FROM tblpostcode WHERE postcode='" . $_POST["postcode"] . "'";
        $postcodeResult = $mysqli -> query($postcode);
        $postcodeResult = mysqli_query($mysqli, $postcode);
        $row = $postcodeResult->fetch_assoc();

        if (!($row == null)) {
            echo $row["plaats"];
            echo '
            <form action="toevoegen.php" method="post">
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
        <p>Postcode record toevoegen</p>
        <table>
            <form action="toevoegen.php" method="post">
                
                <tr><td><input type="hidden" name="naam" value="' . $_POST["naam"] . '"></td></tr>
                <tr><td><input type="hidden" name="voornaam" value="' . $_POST["voornaam"] . '"></td></tr>
                <tr><td><input type="hidden" name="klas" value="' . $_POST["klas"] . '"></td></tr>
                <tr><td><input type="hidden" name="straat" value="' . $_POST["straat"] . '"></td></tr>
                <tr><td><input type="hidden" name="postcode" value="' . $_POST["postcode"] . '"></td></tr>
                <tr><td>Postcode</td>   <td><input type="text" name="postcode" value="' . $_POST["postcode"] . '"required></td></tr>
                <tr><td>Plaats</td>     <td><input type="text" name="plaats" required></td></tr>
                <tr><td colspan=2> <input type="submit" name="submit" value="Toevoegen" required></td></tr>
            </form>
        </table>
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

        $leerlingen = "INSERT INTO tblLeerlingen (naam, voornaam, klas, straat, postcode) VALUES ('" . $naam . "', '" . $voornaam . "', '" . $klas ."', '" . $straat . "', '" . $postcode . "');";
        $postcode = "INSERT IGNORE INTO tblpostcode (postcode, plaats) VALUES ('" . $postcode . "', '" . $plaats . "');";

        if (($mysqli->query($leerlingen) && $mysqli->query($postcode))) {
            echo 'Het record voor ' . $voornaam . ' is succesvol toegevoegd.';
        } else {
            echo "Er is een fout bij het toevoegen van dit record.";
        }

        echo '<br><a href="index.php">Ga terug naar de lijst</a>';
        return;
    }

    ?>

    <p>Leerling record toevoegen</p>
    <table>
        <form action="toevoegen.php" method="post">
            <tr><td>Naam</td>       <td><input type="text" name="naam" required></td></tr>
            <tr><td>Voornaam</td>   <td><input type="text" name="voornaam" required></td></tr>
            <tr><td>Klas</td>       <td><input type="text" name="klas" required></td></tr>
            <tr><td>Straat</td>     <td><input type="text" name="straat" required></td></tr>
            <tr><td>Postcode</td>   <td><input type="text" name="postcode" required></td></tr>
            <tr><td colspan=2> <input type="submit" name="submitPostcode" value="Toevoegen" required></td></tr>
        </form>
    </table>
</body>
</html>