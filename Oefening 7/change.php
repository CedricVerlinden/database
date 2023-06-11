<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <title>Oefening 7 - Wijzig</title>
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

        $sql = "UPDATE leerlingen SET naam=?, voornaam=?, klas=?, straat=?, postcode=?, plaats=? WHERE id=?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ssssssi", $naam, $voornaam, $klas, $straat, $postcode, $plaats, $id);
        $stmt->execute();
        $stmt->close();

        echo 'Het record is successvol gewijzigd.';
        echo '<br><a href="index.php">Ga terug naar de lijst</a>';
        return;
    }

    $sql = "SELECT * FROM leerlingen WHERE id=" . $_GET["wijzigen"] . "";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();

    if ($row == null) {
        echo '<p>Het ID ' . $_GET["wijzigen"] . ' bestaat niet.</p>';
        return;
    }

    echo '
        <form action="change.php" method="post">
            <h1>Wijzig record nummer ' . $row["id"] . '</h1>

            <input type="hidden" name="id" value="' . $row["id"] . '">
            
            <label for="naam">Naam</label>
            <input type="text" name="naam" value="' . $row["naam"] . '">
            
            <label for="voornaam">Voornaam</label>
            <input type="text" name="voornaam" value="' . $row["voornaam"] . '">
            
            <label for="klas">Klas</label>
            <input type="text" name="klas" value="' . $row["klas"] . '">
            
            <label for="straat">Straat</label>
            <input type="text" name="straat" value="' . $row["straat"] . '">
            
            <label for="postcode">Postcode</label>
            <input type="text" name="postcode" value="' . $row["postcode"] . '">
            
            <label for="plaats">Plaats</label>
            <input type="text" name="plaats" value="' . $row["plaats"] . '">

            <input type="submit" name="wijzigen" value="Wijzig">
            <input type="submit" name="back" value="Ga terug">
        </form>
    ';
    ?>
</body>

</html>