<?php
session_start();
include '../../includes/data.inc.php';

if (!(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1)) {
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
    <link rel="stylesheet" href="../../assets/css/admin/index.css">
    <link rel="stylesheet" href="../../assets/css/header.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <title>Dashboard - Store</title>
</head>
<body>
    <div class="container">
        <div class="navigation">
            <div class="navigation-left">
                <h1><a href="../">Store</a></h1>
            </div>
            <div class="categories">
                <ul class="category-list">
                    <li><a href="./">Dashboard</a></li>
                    <li><a href="./products.php">Products</a></li>
                    <li><a href="./categories.php">Categories</a></li>
                    <li><a href="./orders.php">Orders</a></li>
                    <li><a href="./customers.php">Customers</a></li>
                </ul>
            </div>
            <div class="navigation-right">
                <a href=""><i class="fa-solid fa-gear"></i></a>
                <a href="../account/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="../account/"><i class="fa-solid fa-user"></i></a>
                <a href="../account/logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>

        <div class="content">
            <div class="general-information-wrapper">
                <h1>General Information</h1>
                <div class="general-information">
                    <div class="card">
                        <div class="card-left">
                            <div class="top">
                                <h2>Number of Orders</h2>
                                <p>Last 24h</p>
                            </div>
                            <?php getTotalOrderOfLastDay(); ?>
                        </div>
                        <div class="card-right">
                            <img src="../../assets/images/graph.svg" alt="">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-left">
                            <div class="top">
                                <h2>Revenue Generated</h2>
                                <p>Last 24h</p>
                            </div>
                            <?php totalRevenueOfLastDay(); ?>
                        </div>
                        <div class="card-right">
                            <img src="../../assets/images/graph.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="most-popular-products-wrapper">
                <h1>Most Popular Products</h1>
                <?php getMostPopularProducts(); ?>
            </div>
            <div class="recent-payments-wrapper">
                <h1>Recent Payments</h1>
                <div class="recent-payments">
                    <div class="recent-payments-left">
                        <?php getLatestPaymentsDone(); ?>
                    </div>
                    <div class="recent-payments-right">
                        <?php getLatestPaymentsPending(); ?>
                    </div>
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