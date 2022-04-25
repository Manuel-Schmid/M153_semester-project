<?php

include_once('../CRUD.php');

if(isset($_POST['password'])) {
    $pwd = $_POST['password'];
//    echo checkAdminPW($pwd);
    if (checkAdminPW($pwd) == 1) {
        header('Location:adminQuestion.php');
    } else {
        echo 'YOU ARE WRONG.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olma | Admin-Login</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

<header>
    <h1>Admin-Login</h1>
</header>

<form action="adminLogin.php" method="post">
    <label>Password: </label>
    <input type="text" name="password">
    <br>
    <br>
    <input type="submit" value="submit">
</form>

</body>
</html>

