<?php
include_once('confidential/db_connection.php');

function getAllPrizes(): array {
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM prize;');
    $query->execute();
    return $query->fetchAll();
}

function checkAdminPW($pw): int {
    global $pdo;
    $query = $pdo->prepare('SELECT password FROM admin where adminID=1;');
    $query->execute();
    return ($query->fetch()[0] == $pw);
}

function getPrize($id): string {
    global $pdo;
    $query = $pdo->prepare('SELECT name FROM prize WHERE prizeID = $id');
    return $query->fetchAll();
}

function getUser($id): array {
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM user WHERE userID = $id');
    return $query->fetchAll();
}

function getAllUsers(): array {
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM user;');
    $query->execute();
    return $query->fetchAll();
}
