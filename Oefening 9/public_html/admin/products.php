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
    <link rel="stylesheet" href="../../assets/css/admin/products.css">
    <link rel="stylesheet" href="../../assets/css/header.css">
    <title>Admin Products - Store</title>
</head>
<body>
    <div class="container">
        <div class="navigation">
            <h1><a href="./">Store</a></h1>

            <div class="categories">
                <ul class="category-list">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Orders</a></li>
                    <li><a href="#">Customers</a></li>
                </ul>
            </div>

            <div class="navigation-right">
                <a href="./admin/"><i class="fa-solid fa-gear"></i></a>
                <a href="./account/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="./account/"><i class="fa-solid fa-user"></i></a>
                <a href="../includes/logout.inc.php"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>

        <div class="products">
            <?php getAllProductsForAdmin(); ?>
        </div>
    </div>
</body>
</html>