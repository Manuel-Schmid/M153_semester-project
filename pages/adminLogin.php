<?php

include_once('../confidential/db_connection.php');

if(isset($_POST['password'])) {
    $pwd = $_POST['password'];
    if ($pwd == $_SESSION['adminPWD']) {
        header('LOCATION:adminQuestion.php');
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

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label>Password: </label>
    <input type="text" name="password">
    <br>
    <br>
    <input type="submit" value="submit">
</form>

</body>
</html>

