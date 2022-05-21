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
    $query = $pdo->prepare('SELECT `userID`,`firstName`, `lastName`, `dob`, `eMail`, `phoneNr`, `postCode`, `city`, `street`, `answerCorrect` FROM user;');
    $query->execute();
    return $query->fetchAll();
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
    $query = $pdo->prepare("SELECT userID FROM olmadb.user WHERE answerCorrect = 1;");
    $query->execute();
    $res = $query->fetchAll();
    $arr = [];
    foreach ($res as $item) {
        $arr[] = $item['userID'];
    }
    return $arr;
}

function postUserData($firstname, $lastname, $dob, $email, $phone, $zip, $city, $street, $correctAnswer, $pictureB64): void
{
//    global $pdo;
//    $query = $pdo->prepare('INSERT INTO user (`firstName`, `lastName`, `dob`, `eMail`, `phoneNr`, `postcode`, `city`, `address`, `answerCorrect`) VALUES(?,?,?,?,?,?,?,?,?)');
//    $query->bindValue(1, $firstname);
//    $query->bindValue(2, $lastname);
//    $query->bindValue(3, $dob);
//    $query->bindValue(4, $email);
//    $query->bindValue(5, $phone);
//    $query->bindValue(6, $street);
//    $query->bindValue(7, $zip);
//    $query->bindValue(8, $city);
//    $query->bindValue(9, $correctAnswer);
//    $query->execute();

    try {
        $link = getMysqliLink();
        $stmt = mysqli_prepare($link,'INSERT INTO user (`firstName`, `lastName`, `dob`, `eMail`, `phoneNr`, `postCode`, `city`, `street`, `answerCorrect`, `image`) VALUES(?,?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param('ssssssssib', $firstnameP, $lastnameP, $dobP, $emailP, $phoneP, $zipP, $cityP, $streetP, $correctAnswerP, $image);

        $firstnameP = $firstname;
        $lastnameP = $lastname;
        $dobP = $dob;
        $emailP = $email;
        $phoneP = $phone;
        $zipP = $zip;
        $cityP = $city;
        $streetP = $street;
        $correctAnswerP = $correctAnswer;
        $image = null; // null
        $stmt->send_long_data(9, base64_decode($pictureB64));

        mysqli_stmt_execute($stmt);
//        printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));
        mysqli_stmt_close($stmt);

    } catch(Exception $e) {
        echo 'ErrorMSG: ' . $e->getMessage();
    }
}

// usage:
// $picture = getImageSrc(128);
// echo '<img src="'.$picture.'" alt="">';
function getImageSrc($userID) {
    global $pdo;
    $query = $pdo->prepare("SELECT image FROM olmadb.user WHERE userID = ?;");
    $query->bindValue(1, $userID);
    $query->execute();
    $picB64 = base64_encode($query->fetch()[0]);
    return 'data:image/png;base64,'. $picB64;
}

function getQuiz(): array
{
    global $pdo;
    $query = $pdo->prepare('SELECT question, correctAnswer, wAnswer1, wAnswer2, wAnswer3 FROM olmadb.quiz JOIN wrongAnswers ON fk_quizID = quizID');
    $query->execute();
    return $query->fetchAll()[0];
}

