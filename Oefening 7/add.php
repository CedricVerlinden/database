<?php
include "./connect.php";
if (isset($_POST["back"])) {
    header("Location: index.php");
    return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<?php
if (isset($_POST["add"])) {
    if (empty($_POST["naam"]) || empty($_POST["voornaam"]) || empty($_POST["klas"]) || empty($_POST["straat"]) || empty($_POST["postcode"]) || empty($_POST["plaats"])) {
        header("Location: add.php");
        return;
    }

    $naam = $_POST["naam"];
    $voornaam = $_POST["voornaam"];
    $klas = $_POST["klas"];
    $straat = $_POST["straat"];
    $postcode = $_POST["postcode"];
    $plaats = $_POST["plaats"];

    $sql = "INSERT INTO leerlingen (naam, voornaam, klas, straat, postcode, plaats) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssssss", $naam, $voornaam, $klas, $straat, $postcode, $plaats);
    $stmt->execute();
    $stmt->close();

    echo 'Het record is successvol toegevoegd.';
    echo '<br><a href="index.php">Ga terug naar de lijst</a>';
    return;
}
?>

<body>
    <form action="add.php" method="post">
        <h1>Nieuw record toevoegen</h1>

        <input type="hidden" name="id">

        <label for="naam">Naam</label>
        <input type="text" name="naam">

        <label for="voornaam">Voornaam</label>
        <input type="text" name="voornaam">

        <label for="klas">Klas</label>
        <input type="text" name="klas">

        <label for="straat">Straat</label>
        <input type="text" name="straat">

        <label for="postcode">Postcode</label>
        <input type="text" name="postcode">

        <label for="plaats">Plaats</label>
        <input type="text" name="plaats">

        <input type="submit" name="add" value="Toevoegen">
        <input type="submit" name="back" value="Ga terug">
    </form>
</body>

</html>