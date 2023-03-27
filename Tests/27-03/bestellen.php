<?php
include 'connect.php';

if (isset($_POST["bestelling-toevoegen"])) {
    $sql = "INSERT INTO tblbestelling (tafelnummer, dranknummer, aantal) VALUES (?,?,?);";
    $statement = $connection->prepare($sql);
    $statement->bind_param("iii", $_POST["tafelnummer"], $_POST["drank"], $_POST["aantal"]);
    $statement->execute();

    echo '
    <h1>Bestelling successvol toegevoegd.</h1>
    <a href="index.php">Ga terug</a>
    ';
    return;
}

$sql = "SELECT * FROM tbldrank;";
$resultSet = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellen</title>
</head>
<body>
    <h1>Bestelling aanmaken</h1>
    <form action="bestellen.php" method="post">
        <label for="tafelnummer">Tafelnummer</label>
        <br>
        <select name="tafelnummer" id="tafelnummer">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br><br>

        <label for="drank">Drank</label>
        <br>
        <select name="drank" id="drank">
            <?php
            while ($row = $resultSet->fetch_assoc()) {
                echo '
                <option value="' . $row["dranknummer"] . '">' . $row["dranknaam"] . '</option>
                ';
            }
            ?>
        </select>
        <br><br>

        <label for="aantal">Aantal dranken</label>
        <input type="number" name="aantal" id="aantal" min=1 required>
        <br><br>

        <input type="submit" name="bestelling-toevoegen" value="Bevestigen">
    </form>
    <a href="index.php">Ga terug</a>
</body>
</html>