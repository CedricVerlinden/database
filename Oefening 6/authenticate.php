<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Oefening 6 - Authenticatie</title>
</head>

<body>
    <?php
    if (!(isset($_POST["submit"]))) {
        header("Location:./index.php");
    }

    var_dump($_POST);
    switch ($_POST["user"]) {
        case "admin":
            if (!($_POST["password"] == "admin")) {
                header("Location:./index.php");
                break;
            }

            $_SESSION["user"] = $_POST["user"];
            header("Location:./redirect.php");
            break;
        case "gast":
            if (!($_POST["password"] == "wachtwoord")) {
                header("Location:./index.php");
                break;
            }

            $_SESSION["user"] = $_POST["user"];
            header("Location:./redirect.php");
            break;
        default:
            header("Location:./index.php");
            break;
    }
    ?>
</body>

</html>