<?php
include 'connect.php';

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


//
function getPlatform($id) {
    global $connection;
    $sql = "SELECT * FROM platforms WHERE id = " . $id;
    $resultSet = $connection->query($sql);

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
?>