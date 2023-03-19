<?php
session_start();

include "../../includes/data.inc.php";

if (!(isset($_SESSION["userid"]))) {
    header("Location: ../index.php");
    return;
}

if (isset($_POST["remove-product"])) {
    removeProductFromCart($_SESSION["userid"], $_POST["product_id"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0489e35579.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/account/cart.css">
    <link rel="stylesheet" href="../../assets/css/header.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <link rel="stylesheet" href="../../assets/css/buttons.css">
    <title>Cart - Store</title>
</head>
<body>
    <div class="container">
        <div class="navigation">
            <div class="navigation-left">
                <h1><a href="../">Store</a></h1>
            </div>
            <div class="categories">
                <ul class="category-list">
                    <li><a href="./">Account</a></li>
                    <li><a href="./orders.php">Orders</a></li>
                </ul>
            </div>
            <div class="navigation-right">
                <?php
                if ($_SESSION["admin"] == 1) {
                    echo '<a href="../admin/"><i class="fa-solid fa-gear"></i></a>';
                }
                echo '
                    <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href="./"><i class="fa-solid fa-user"></i></a>
                    <a href="./logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                ';
                ?>
            </div>
        </div>

        <div class="content">
            <div class="cart-wrapper">
                <div class="top">
                    <h1>Cart</h1>
                    <h1>Payment Details</h1>
                </div>
                <div class="cart">
                    <div class="left">
                    <table>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Delete</th>
                        </tr>

                        <?php getCartProducts($_SESSION["userid"]); ?>
                    </table>
                    </div>
                    <div class="right">
                        <form action="./checkout.php" action="post">
                            <div class="input">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email">

                                <label for="billing-adress">Billing Adress</label>
                                <input type="text" name="billing-adress" id="billing-adress">

                                <div class="sub">
                                    <p>Subtotal</p>
                                    <p>€5,00</p>
                                </div>

                                <div class="sub">
                                    <p>BTW (21%)</p>
                                    <p>€1,25</p>
                                </div>

                                <div class="sub total">
                                    <p>Total</p>
                                    <p>€6,25</p>
                                </div>
                            </div>
                            <input class="button" type="submit" value="Checkout">
                        </form>
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