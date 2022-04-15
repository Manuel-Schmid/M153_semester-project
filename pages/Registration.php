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
            <td><label for="lblFirstName">Vorname:</label></td>
            <td><input type="text" name="inFirstname"></td>
        </tr>
        <tr>
            <td><label>Nachname:</label></td>
            <td><input type="text" name="inLastname"></td>
        </tr>
        <tr>
            <td><label for="lblEmail">E-Mail:</label></td>
            <td><input type="email" name="inEmail"></td>
        </tr>
        <tr>
            <td><label for="lblPhone">Tel.:</label></td>
            <td><input type="tel" name="inPhone"></td>
        </tr>
        <tr>
            <td><label for="lblStreet">Strasse:</label></td>
            <td><input type="text" name="inStreet"></td>
        </tr>
        <tr>
            <td><label for="lblZip">PLZ:</label></td>
            <td><input type="number" name="inZip"></td>
        </tr>
        <tr>
            <td><label for="lbltown">Ort:</label></td>
            <td><input type="text" name="inTown"></td>
        </tr>
    </table>

    <input type="submit" name="participate" value="Teilnehmen" class="center submitbutton">
</form>
</body>
</html>
