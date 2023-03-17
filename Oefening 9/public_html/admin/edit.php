<?php
session_start();
include '../../includes/data.inc.php';

if (!(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1)) {
    header("Location: ../index.php");
    return;
}

if (!(isset($_POST["edit"]) || isset($_POST["delete"]) || isset($_POST["new-product"]) || isset($_POST["confirm-edit"]) || isset($_POST["confirm-new-product"]))) {
    header("Location: ./");
    return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing Product - Store</title>
</head>
<body>
    <?php
    global $connection;

    $type = $_GET["type"];

    /* Start editing */
    if (isset($_POST["confirm-edit"])) {
        $product = $_GET["product"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $image = $_POST["image"];
        $category = $_POST["category"];
        $platform = $_POST["platform"];

        $sql = "UPDATE products SET name=?, price=?, image=?, category=?, platform=? WHERE id=?;";
        
        $statement = $connection->prepare($sql);

        if (!$statement) {
            die("Error: " . $connection->error);
        }

        $statement->bind_param("sisiii", $name, $price, $image, $category, $platform, $product);
        $statement->execute();

        header("Location: ./products.php");
        exit();
    }

    if ($type == "edit") {
        $product = $_GET["product"];
        $sql = "SELECT * FROM products WHERE id=?";
        $statement = $connection->prepare($sql);

        if (!$statement) {
            die("Error: " . $connection->error);
        }

        $statement->bind_param("i", $product);
        $statement->execute();

        $resultSet = $statement->get_result();
        $row = $resultSet->fetch_assoc();

        echo '
            <form action="./edit.php?type=edit&product=' . $row["id"] . '" method="post">
                <input type="text" name="name" value="' . $row["name"] . '">
                <input type="text" name="price" value="' . $row["price"] . '">
                <input type="text" name="image" value="' . $row["image"] . '">
                <input type="text" name="category" value="' . $row["category"] . '">
                <input type="text" name="platform" value="' . $row["platform"] . '">
                <button name="confirm-edit">Edit</button>
            </form>
        ';
        exit();
    }
    /* End editing */

    /* Start creation */
    if (isset($_POST["confirm-new-product"])) {
        $product = $_GET["product"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $image = $_POST["image"];
        $category = $_POST["category"];
        $platform = $_POST["platform"];

        $sql = "INSERT INTO products (name, price, image, category, platform) VALUES (?, ?, ?, ?, ?);";
        
        $statement = $connection->prepare($sql);

        if (!$statement) {
            die("Error: " . $connection->error);
        }

        $statement->bind_param("sisii", $name, $price, $image, $category, $platform);
        $statement->execute();

        header("Location: ./products.php");
        exit();
    }

    if ($type == "create") {
        echo '
            <form action="./edit.php?type=create" method="post">
                <input type="text" name="name" placeholder="Name">
                <input type="text" name="price" placeholder="Price">
                <input type="text" name="image" placeholder="Image">
                <input type="text" name="category" placeholder="Category">
                <input type="text" name="platform" placeholder="Platform">
                <button name="confirm-new-product">Create</button>
            </form>
        ';

        exit();
    }
    /* End creation */
    
    if ($type == "delete") {
        $product = $_GET["product"];
        $sql = "DELETE FROM products WHERE id=?";
        $statement = $connection->prepare($sql);
        $statement->bind_param("i", $product);
        $statement->execute();

        header("Location: ./");
        exit();
    }
    ?>
</body>
</html>