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

<header>
    <h1>Admin-Anmeldung</h1>
</header>

<form action="adminLogin.php" method="post">
    <label>Passwort: </label>
    <input type="text" name="password">
    <br>
    <br>
    <input type="submit" value="Bestätigen">
    <br>
    <p class="error"><?php echo $error ?></p>
</form>

<button><a style="color: black; text-decoration: none" href="home.php">Zurück zum Startbildschirm</a></button>

</body>
</html>

