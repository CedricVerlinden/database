<?php
    $connection = new mysqli("localhost", "root", "", "dbbestelling");

    if ($connection->connect_errno) {
        echo  "Er is iets fout gegaan met het verbinden van database.
        \n\nStacktrace (" . $connection->connect_errno . "): " . $connection->connect_error . "";
    }
?>