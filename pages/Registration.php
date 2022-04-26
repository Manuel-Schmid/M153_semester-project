<?php
//include_once('../confidential/db_connection.php');
$allset = 0;
$firstnameError = $lastNameError = $dobError = $emailError = $phoneError = $streetError = $zipError = $cityError = '';
$firstname = $lastname = $dob = $email = $phone = $street = $zip = $city = '';

if(isset($_POST)) {
    if (empty($_POST['inFirstname'])) {
        $firstnameError = 'Bitte Vorname eingeben';
    } else {
        $firstname = $_POST['inFirstname'];
        $allset++;
    }

    if (empty($_POST['inFirstname'])) {
        $lastNameError = 'Bitte Vorname eingeben';
    } else {
        $lastname = $_POST['inFirstname'];
        $allset++;
    }

    if (empty($_POST['inDOB'])) {
        $firstnameError = 'Bitte Geburtsdatum eingeben';
    } else {
        $firstname = $_POST['inDOB'];
        $allset++;
    }

    if (empty($_POST['inEmail'])) {
        $emailError = 'Bitte E-Mail eingeben';
    } else {
        $email = $_POST['inEmail'];
        $allset++;
    }

    if (empty($_POST['inPhone'])) {
        $phoneError = 'Bitte Tel.Nr. eingeben';
    } else {
        $phone = $_POST['inPhone'];
        $allset++;
    }

    if (empty($_POST['inStreet'])) {
        $streetError = 'Bitte Strasse eingeben';
    } else {
        $street = $_POST['inStreet'];
        $allset++;
    }

    if (empty($_POST['inZip'])) {
        $zipError = 'Bitte PLZ eingeben';
    } else {
        $zip = $_POST['inZip'];
        $allset++;
    }

    if (empty($_POST['inCity'])) {
        $cityError = 'Bitte Stadt eingeben';
    } else {
        $city = $_POST['inCity'];
        $allset++;
    }

//    if($allset = 8){
//        header('LOCATION:PrizesScreen.php');
//        exit();
//    }
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
            <td><input type="text" name="inFirstname"><?php echo $firstnameError;?></td>
        </tr>
        <tr>
            <td><label for="lblLastName">Nachname:</label></td>
            <td><input type="text" name="inLastname"><?php echo $lastNameError;?></td>
        </tr>
        <tr>
            <td><label for="lblDOB">Geburtsdatum:</label></td>
            <td><input type="date" name="inDOB"><?php echo $emailError;?></td>
        </tr>
        <tr>
            <td><label for="lblEmail">E-Mail:</label></td>
            <td><input type="email" name="inEmail"><?php echo $emailError;?></td>
        </tr>
        <tr>
            <td><label for="lblPhone">Tel.:</label></td>
            <td><input type="tel" name="inPhone"><?php echo $phoneError;?></td>
        </tr>
        <tr>
            <td><label for="lblZip">PLZ:</label></td>
            <td><input type="number" name="inZip"><?php echo $zipError;?></td>
        </tr>
        <tr>
            <td><label for="lblCity">Ort:</label></td>
            <td><input type="text" name="inCity"><?php echo $cityError;?></td>
        </tr>
        <tr>
            <td><label for="lblStreet">Strasse:</label></td>
            <td><input type="text" name="inStreet"><?php echo $streetError;?></td>
        </tr>
    </table>
    <input type="submit" name="participate" value="Teilnehmen" class="center submitbutton">
</form>

</body>
</html>
