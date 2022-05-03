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

<<<<<<< HEAD
function getNextUserAutoIncrement(): int {
    global $pdo;
    $query = $pdo->prepare("SELECT auto_increment  FROM INFORMATION_SCHEMA.TABLES WHERE table_name = `olmadb`.`user`");
    $query->execute();
    return $query->fetch()[0];
}

function postUserData($firstname, $lastname, $dob, $email, $phone, $street, $zip, $city, $answercorrect)
{
    global $pdo;
    $query = $pdo->prepare('INSERT INTO `olmadb`.`user` (`firstName`, `lastName`, `dob`, `eMail`, `phoneNr`, `postcode`, `city`, `address`, `answerCorrect`) VALUES(?,?,?,?,?,?,?,?,?)');
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

function postPicture($userID, $picture)
{
    global $pdo;
    $query = $pdo->prepare('INSERT INTO `olmadb`.`selfie` (`fk_userID`, `image`) VALUES(?,?)');
    $query->bindValue(1, $userID);
    $query->bindValue(2, $picture);
    $query->execute();
}

=======
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
>>>>>>> master
