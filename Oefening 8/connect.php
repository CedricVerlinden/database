<?php
    $mysqli = new mysqli("localhost", "root", "", "leerlingen");

    if ($mysqli->connect_errno) {
        echo  "Er is iets fout gegaan met het verbinden van database.
        \n\nStacktrace (" . $mysqli->connect_errno . "): " . $mysqli->connect_error . "";
    }
?>