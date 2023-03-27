<?php

function getDrink($connection, $id) {
    $sql = "SELECT * FROM tbldrank WHERE dranknummer=?;";
    $statement = $connection->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    $resultSet = $statement->get_result();
    $row = $resultSet->fetch_assoc();

    return $row;
}