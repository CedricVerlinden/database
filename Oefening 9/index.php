<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <div class="navigation">
        <h1>Store</h1>
        <div class="categories">
            <ul>
                <li><a href="categories/games.php">Games</a></li>
                <li><a href="categories/components.php">Components</a></li>
                <li><a href="categories/peripherals.php">Peripherals</a></li>
            </ul>
        </div>
        <button type="button">Log in</button>
    </div>
    <section class="products">
        <div class="product">
            <div class="product-top">
                <img src="./assets/images/minecraft.png">
                <p>Minecraft</p>
                <p class="platform">PC</p>
            </div>
            <div class="product-bottom">
                <p class="price">€30</p>
                <button>Buy</button>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-top">
            <div class="footer-column">
                <h2>Store</h2>
                <p>This is WILL be the successor of Steam with much greater UI design.</p>
            </div>
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
        <div class="footer-bottom">
            <p>© 2023 Cédric Verlinden. All rights reserved.</p>
            <div class="footer-socials">
                <a href="https://www.twitter.com/mightyxxd" target="_blank"><img src="./assets/images/twitter.svg"></a>
                <a href="https://www.linkedin.com/cedricverlinden" target="_blank"><img src="./assets/images/linkedin.svg"></a>
                <a href="https://www.github.com/cedricverlinden" target="_blank"><img src="./assets/images/github.svg"></a>
            </div>
        </div>
    </footer>
</body>
</html>