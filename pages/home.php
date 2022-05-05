<?php
session_start();

if(isset($_POST["answer"]))
    {
        $_SESSION["answer"] = $_POST["answer"];

        header('Location: camera.php');
        exit();
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olma | Home</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body id="home_body">
<header>
    <form action="home.php" method="post">
        <a id="loginButton" href="adminLogin.php"><input type="button" name="Login" value="Login"></a>
    </form>
</header>

<h1>Question?</h1>
<br>
<form action="home.php" method="post" id="questions">
    <table class="center">
        <tr>
            <td><label for="lblAnswer1">Answer1</label></td>
            <td><input type="radio" id="RaAnswer1" name="answer" value="Answer1"></td>
        </tr>
        <tr>
            <td><label for="lblAnswer1">Answer2</label></td>
            <td><input type="radio" id="RaAnswer2" name="answer" value="Answer2"></td>
        </tr>
        <tr>
            <td><label for="lblAnswer1">Answer3</label></td>
            <td><input type="radio" id="RaAnswer3" name="answer" value="Answer3"></td>
        </tr>
        <tr>
            <td><label for="lblAnswer1">Answer4</label></td>
            <td><input type="radio" id="RaAnswer4" name="answer" value="Answer4"></td>
        </tr>
    <button type="submit" class="center">Submit</button>
</form>

</body>
</html>
