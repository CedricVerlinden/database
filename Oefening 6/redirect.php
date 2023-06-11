<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <title>Account</title>
</head>

<body>
    <?php
    if (!(isset($_SESSION["user"]))) {
        header("Location:./index.php");
    }

    if ($_SESSION["user"] == "admin") {
        echo "Je bent succesvol ingelogd als <b>admin</b>! Klik <a href=\"account.php\">hier</a> om te redirecten naar de account pagina.";
        return;
    }

    if ($_SESSION["user"] == "gast") {
        echo "Je bent succesvol ingelogd als <b>gast</b>! Klik <a href=\"account.php\">hier</a> om te redirecten naar de account pagina.";
        return;
    }
    ?>
</body>

</html>