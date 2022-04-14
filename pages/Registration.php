<?php //this will be edited to post directly on the server
//$tel = '086 738 29 23';
//$test = 'My Name is Dwayne';
//if (isset($_POST['test'], $_POST['tel'])) {
//    $test = $_POST['test'];
//    $tel = $_POST['tel'];
//    echo 'Wert von Test ist: ' . $test;
//    echo '<br>';
//    echo 'Wert von Tel ist: ' . $tel;
//    echo '<br>';
//} else {
//    echo 'bitte füllen sie das form aus';
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olma | Home</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<img src="../assets/Logo-M153.svg" alt="" width="150">
<h1 class="center">Registration</h1>
<form action="Registration.php" method="post" id="questions">
    <table class="center">
        <tr>
            <td>Vorname:</td>
            <td><input type="text" name="firstname"></td>
        </tr>
        <tr>
            <td>Nachname:</td>
            <td><input type="text" name="lastname"></td>
        </tr>
        <tr>
            <td>E-Mail:</td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td>Tel.:</td>
            <td><input type="tel" name="phone"></td>
        </tr>
        <tr>
            <td>Strasse:</td>
            <td><input type="text" name="street"></td>
        </tr>
        <tr>
            <td>PLZ:</td>
            <td><input type="number" name="zip"></td>
        </tr>
        <tr>
            <td>Ort:</td>
            <td><input type="text" name="town"></td>
        </tr>
    </table>

    <input type="submit" name="participate" value="Teilnehmen" class="center submitbutton">
</form>
</body>
</html>
