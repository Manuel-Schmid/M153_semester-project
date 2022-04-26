<?php

$allset = 0;
$firstnameError = $lastNameError = $dobError = $emailError = $phoneError = $streetError = $zipError = $cityError = '';
$firstname = $lastname = $dob = $email = $phone = $street = $zip = $city = '';

if (isset($_POST['participate'])) {
    echo 'participated';
    if (isset($_POST['inFirstname'])) {

        $firstname = $_POST['inFirstname'];
        $allset++;
    } else {
        $firstnameError = 'Bitte Vorname eingeben';
    }

    if (isset($_POST['inFirstname'])) {

        $lastname = $_POST['inFirstname'];
        $allset++;
    } else {
        $lastNameError = 'Bitte Vorname eingeben';
    }

    if (isset($_POST['inDOB'])) {

        $firstname = $_POST['inDOB'];
        $allset++;
    } else {
        $firstnameError = 'Bitte Geburtsdatum eingeben';
    }

    if (isset($_POST['inEmail'])) {

        $email = $_POST['inEmail'];
        $allset++;
    } else {
        $emailError = 'Bitte E-Mail eingeben';
    }

    if (isset($_POST['inPhone'])) {

        $phone = $_POST['inPhone'];
        $allset++;
    } else {
        $phoneError = 'Bitte Tel.Nr. eingeben';

    }

    if (isset($_POST['inStreet'])) {

        $street = $_POST['inStreet'];
        $allset++;
    } else {
        $streetError = 'Bitte Strasse eingeben';
    }

    if (isset($_POST['inZip'])) {

        $zip = $_POST['inZip'];
        $allset++;
    } else {
        $zipError = 'Bitte PLZ eingeben';
    }

    if (isset($_POST['inCity'])) {

        $city = $_POST['inCity'];
        $allset++;

    } else {
        $cityError = 'Bitte Stadt eingeben';
    }

    if ($allset == 8) {
        //header('LOCATION:PrizesScreen.php');
        //exit();
    }
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
<img src="../assets/Logo-M153.svg" alt="" width="150">
<h1 class="center">Registration</h1>
<form action="Registration.php" method="post" id="questions">
    <table class="center">
        <tr>
            <td><label for="lblFirstName">Vorname:</label></td>
            <td><input type="text" name="inFirstname"><?php echo $firstnameError; ?></td>
        </tr>
        <tr>
            <td><label for="lblLastName">Nachname:</label></td>
            <td><input type="text" name="inLastname"><?php echo $lastNameError; ?></td>
        </tr>
        <tr>
            <td><label for="lblDOB">Geburtsdatum:</label></td>
            <td><input type="date" name="inDOB"><?php echo $emailError; ?></td>
        </tr>
        <tr>
            <td><label for="lblEmail">E-Mail:</label></td>
            <td><input type="email" name="inEmail"><?php echo $emailError; ?></td>
        </tr>
        <tr>
            <td><label for="lblPhone">Tel.:</label></td>
            <td><input type="tel" name="inPhone"><?php echo $phoneError; ?></td>
        </tr>
        <tr>
            <td><label for="lblZip">PLZ:</label></td>
            <td><input type="number" name="inZip"><?php echo $zipError; ?></td>
        </tr>
        <tr>
            <td><label for="lblCity">Ort:</label></td>
            <td><input type="text" name="inCity"><?php echo $cityError; ?></td>
        </tr>
        <tr>
            <td><label for="lblStreet">Strasse:</label></td>
            <td><input type="text" name="inStreet"><?php echo $streetError; ?></td>
        </tr>
    </table>
    <input type="submit" name="participate" value="Teilnehmen" class="center submitbutton">
</form>

</body>
</html>
