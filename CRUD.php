<?php
include_once('confidential/db_connection.php');

function getAllPrizes(): array {
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM prize;');
    $query->execute();
    return $query->fetchAll();
}

function checkAdminPW($pw): int {
    global $adminPWD;
    return $pw == $adminPWD;
}
