<?php
include_once('confidential/db_connection.php');


function getAllPrizes(): array
{
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM prize;');
    $query->execute();
    return $query->fetchAll();
}

function checkAdminPW($pw): int
{
    global $pdo;
    $query = $pdo->prepare('SELECT password FROM admin where adminID=1;');
    $query->execute();
    return ($query->fetch()[0] == $pw);
}

function getPrize($id): array
{
    global $pdo;
    $query = $pdo->prepare('SELECT name, worth FROM prize WHERE prizeID = ?');
    $query->bindValue(1, $id);
    $query->execute();
    return $query->fetchAll()[0];
}

function getWinner($id): array {
    global $pdo;
    $query = $pdo->prepare('SELECT firstName, lastName, eMail, phoneNr FROM user WHERE userID = ?');
    $query->bindValue(1,$id);
    $query->execute();
    return $query->fetchAll()[0];
}


function getUser($id): array
{
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM user WHERE userID = ?');
    $query->bindValue(1, $id);
    $query->execute();
    return $query->fetchAll()[0];
}

function getAllUsers(): array
{
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM user;');
    $query->execute();
    return $query->fetchAll();
}

function getNextUserAutoIncrement(): int
{
    global $pdo;
    $query = $pdo->prepare("SELECT auto_increment FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'user'");
    $query->execute();
    return $query->fetch()[0];
}

function getUserCount(): int
{
    global $pdo;
    $query = $pdo->prepare("SELECT COUNT(*) FROM olmadb.user;");
    $query->execute();
    return $query->fetch()[0];
}

function getAllUserIDs(): array
{
    global $pdo;
    $query = $pdo->prepare('SELECT userID FROM olmadb.user;');
    $query->execute();
    $res = $query->fetchAll();
    $arr = [];
    foreach ($res as $item) {
        $arr[] = $item['userID'];
    }
    return $arr;
}

function postUserData($firstname, $lastname, $dob, $email, $phone, $street, $zip, $city, $answercorrect): void
{
    global $pdo;
    $query = $pdo->prepare('INSERT INTO user (`firstName`, `lastName`, `dob`, `eMail`, `phoneNr`, `postcode`, `city`, `address`, `answerCorrect`) VALUES(?,?,?,?,?,?,?,?,?)');
    $query->bindValue(1, $firstname);
    $query->bindValue(2, $lastname);
    $query->bindValue(3, $dob);
    $query->bindValue(4, $email);
    $query->bindValue(5, $phone);
    $query->bindValue(6, $street);
    $query->bindValue(7, $zip);
    $query->bindValue(8, $city);
    $query->bindValue(9, $answercorrect);
    $query->execute();
}

function postPicture($userID, $picture): void
{
    global $pdo;
    $query = $pdo->prepare('INSERT INTO selfie (`fk_userID`, `image`) VALUES(?,?)');
    $query->bindValue(1, $userID);
    $query->bindValue(2, $picture);
    $query->execute();
}

function getQuiz(): array
{
    global $pdo;
    $query = $pdo->prepare('SELECT question, correctAnswer, wAnswer1, wAnswer2, wAnswer3 FROM olmadb.quiz JOIN wrongAnswers ON fk_quizID = quizID');
    $query->execute();
    return $query->fetchAll()[0];
}

