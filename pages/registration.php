<?php
session_start();
include_once('../CRUD.php');
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
<form action="registration.php" method="post" id="questions">
    <table class="center">
        <tr>
            <td><label for="lblFirstName">Vorname:</label></td>
            <td><input type="text" name="inFirstname"></td>
            <td><?php echo $firstnameError; ?></td>
        </tr>
        <tr>
            <td><label for="lblLastName">Nachname:</label></td>
            <td><input type="text" name="inLastname"></td>
            <td><?php echo $lastNameError; ?></td>
        </tr>
        <tr>
            <td><label for="lblDOB">Geburtsdatum:</label></td>
            <td><input type="date" name="inDOB"></td>
            <td><?php echo $dobError; ?></td>
        </tr>
        <tr>
            <td><label for="lblEmail">E-Mail:</label></td>
            <td><input type="email" name="inEmail"></td>
            <td><?php echo $emailError; ?></td>
        </tr>
        <tr>
            <td><label for="lblPhone">Tel.:</label></td>
            <td><input type="tel" name="inPhone"></td>
            <td><?php echo $phoneError; ?></td>
        </tr>
        <tr>
            <td><label for="lblZip">PLZ:</label></td>
            <td><input type="number" name="inZip"></td>
            <td><?php echo $zipError; ?></td>
        </tr>
        <tr>
            <td><label for="lblCity">Ort:</label></td>
            <td><input type="text" name="inCity"></td>
            <td><?php echo $cityError; ?></td>
        </tr>
        <tr>
            <td><label for="lblStreet">Strasse:</label></td>
            <td><input type="text" name="inStreet"></td>
            <td><?php echo $streetError; ?></td>
        </tr>
    </table>
    <input type="submit" name="participate" value="Teilnehmen" class="center submitbutton">
</form>

</body>
</html>
