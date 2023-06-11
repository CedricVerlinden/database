<?php

try {
    $mysqli = new mysqli("localhost", "root", "", "leerlingen");
} catch (Exception $e) {
    echo  "Er is iets fout gegaan met het verbinden van database.
        \n\nStacktrace (" . $e->getCode() . "): " . $e->getMessage() . "";
    exit();
}
