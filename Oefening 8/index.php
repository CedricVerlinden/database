<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <title>Leerlingen (meerdere tabellen)</title>
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

    <?php
    include "./connect.php";

    $leerlingen = "SELECT * FROM leerlingen";
    $leerlingenResult = $mysqli->query($leerlingen);

    if ($leerlingenResult->num_rows == 0) {
        echo '
            <p>Er zijn geen data entries in de database.</p>
            <a class="toevoegen" href="add.php">Voeg een record toe</a>
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
            <th></th>
            <th></th>
        </tr>

        <?php
        $id = -1;
        $postcode = "";
        while ($leerlingenRow = $leerlingenResult->fetch_assoc()) {
            echo '
                
                    <tr>
                        <td>' . $leerlingenRow["id"] . '</td>
                        <td>' . $leerlingenRow["naam"] . '</td>
                        <td>' . $leerlingenRow["voornaam"] . '</td>
                        <td>' . $leerlingenRow["klas"] . '</td>
                        <td>' . $leerlingenRow["straat"] . '</td>
                        <td>' . $leerlingenRow["postcode"] . '</td>
                
                ';

            $postcode = "SELECT * FROM postcode WHERE postcode='" . $leerlingenRow["postcode"] . "'";
            $postcodeResult = $mysqli->query($leerlingen);
            $postcodeResult = mysqli_query($mysqli, $postcode);

            if (mysqli_num_rows($postcodeResult) == 0) {
                echo '
                        <p>Er zijn geen data entries in de postcode tabel.</p>
                        <a class="toevoegen" href="add.php">Voeg een record toe</a>
                    ';
                return;
            }

            while ($postcodeRow = $postcodeResult->fetch_assoc()) {
                echo '
                            <td>' . $postcodeRow["plaats"] . '</td>
                            <td><a class="wijzigen" href="change.php?wijzigen=' . $leerlingenRow["id"] . '">Wijzigen</a></td>
                            <td><a class="verwijderen" href="delete.php?verwijderen=' . $leerlingenRow["id"] . '">Verwijderen</a></td>
                        </tr>
                    ';
            }
        }
        ?>
    </table>

    <a class="toevoegen" href="add.php">Voeg een record toe</a>
</body>

</html>