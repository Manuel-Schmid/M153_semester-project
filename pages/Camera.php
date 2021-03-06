<?php
session_start();
include_once('../CRUD.php');

$activeTab = 'camera';
$pictureB64 = '';

$firstname = $lastname = $dob = $email = $phone = $street = $zip = $city = '';
$firstnameError = $lastNameError = $dobError = $emailError = $phoneError = $streetError = $zipError = $cityError = '';

if (isset($_POST['camera-form'], $_POST["PictureJS"])) {
    try {
        $activeTab = 'registration';
        $pictureB64 = ($_POST["PictureJS"]);
        $_SESSION['pictureB64'] = $pictureB64;

    } catch (Exception $e) {
        echo 'ErrorMSG: ' . $e->getMessage();
    }

}
else if(isset($_POST['participate'])){
    $activeTab = 'registration';
}

if ($activeTab === 'registration') {
    $hasCorrectAnswer = $_SESSION['answer'];
    $hasCorrectBool = ($hasCorrectAnswer === "1") ? 1 : 0;

    $allSet = 0;

    if (isset($_POST['participate'])) {
        if ($pictureB64 == '') $pictureB64 = $_SESSION['pictureB64'];

        if (!empty($_POST['inFirstname'])) {
            $firstname = $_POST['inFirstname'];
            $allSet++;
        } else {
            $firstnameError = 'Bitte Vorname eingeben';
        }

        if (!empty($_POST['inLastname'])) {
            if($_POST['inLastname'] != $_POST['inFirstname']){
                $lastname = $_POST['inLastname'];
                $allSet++;
            }
            else{
                $lastNameError = 'Nachname und Vorname dürfen nicht identisch sein';
            }
        } else {
            $lastNameError = 'Bitte Nachnamen eingeben';
        }

        if (!empty($_POST['inDOB'])) {
            $dobDate = strtotime($_POST['inDOB']);
            if (mktime(0, 0, 0, date('m', $dobDate), date('d', $dobDate), date('y', $dobDate)) < mktime(0, 0, 0, date('m'), date('j'), (date('Y') - 18))) {
                $dob = $_POST['inDOB'];
                $allSet++;
            } else {
                $dobError = "Keine Teilnehmer unter 18";
            }

        } else {
            $dobError = 'Bitte Geburtsdatum eingeben';
        }

        if (!empty($_POST['inEmail'])) {
            $email = $_POST['inEmail'];
            $allSet++;
        } else {

            $emailError = 'Bitte E-Mail eingeben';
        }

        if (!empty($_POST['inPhone'])) {
            if (preg_match('/^(\+41)\s?(\d{2})\s?(\d{3})\s?(\d{2})\s?(\d{2})$/', $_POST['inPhone'])) {
                $phone = $_POST['inPhone'];
                $phone = str_replace(' ', '', $phone);
                $phone = substr($phone, 0, 3) . ' ' . substr($phone, 3, 2) . '  ' . substr($phone, 5, 3) . ' ' . substr($phone, 8, 2). ' ' . substr($phone, 10, 2);
                $allSet++;
            } else {
                $phoneError = 'Ungültige Tel.Nr. (Format: +41 XX XXX XX XX)';
            }
        } else {
            $phoneError = 'Bitte Tel.Nr. eingeben';

        }

        if (!empty($_POST['inStreet'])) {
            $street = $_POST['inStreet'];
            $allSet++;
        } else {
            $streetError = 'Bitte Strasse eingeben';
        }

        if (!empty($_POST['inZip'])) {
            if (preg_match('/^\d{4}$/', $_POST['inZip'])) {
                $zip = $_POST['inZip'];
                $allSet++;
            } else {
                $zipError = 'PLZ ungültig';
            }
        } else {
            $zipError = 'Bitte PLZ eingeben';
        }

        if (!empty($_POST['inCity'])) {
                $city = $_POST['inCity'];
                $allSet++;
        } else {
            $cityError = 'Bitte Stadt eingeben';
        }

        if ($allSet == 8) {
            try {
                postUserData($firstname, $lastname, $dob, $email, $phone, $zip, $city, $street, $hasCorrectBool, $pictureB64);
//                 postUserData('max', 'pain', '2008-12-30', 'max.pain@gmx.com', '9476285837', '9283', 'Amsterdamn', 'Lethalstreet 7', 1, $pictureB64);
                header('Location: noteOfThanks.php');
                //exit();
            } catch (Exception $e) {
                echo $e;
            }

        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olma | Home</title>
    <link rel="stylesheet" href="../styles.css">
    <script type="text/javascript" src="../JS/webcam-easy.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<div class="container-content ">
<section class="camera-section <?php if ($activeTab !== 'camera') echo 'veryHidden'; ?>">
    <img src="../assets/Logo-M153.svg" alt="" width="70">
    <h1 class="center">Foto aufnehmen</h1>
    <div class="camera">
        <video id="webcam" autoplay="" playsinline="" width="auto" height="480" class="center"></video>
        <canvas id="canvas" class="canvas center stack-top"></canvas>
        <audio id="snapSound" src="../audio/snap.wav" preload="auto"></audio>

        <?php if ($activeTab === 'camera') echo '<script type="text/javascript" src="../JS/camera.js"></script>'; ?>

        <div class="camera_controls">
            <form action="Camera.php" method="post">
                <input id="btnTakePic" type="button" class="center button" onclick="takeAPicture()" value="Foto aufnehmen"/>
                <input id="btnReTakePic" type="button" name="reshoot" onclick="reshoot_pic()" value="Neu"
                       class="center hidden button-back"/>
                <input id="picture" type="hidden" name="PictureJS">
                <input type="submit" id="btnSubmit" name="camera-form" class="center hidden button-submit" value="Weiter">
            </form>
        </div>
    </div>
</section>
</div>
<div class="container-content">
<section class="registration-section <?php if ($activeTab !== 'registration') echo 'veryHidden'; ?>">
    <img src="../assets/Logo-M153.svg" alt="" width="150" class="picture">
    <h1 class="center">Registration</h1>
    <form action="camera.php" method="post" id="questions">
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
        <input type="submit" name="participate" value="Teilnehmen" class="center button-submit">
    </form>
</section>
</div>
</body>
</html>
