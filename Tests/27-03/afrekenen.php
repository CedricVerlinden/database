<?php
include 'connect.php';
include 'util.php';

if (isset($_POST["afrekenen"])) {
    $sql = "SELECT * FROM tblbestelling WHERE tafelnummer=?;";
    $statement = $connection->prepare($sql);
    $statement->bind_param("i", $_POST["tafel"]);
    $statement->execute();
    $resultSet = $statement->get_result();

    if ($resultSet->num_rows == 0) {
        echo 'Dit is geen geldige tafel. <a href="afrekenen.php">Ga terug</a>';
        return;
    }
    
    $total = 0;
    while ($row = $resultSet->fetch_assoc()) {
        $total += getDrink($connection, $row["dranknummer"])["prijs"];
        echo '
        <h1>Successvol afgerekend</h1>
        <p>Drank: ' . getDrink($connection, $row["dranknummer"])["dranknaam"] . ' | 
        Prijs: €' . getDrink($connection, $row["dranknummer"])["prijs"] . '</p>
        ';
    }

    $sql = "INSERT INTO tblafrekening (tafelnummer, totaal, betaalmethode) VALUES(?,?,?);";
    $statement = $connection->prepare($sql);
    $statement->bind_param("iis", $_POST["tafel"], $total, $_POST["betaalmethode"]);
    $statement->execute();

    $sqlDel = "DELETE FROM tblbestelling WHERE tafelnummer=?";
    $statement = $connection->prepare($sqlDel);
    $statement->bind_param("i", $_POST["tafel"]);
    $statement->execute();

    echo '
    <p>Totaal: €' . $total . '</p>
    <a href="afrekenen.php">Ga terug</a>
    ';
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afrekenen</title>
</head>
<body>
    <form action="afrekenen.php" method="post">
        <label for="tafel">Tafel</label>
        <input type="number" name="tafel" id="tafel" min=1>
        <br><br>

        <label for="betaalmethode">Betaal methode</label>
        <select name="betaalmethode" id="betaalmethode">
            <option value="cash">Cash</option>
            <option value="bankkaart">Bankkaart</option>
            <option value="payconiq">PayConiq</option>
        </select>
        <br><br>
        <input type="submit" name="afrekenen" value="Afrekenen">
    </form>    
    <a href="index.php">Ga terug</a>
</body>
</html>