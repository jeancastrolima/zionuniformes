<?php
session_start();

$pdo = new PDO(
    "mysql:host=199.193.117.162;dbname=rxuffavj_conectati;charset=utf8mb4",
    "rxuffavj",
    "R4S68C0Id1ir29",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);
?>