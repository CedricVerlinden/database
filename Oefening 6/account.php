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
        if (!(isset($_SESSION["user"]))) {
            echo "
    
                <p>Hallo, vreemdeling! Ik zie dat je niet bent ingelogd! Klik <a href=\"./home.php\">hier</a> om je in te loggen</p>
    
            ";
            return;
        }

        if ($_SESSION["user"] == "admin") {
            echo "

                <p>Hallo, admin! Deze website is nog in development, je kan hier binnenkort heel het internet hacken!</p>
                <p>Klik <a href=\"./logout.php\">hier</a> om uit te loggen</p>

            ";
            return;
        }

        if ($_SESSION["user"] == "gast") {
            echo "
    
                <p>Hallo, gast! Deze website is nog in development, je kan hier binnenkort heel het internet hacken!</p>
                <p>Klik <a href=\"./logout.php\">hier</a> om uit te loggen</p>
    
            ";
            return;
        }
    ?>
</body>
</html>