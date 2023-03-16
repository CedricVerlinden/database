<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0489e35579.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/account/index.css">
    <link rel="stylesheet" href="../../assets/css/header.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <title>Account - Store</title>
</head>
<body>
<div class="container">
        <div class="navigation">
            <h1><a href="../">Store</a></h1>
            <div class="nav-links">
                <ul class="link-list">
                    <li><a class="selected" href="./">Overview</a></li>
                    <li><a href="./settings.php">Settings</a></li>
                </ul>
            </div>
            <div class="navigation-right">
                <?php
                if (isset($_SESSION["userid"])) {
                    if ($_SESSION["admin"] == 1) {
                        echo '<a href="admin/"><i class="fa-solid fa-gear"></i></a>';
                    }
                    echo '
                        <a href="account/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                        <a href="account/"><i class="fa-solid fa-user"></i></a>
                        <a href="includes/logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                    ';
                } else {
                    echo '
                    <form action="login.php" method="post">
                        <button>Log in</button>
                    </form>
                    ';
                }
                ?>
            </div>
        </div>
</body>
</html>