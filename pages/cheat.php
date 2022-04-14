<?php
    $tel = '086 738 29 23';
    $test = 'My Name is Dwayne';
    if (isset($_POST['test'], $_POST['tel'])) {
        $test = $_POST['test'];
        $tel = $_POST['tel'];
        echo 'Wert von Test ist: ' . $test;
        echo '<br>';
        echo 'Wert von Tel ist: ' . $tel;
        echo '<br>';
    } else {
        echo 'bitte füllen sie das form aus';
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olma | Home</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <h1>Olma 2</h1>
    <img src="../assets/Logo-M153.svg" alt="" width="200">

    <p><?php echo $tel ?></p>

    <form action="cheat.php" method="post">
        <input type="text" name="test">
        <input type="tel" name="tel">
        <input type="submit" value="Speichern">
    </form>

</body>
</html>
