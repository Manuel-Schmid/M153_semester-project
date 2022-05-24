<?php
session_start();
include_once('../CRUD.php');

if(isset($_POST["answer"])) {
    $_SESSION['answer'] = $_POST['answer'];
    header('Location: camera.php');
    exit();
}

$quiz = getQuiz();
$answers = [$quiz['correctAnswer'],$quiz['wAnswer1'],$quiz['wAnswer2'],$quiz['wAnswer3']];
shuffle($answers);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olma | Home</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body id="home_body">

<div class="nav">
    <form action="home.php" method="post">
        <a id="loginButton" href="adminLogin.php"><input type="button" name="Login" value="Admin Anmeldung" class="button"></a>
        <a id="prizeScreenButton" href="prizesScreen.php"><input type="button" name="Login" value="Preisliste" class="button"></a>
    </form>
</div>

<div class="container-content">
    <img src="../assets/Logo-M153.svg" alt="" width="150" class="picture">
<h1><?php echo $quiz['question'] ?></h1>
<br>

<form action="home.php" method="post" id="questions">
    <table class="center">
        <tr>
            <td><label for="lblAnswer1" class=""><?php echo $answers[0] ?></label></td>
            <td>
                <input type="radio" id="RaAnswer1" name="answer" value="<?php echo ($answers[0] === $quiz['correctAnswer'] ? 1 : 0) ?>" checked="checked">

            </td>
        </tr>
        <tr>
            <td><label for="lblAnswer1" class=""><?php echo $answers[1] ?></label></td>
            <td><input type="radio" id="RaAnswer2" name="answer" value="<?php echo ($answers[1] === $quiz['correctAnswer'] ? 1 : 0) ?>"></td>
        </tr>
        <tr>
            <td><label for="lblAnswer1" class=""><?php echo $answers[2] ?></label></td>
            <td><input type="radio" id="RaAnswer3" name="answer" value="<?php echo ($answers[2] === $quiz['correctAnswer'] ? 1 : 0) ?>"></td>
        </tr>
        <tr>
            <td><label for="lblAnswer1" class=""><?php echo $answers[3] ?></label></td>
            <td><input type="radio" id="RaAnswer4" name="answer" value="<?php echo ($answers[3] === $quiz['correctAnswer'] ? 1 : 0) ?>"></td>
        </tr>
        <tr>
            <td><button type="submit" class="center, button-submit">Bestätigen</button></td>
        </tr>
</div>
</form>
</body>

</html>
