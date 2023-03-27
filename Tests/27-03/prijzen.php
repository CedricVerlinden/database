<?php
include 'connect.php';

$sql = "SELECT * FROM tbldrank;";
$resultSet = $connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijzen</title>
</head>
<body>
    <table>
        <tr>
            <th>Drank nummer</th>
            <th>Drank naam</th>
            <th>Prijs</th>
        </tr>
        <?php
        while($row = $resultSet->fetch_assoc()) {
            echo '
            <tr>
                <td>' . $row["dranknummer"] . '</td>
                <td>' . $row["dranknaam"] . '</td>
                <td>' . $row["prijs"] . '</td>
                <td><a href="aanpassen.php?drank=' . $row["dranknummer"] . '">Wijzigen</a></td>
            </tr>
            ';
        }
        ?>
    </table>
    <a href="index.php">Ga terug</a>
</body>
</html>