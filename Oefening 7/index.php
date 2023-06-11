<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <title>Leerlingen</title>
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

    $sql = "SELECT * FROM leerlingen";
    $result = $mysqli->query($sql);

    if ($result->num_rows == 0) {
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
        while ($row = $result->fetch_assoc()) {
            echo '
                <tr>
                    <td>' . $row["id"] . '</td>
                    <td>' . $row["naam"] . '</td>
                    <td>' . $row["voornaam"] . '</td>
                    <td>' . $row["klas"] . '</td>
                    <td>' . $row["straat"] . '</td>
                    <td>' . $row["postcode"] . '</td>
                    <td>' . $row["plaats"] . '</td>
                    <td><a href="change.php?wijzigen=' . $row["id"] . '">Wijzigen</a></td>
                    <td><a href="delete.php?verwijderen=' . $row["id"] . '">Verwijderen</a></td>
                </tr>
            ';
        }
        ?>
    </table>

    <a class="toevoegen" href="add.php">Voeg een record toe</a>
</body>

</html>