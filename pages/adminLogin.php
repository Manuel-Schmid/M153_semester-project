<?php
include_once('../CRUD.php');
$error = '';

if (isset($_POST['password'])) {
    $pwd = $_POST['password'];
    if (checkAdminPW($pwd) == 1) {
        header('Location:adminUserData.php');
        exit();
    } else {
        $error = 'YOU ARE WRONG.';
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

<div class="nav-adminlogin">
    <form action="home.php" method="post">
        <a type="button" class="button"" href="home.php"><input type="button" name="Login" value="Zurück zum Startbildschirm" class="button"></a>
    </form>
</div>



<div class="container-content">
    <h1 class="title-admin">Admin-Anmeldung</h1>
    <p class="error"><?php echo $error ?></p>
    <form action="adminLogin.php" method="post">
        <label>Passwort: </label>
        <input type="text" name="password">
        <br>
        <br>
        <input type="submit" value="Bestätigen" class="button-submit">
        <br>
    </form>
</div>
</body>
</html>

