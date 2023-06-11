<?php
include "connect.php";
$sql = "DELETE FROM leerlingen WHERE id=" . $_GET["verwijderen"] . "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Verwijderen</title>
</head>

<body>
    <?php
    if ($mysqli->query($sql)) {
        echo "Dit record is successvol verwijderd.";
    } else {
        echo "Er is een fout bij het verwijderen van dit record.";
    }

    $mysqli->close();
    echo '<br><a href="index.php">Ga terug naar de lijst</a>';
    ?>
</body>

</html>