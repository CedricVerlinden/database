<?php
include 'connect.php';

$sql = "SELECT * FROM tblafrekening ORDER BY tijd DESC;";
$resultSet = $connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afgerekend</title>
</head>
<body>
    <h1>Afgerekende bestellingen</h1>
    <table style="text-align:left">
        <tr>
            <th>Afrekening nummer</th>
            <th>Tafel nummer</th>
            <th>Totaal</th>
            <th>Betaalmethode</th>
            <th>Tijd</th>
        </tr>
    <?php
    while ($row = $resultSet->fetch_assoc()) {
        echo '
        <tr>
            <td>' . $row["afrekeningnummer"] . '</td>
            <td>' . $row["tafelnummer"] . '</td>
            <td>' . $row["totaal"] . '</td>
            <td>' . $row["betaalmethode"] . '</td>
            <td>' . $row["tijd"] . '</td>
        </tr>
        ';
    }
    echo '</table>';

    $sqlTotal = "SELECT COUNT(*) as total FROM tblafrekening;";
    $resultSet = $connection->query($sqlTotal);

    echo '
    <p>Totaal aantal afgerekende bestellingen: ' . $resultSet->fetch_assoc()["total"] . '</p>
    <br>
    ';
    ?>

    <a href="index.php">Ga terug</a>
</body>
</html>