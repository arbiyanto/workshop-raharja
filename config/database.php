<?php
// Connection;Port;DBName, Username, Password, Options
$connection = new PDO(
    "mysql:host=127.0.0.1".";port=3306".";dbname=workshop_raharja",
    "root",
    "",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);
