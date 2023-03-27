<?php
include 'connect.php';
if (!(isset($_GET["drank"]))) {
    header("Location:prijzen.php");
}

if (isset($_POST["prijs-aanpassen"])) {
    $sql = "UPDATE tbldrank SET prijs=? WHERE dranknummer=?;";
    $statement = $connection->prepare($sql);
    $statement->bind_param("ii", $_POST["prijs"], $_POST["drank"]);
    $statement->execute();

    echo '
    <h1>Prijs successvol aangepast.</h1>
    <a href="prijzen.php">Ga terug</a>
    ';
    return;
}

$sql = "SELECT * FROM tbldrank WHERE dranknummer=?";
$statement = $connection->prepare($sql);
$statement->bind_param("i", $_GET["drank"]);
$statement->execute();
$resultSet = $statement->get_result();
$row = $resultSet->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijzingen</title>
</head>
<body>
    <h1>Prijs aanpassen</h1>
    <form action="aanpassen.php?drank=<?php echo $row["dranknummer"] ?>" method="post">
        <input type="hidden" name="drank" value=<?php echo $row["dranknummer"] ?>>
        <label for="drank">Dranknummer</label>
        <?php echo $row["dranknummer"] ?>
        <br><br>

        <label for="prijs">Prijs</label>
        <input type="text" name="prijs" id="prijs" value="<?php echo $row["prijs"] ?>">
        <br><br>

        <input type="submit" name="prijs-aanpassen" value="Aanpassen">
    </form>
    <a href="prijzen.php">Ga terug</a>
</body>
</html>