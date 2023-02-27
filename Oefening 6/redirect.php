<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
</head>
<body>
    <?php
        if ($_SESSION["user"] == "admin") {
            echo "Je bent succesvol ingelogd als <b>admin</b>! Klik <a href=\"account.php\">hier</a> om te redirecten naar de account pagina.";
        } else if ($_SESSION["user"] == "gast") {
            echo "Je bent succesvol ingelogd als <b>gast</b>! Klik <a href=\"account.php\">hier</a> om te redirecten naar de account pagina.";
        } else {
            header("Location:./home.php");
        }
    ?>
</body>
</html>