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
/*
$query = $con->prepare('INSERT INTO spieler (vorname, nachname, highscore) VALUES (?,?,?);');
$query->bindValue(1, $_POST['firstname']);
$query->bindValue(2, $_POST['lastname']);
$query->bindValue(3, $_POST['highscore']);
$query->execute();

$query = $con->prepare('DELETE FROM spieler WHERE highscore=0');
$query->execute();

$sql = "SELECT * FROM spieler ORDER BY highscore DESC";
$stmt = $con->query($sql);
$players = $stmt->fetchAll();
*/
