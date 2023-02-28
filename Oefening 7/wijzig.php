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
            $sql = "UPDATE tblLeerlingen SET naam='" . $naam . "', voornaam='" . $voornaam . "', klas='" . $klas . "', straat='" . $straat . "', postcode='" . $postcode ."', plaats='" . $plaats . "'";

            if ($mysqli->query($sql)) {
                echo 'Het record is successvol gewijzigd.';
            } else {
                echo "Er is een fout bij het verwijderen van dit record.";
            }

            echo '<br><a href="index.php">Ga terug naar de lijst</a>';
            return;
        }

        $sql = "SELECT * FROM tblLeerlingen WHERE id=" . $_GET["wijzigen"] ."";
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();

        if ($row == null) {
            echo '<p>Het ID ' . $_GET["wijzigen"] . ' bestaat niet.</p>';
            return;
        }

        echo '
            <table>
                <form action="wijzig.php" method="post">
                    <tr><td>ID</td>         <td>' . $row["id"] . ' <input type="hidden" name="id" value="' . $row["naam"] . '"</td></tr>
                    <tr><td>Naam</td>       <td><input type="text" name="naam" value="' . $row["naam"] . '"</td></tr>
                    <tr><td>Voornaam</td>   <td><input type="text" name="voornaam" value="' . $row["voornaam"] . '"</td></tr>
                    <tr><td>Klas</td>       <td><input type="text" name="klas" value="' . $row["klas"] . '"</td></tr>
                    <tr><td>Straat</td>     <td><input type="text" name="straat" value="' . $row["straat"] . '"</td></tr>
                    <tr><td>Postcode</td>   <td><input type="text" name="postcode" value="' . $row["postcode"] . '"</td></tr>
                    <tr><td>Plaats</td>     <td><input type="text" name="plaats" value="' . $row["plaats"] . '"</td></tr>

                    <tr><td><input type="submit" name="back" value="Ga terug"><input class="wijzig" type="submit" name="wijzigen" value="Wijzig"></td></tr>
                </form>
            </table>
        ';
    ?>
</body>
</html>