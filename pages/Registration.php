<?php
//include_once('../confidential/db_connection.php');
$allset = 0;
$firstnameError = $lastNameError = $emailError = $phoneError = $streetError = $zipError = $townError = '';
$firstname = $lastname = $email = $phone = $street = $zip = $town = '';
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

    if (empty($_POST['inTown'])) {
        $townError = 'Bitte Stadt eingeben';
    } else {
        $town = $_POST['inTown'];
        $allset++;
    }

    if($allset = 7){
        header('LOCATION:PrizesScreen.php');
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
<form action="Registration.php" method="post" id="questions">
    <table class="center">
        <tr>
            <td><label for="lblFirstName">Vorname:</label></td>
            <td><input type="text" name="inFirstname"><?php echo $firstnameError;?></td>
        </tr>
        <tr>
            <td><label>Nachname:</label></td>
            <td><input type="text" name="inLastname"><?php echo $lastNameError;?></td>
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
            <td><label for="lblStreet">Strasse:</label></td>
            <td><input type="text" name="inStreet"><?php echo $streetError;?></td>
        </tr>
        <tr>
            <td><label for="lblZip">PLZ:</label></td>
            <td><input type="number" name="inZip"><?php echo $zipError;?></td>
        </tr>
        <tr>
            <td><label for="lbltown">Ort:</label></td>
            <td><input type="text" name="inTown"><?php echo $townError;?></td>
        </tr>
    </table>
    <input type="submit" name="participate" value="Teilnehmen" class="center submitbutton">
</form>

</body>
</html>
