<?php
include_once('../CRUD.php');
$allset = 0;
$firstnameError = $lastNameError = $dobError = $emailError = $phoneError = $streetError = $zipError = $cityError = '';
$firstname = $lastname = $dob = $email = $phone = $street = $zip = $city = '';

if (isset($_POST['participate'])) {

    if (!empty($_POST['inFirstname'])) {

        $firstname = $_POST['inFirstname'];
        $allset++;
    } else {
        $firstnameError = 'Bitte Vorname eingeben';
    }

    if (!empty($_POST['inLastname'])) {

        $lastname = $_POST['inLastname'];
        $allset++;
    } else {
        $lastNameError = 'Bitte Nachnamen eingeben';
    }

    if (!empty($_POST['inDOB'])) {

        $dob = $_POST['inDOB'];
        $allset++;
    } else {
        $dobError = 'Bitte Geburtsdatum eingeben';
    }

    if (!empty($_POST['inEmail'])) {

        $email = $_POST['inEmail'];
        $allset++;
    } else {
        $emailError = 'Bitte E-Mail eingeben';
    }

    if (!empty($_POST['inPhone'])) {

        $phone = $_POST['inPhone'];
        $allset++;
    } else {
        $phoneError = 'Bitte Tel.Nr. eingeben';

    }

    if (!empty($_POST['inStreet'])) {

        $street = $_POST['inStreet'];
        $allset++;
    } else {
        $streetError = 'Bitte Strasse eingeben';
    }

    if (!empty($_POST['inZip'])) {

        $zip = $_POST['inZip'];
        $allset++;
    } else {
        $zipError = 'Bitte PLZ eingeben';
    }

    if (!empty($_POST['inCity'])) {

        $city = $_POST['inCity'];
        $allset++;

    } else {
        $cityError = 'Bitte Stadt eingeben';
    }

    if ($allset == 8) {
        $nextID = getNextUserAutoIncrement();
        postUserData($firstname, $lastname, $dob, $email, $phone, $street, $zip, $city);
        postPicture($nextID, "<script type='text/javascript'>localStorage.getItem('picture')</script>");
        header('Location: prizesScreen.php');
        exit();
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
<form action="registration.php" method="post" id="questions">
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
            <td><input type="date" name="inDOB"><?php echo $dobError; ?></td>
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
