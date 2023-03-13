<?php
    include("connect.php");
    
    $leerlingen = "SELECT * FROM tblLeerlingen";

    $leerlingenResult = $mysqli -> query($leerlingen);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Leerlingen (meerdere tabellen)</title>
</head>
<body>
    <?php
    $leerlingenResult = mysqli_query($mysqli, $leerlingen);
    
    if (mysqli_num_rows($leerlingenResult) == 0) {
        echo '
            <p>Er zijn geen data entries in de database.</p>
            <a class="toevoegen" href="toevoegen.php">Voeg een record toe</a>
        ';
        return;
    }

    ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Voornaam</th>
            <th>Klas</th>
            <th>Straat</th>
            <th>Postcode</th>
            <th>Plaats</th>
        </tr>

        <?php
            $id = -1;
            $postcode = "";
            while ($leerlingenRow = $leerlingenResult -> fetch_assoc()) {
                echo '
                
                    <tr>
                        <td>' . $leerlingenRow["id"] . '</td>
                        <td>' . $leerlingenRow["naam"] . '</td>
                        <td>' . $leerlingenRow["voornaam"] . '</td>
                        <td>' . $leerlingenRow["klas"] . '</td>
                        <td>' . $leerlingenRow["straat"] . '</td>
                        <td>' . $leerlingenRow["postcode"] . '</td>
                
                ';

                $postcode = "SELECT * FROM tblpostcode WHERE postcode='" . $leerlingenRow["postcode"] . "'";
                $postcodeResult = $mysqli -> query($leerlingen);
                $postcodeResult = mysqli_query($mysqli, $postcode);

                if (mysqli_num_rows($postcodeResult) == 0) {
                    echo '
                        <p>Er zijn geen data entries in de postcode tabel.</p>
                        <a class="toevoegen" href="toevoegen.php">Voeg een record toe</a>
                    ';
                    return;
                }
                
                while ($postcodeRow = $postcodeResult -> fetch_assoc()) {
                    echo '
                            <td>' . $postcodeRow["plaats"] . '</td>
                            <td><a class="wijzigen" href="wijzig.php?wijzigen=' . $leerlingenRow["id"] . '">Wijzigen</a></td>
                            <td><a class="verwijderen" href="verwijder.php?verwijderen=' . $leerlingenRow["id"] . '">Verwijderen</a></td>
                        </tr>
                    ';
                }
            }
        ?>
    </table>

    <a class="toevoegen" href="toevoegen.php">Voeg een record toe</a>
</body>
</html>