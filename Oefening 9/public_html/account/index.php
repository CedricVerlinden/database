<?php
session_start();

if (!(isset($_SESSION["userid"]))) {
    header("Location: ../index.php");
    return;
}
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
    <link rel="stylesheet" href="../../assets/css/buttons.css">
    <title>Account - Store</title>
</head>
<body>
    <div class="container">
        <div class="navigation">
            <div class="navigation-left">
                <h1><a href="../">Store</a></h1>
            </div>
            <div class="categories">
                <ul class="category-list">
                    <li><a href="">Account</a></li>
                    <li><a href="./orders.php">Orders</a></li>
                </ul>
            </div>
            <div class="navigation-right">
                <?php
                if ($_SESSION["admin"] == 1) {
                    echo '<a href="../admin/"><i class="fa-solid fa-gear"></i></a>';
                }
                echo '
                    <a href="./cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href=""><i class="fa-solid fa-user"></i></a>
                    <a href="./logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                ';
                ?>
            </div>
        </div>

        <div class="content">
            <div class="personal-information-wrapper">
                <h1>Personal Information</h1>
                <div class="personal-information">
                    <form action="./index.php">
                        <div class="input">
                            <div class="left">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email">

                                <label for="country">Country</label>
                                <input type="text" name="country" id="country">

                                <label for="street">Street</label>
                                <input type="text" name="street" id="street">
                            </div>
                            <div class="right">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password">

                                <label for="state">State</label>
                                <input type="text" name="state" id="state">

                                <label for="house-number">House Number</label>
                                <input type="text" name="house-number" id="house-number">
                            </div>
                        </div>
                        <input class="button" type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>

        <footer>
            <div class="footer-top">
                <div class="footer-left">
                    <h2>Store</h2>
                    <p>This is WILL be the successor of Steam with much greater UI design.</p>
                </div>
                <div class="footer-right">
                    <div class="footer-column">
                        <h3>Company</h3>
                        <ul>
                            <li><a href="#">About Store</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Support</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h3>Website</h3>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="categories/games.php">Games</a></li>
                            <li><a href="categories/components.php">Components</a></li>
                            <li><a href="categories/peripherals.php">Peripherals</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h3>Legal</h3>
                        <ul>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Cookies</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>© 2023 Cédric Verlinden. All rights reserved.</p>
                <div class="footer-socials">
                    <a href="https://www.twitter.com/mightyxxd" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/cedricverlinden" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="https://www.github.com/cedricverlinden" target="_blank"><i class="fa-brands fa-github"></i></a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>