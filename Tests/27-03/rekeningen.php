<?php
include 'connect.php';
include 'util.php';

$sql = "SELECT * FROM tblbestelling;";
$resultSet = $connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekeningen</title>
</head>
<body>
    <h1>Openstaande rekeningen</h1>
    <table>
        <tr>
            <th>Bestel nummer</th>
            <th>Tafel nummer</th>
            <th>Drank</th>
            <th>Aantal</th>
            <th>Totale prijs</th>
        </tr>
    <?php
    while ($row = $resultSet->fetch_assoc()) {
        echo '
        <tr>
            <td>' . $row["bestelnummer"] . '</td>
            <td>' . $row["tafelnummer"] . '</td>
            <td>' . getDrink($connection, $row["dranknummer"])["dranknaam"] . '</td>
            <td>' . $row["aantal"] . '</td>
            <td>€' . getDrink($connection, $row["dranknummer"])["prijs"] * $row["aantal"] . '</td>
        </tr>
        ';
    }
    echo '</table><br>';
    for ($i = 1; $i <= 5; $i++) {
        $sql = "SELECT * FROM tblbestelling WHERE tafelnummer=?;";
        $statement = $connection->prepare($sql);
        $statement->bind_param("i", $i);
        $statement->execute();
        $resultSet = $statement->get_result();

        $total = 0;
        while ($row = $resultSet->fetch_assoc()) {
            $total += getDrink($connection, $row["dranknummer"])["prijs"] * $row["aantal"];
        }

        if ($total == 0) {
            continue;
        }

        echo '
        Totaal voor tafel ' . $i . ': €' .$total . '
        <br>
        ';
        
    }
    ?>
    <a href="index.php">Ga terug</a>
</body>
</html>