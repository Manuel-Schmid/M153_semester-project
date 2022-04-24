

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

    <a href="Camera.php">
        <input class="answers" id="answer1" type="button" name="Answer1" value="Answer 1">
    </a>
    <a href="Camera.php">
        <input class="answers button" id="answer2" type="button" name="Answer2" value="Answer 2">
    </a>
    <br>
    <br>
    <a href="Camera.php">
        <input class="answers button" id="answer3" type="button" name="Answer3" value="Answer 3"
    </a>
    <a href="Camera.php">
        <input class="answers button" id="answer4" type="button" name="Answer4" value="Answer 4">
    </a>
</form>

<?php

?>

</body>
</html>
