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

            $leerlingen = "UPDATE tblleerlingen SET naam='" . $naam . "', voornaam='" . $voornaam . "', klas='" . $klas . "', straat='" . $straat . "', postcode='" . $postcode ."' WHERE id='" . $id . "';";
            $postcode = "UPDATE IGNORE tblpostcode SET postcode='" . $postcode . "', plaats='" . $plaats . "';";

            if ($mysqli->query($leerlingen) && $mysqli->query($postcode)) {
                echo 'Het record is successvol gewijzigd.';
            } else {
                echo "Er is een fout bij het verwijderen van dit record.";
            }

            echo '<br><a href="index.php">Ga terug naar de lijst</a>';
            return;
        }

        $leerlingen = "SELECT * FROM tblLeerlingen WHERE id=" . $_GET["wijzigen"] ."";
        $leerlingenResult = $mysqli->query($leerlingen);
        $leerlingenRow = $leerlingenResult->fetch_assoc();

        if ($leerlingenRow == null) {
            echo '<p>Het ID ' . $_GET["wijzigen"] . ' bestaat niet.</p>';
            return;
        }
        
        $postcode = "SELECT * FROM tblpostcode WHERE postcode=" . $leerlingenRow["postcode"] ."";
        $postcodeResult = $mysqli->query($postcode);
        $postcodeRow = $postcodeResult->fetch_assoc();

        echo '
            <table>
                <form action="wijzig.php" method="post">
                    <tr><td>ID</td>         <td>' . $leerlingenRow["id"] . ' <input type="hidden" name="id" value="' . $leerlingenRow["id"] . '"</td></tr>
                    <tr><td>Naam</td>       <td><input type="text" name="naam" value="' . $leerlingenRow["naam"] . '"</td></tr>
                    <tr><td>Voornaam</td>   <td><input type="text" name="voornaam" value="' . $leerlingenRow["voornaam"] . '"</td></tr>
                    <tr><td>Klas</td>       <td><input type="text" name="klas" value="' . $leerlingenRow["klas"] . '"</td></tr>
                    <tr><td>Straat</td>     <td><input type="text" name="straat" value="' . $leerlingenRow["straat"] . '"</td></tr>
                    <tr><td>Postcode</td>   <td><input type="text" name="postcode" value="' . $leerlingenRow["postcode"] . '"</td></tr>
                    <tr><td>Plaats</td>     <td><input type="text" name="plaats" value="' . $postcodeRow["plaats"] . '"</td></tr>

                    <tr><td><input type="submit" name="back" value="Ga terug"><input class="wijzig" type="submit" name="wijzigen" value="Wijzig"></td></tr>
                </form>
            </table>
        ';
    ?>
</body>
</html>