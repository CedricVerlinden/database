<?php
include 'connect.inc.php';

// Category data
function getAllCategories() {
    global $connection;

    $sql = "SELECT * FROM categories";
    $resultSet = $connection->query($sql);

    if (mysqli_num_rows($resultSet) == null) {
        echo '<li><a>No available categories</a></li>';
        return;
    }
    
    while ($row = $resultSet->fetch_assoc()) {
        echo '<li><a href="?category=' . $row["name"] . '">' . $row["name"] . '</a></li>';
    }
}

function getCategoryId($name) {
    global $connection;

    $sql = "SELECT * FROM categories WHERE name=?";
    $statement = $connection->prepare($sql);

    if (!$statement) {
        die("Error: " . $connection->error);
    }

    $statement->bind_param("s", $name);
    $statement->execute();

    $resultSet = $statement->get_result();
    $row = $resultSet->fetch_assoc();

    return $row["id"];
}

function getCategoryName($id) {
    global $connection;

    $sql = "SELECT * FROM categories WHERE id=?";
    $statement = $connection->prepare($sql);

    if (!$statement) {
        die("Error: " . $connection->error);
    }

    $statement->bind_param("i", $id);
    $statement->execute();

    $resultSet = $statement->get_result();
    $row = $resultSet->fetch_assoc();

    return $row["name"];
}

// Platform data
function getPlatform($id) {
    global $connection;
    $sql = "SELECT * FROM platforms WHERE id=?";
    $statement = $connection->prepare($sql);

    if (!$statement) {
        die("Error: " . $connection->error);
    }
    
    $statement->bind_param("i", $id);
    $statement->execute();

    $resultSet = $statement->get_result();

    if (mysqli_num_rows($resultSet) == null) {
        return "Unknown platform";
    }

    $row = $resultSet->fetch_assoc();
    
    return $row["name"];
}


// Product data
function getAllProducts() {
    global $connection;

    $sql = "SELECT * FROM products";
    $resultSet = $connection->query($sql);

    if (mysqli_num_rows($resultSet) == null) {
        echo '
        <div class="no-products">
            <p>There are no products available.</p>
        </div>
        ';
        return;
    }
    
    while ($row = $resultSet->fetch_assoc()) {
        echo '
            <div class="product">
                <div class="product-top">
                    <img src="' . $row["image"] . '">
                    <p>' . $row["name"] . '</p>
                    <p class="platform">' . getPlatform($row["platform"]) . '</p>
                </div>
                <div class="product-bottom">
                    <p class="price">€' . $row["price"] . '</p>
                    <form action="buy.php" method="post">
                        <button name="buy-item">Buy</button>
                    </form>
                </div>
            </div>
        ';
    }
}

function getProductsByCategory($id) {
    global $connection;

    $sql = "SELECT * FROM products WHERE category=?";
    $statement = $connection->prepare($sql);
    
    if (!$statement) {
        die("Error: " . $connection->error);
    }

    $statement->bind_param("i", $id);
    $statement->execute();

    $resultSet = $statement->get_result();
    while ($row = $resultSet->fetch_assoc()) {
        echo '
            <div class="product">
                <div class="product-top">
                    <img src="' . $row["image"] . '">
                    <p>' . $row["name"] . '</p>
                    <p class="platform">' . getPlatform($row["platform"]) . '</p>
                </div>
                <div class="product-bottom">
                    <p class="price">€' . $row["price"] . '</p>
                    <form action="buy.php" method="post">
                        <button name="buy-item">Buy</button>
                    </form>
                </div>
            </div>
        ';
    }
}

function getAllProductsForAdmin() {
    global $connection;

    $sql = "SELECT * FROM products";
    $resultSet = $connection->query($sql);

    if (mysqli_num_rows($resultSet) == null) {
        echo '
        <div class="no-products">
            <p>There are no products available.</p>
        </div>
        ';
        return;
    }
    
    while ($row = $resultSet->fetch_assoc()) {
        echo '
            <div class="product-card">
                <div class="first">
                    <p class="id">' . $row["id"] . '</p>
                    <img src="' . $row["image"] . '">
                </div>
                <p>' . $row["name"] . '</p>
                <p>€' . $row["price"] . '</p>
                <p>' . getCategoryName($row["category"]) . '</p>
                <p style="text-transform:uppercase">' . getPlatform($row["platform"]) . '</p>
                <p>' . $row["image"] . '</p>

                <form action="./edit.php?type=edit&product=' . $row["id"] . '" method="post">
                    <button name="edit">Edit</button>
                </form>

                <form action="./edit.php?type=delete&product=' . $row["id"] . '" method="post">
                    <button name="delete">Delete</button>
                </form>
            </div>
        ';
    }
}