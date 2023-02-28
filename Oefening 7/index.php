<?php
    include("connect.php");
    $sql = "SELECT * FROM tblLeerlingen";
    $result = $mysqli -> query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Leerlingen</title>
</head>
<body>
    <?php
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) == 0) {
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
            while ($row = $result -> fetch_assoc()) {
                echo '
                
                    <tr>
                        <td>' . $row["id"] . '</td>
                        <td>' . $row["naam"] . '</td>
                        <td>' . $row["voornaam"] . '</td>
                        <td>' . $row["klas"] . '</td>
                        <td>' . $row["straat"] . '</td>
                        <td>' . $row["postcode"] . '</td>
                        <td>' . $row["plaats"] . '</td>
                        <td><a class="wijzigen" href="wijzig.php?wijzigen=' . $row["id"] . '">Wijzigen</a></td>
                        <td><a class="verwijderen" href="verwijder.php?verwijderen=' . $row["id"] . '">Verwijderen</a></td>
                    </tr>
                
                ';
            }
        ?>
    </table>

    <a class="toevoegen" href="toevoegen.php">Voeg een record toe</a>
</body>
</html>