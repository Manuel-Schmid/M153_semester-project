<?php
include('confidential/db_connection.php');

function getAllPrizes(): array {
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM prize;');
    $query->execute();
    return $query->fetchAll();
}

