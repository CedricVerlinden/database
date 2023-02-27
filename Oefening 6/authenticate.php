<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authenticatie</title>
</head>
<body>
    <?php
        if (isset($_POST["submit"])) {
            $_SESSION["user"] = $_POST["user"];
            $_SESSION["pass"] = $_POST["password"];

            if ($_SESSION["user"] == "admin" || $_SESSION["user"] == "gast") {
                switch ($_SESSION["user"]) {
                    case "admin":
                        if (!($_SESSION["pass"] == "admin")) {
                            echo "Deze gebruiker bestaat niet.";
                            break;
                        }
                        header("Location:./redirect.php");
                        break;
                    case "gast":
                        if (!($_SESSION["pass"] == "paswoord")) {
                            echo "Deze gebruiker bestaat niet.";
                            break;
                        }
                        header("Location:./redirect.php");
                        break;
                }
                return;
            }

        } else {
            header("Location:./home.php");
        }
    ?>
</body>
</html>