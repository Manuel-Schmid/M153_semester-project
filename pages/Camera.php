<?php
session_start();
include_once('../CRUD.php');

$activeTab = 'camera';
$pictureBlob = '';

$firstname = $lastname = $dob = $email = $phone = $street = $zip = $city = '';
$firstnameError = $lastNameError = $dobError = $emailError = $phoneError = $streetError = $zipError = $cityError = '';

if (isset($_POST['camera-form'])) {
    $activeTab = 'registration';

    $data = $_POST;
    var_dump($_POST);
    echo '<p style="display: none">' . $data["PictureJS"] . '</p>';

    $pictureB64 = ($_POST["PictureJS"]);
    var_dump($pictureB64);
    echo '<img src="'.$pictureB64.'" alt="">';

    $pictureBlob = base64_decode($pictureB64);
}

if ($activeTab === 'camera') {


} else if ($activeTab === 'registration') {
     $hasCorrectAnswer = $_SESSION['answer'];
     $hasCorrectBool = ($hasCorrectAnswer === "1") ? 1 : 0;


    $allset = 0;
    $picture = null;

        $picture = $_POST['pictureJS'];
        var_dump($picture); ;

        $nextID = getNextUserAutoIncrement();
        echo $nextID;
        postPicture($nextID, $pictureBlob);
        echo 'posted';

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
            $dobDate = strtotime($_POST['inDOB']);
            if(mktime(0,0,0,date('m',$dobDate), date('d',$dobDate),date('y',$dobDate))< mktime(0, 0, 0, date('m'), date('j'), ( date('Y') - 18 ))){
                $dob = $_POST['inDOB'];
                $allset++;
            }
            else{
                $dobError = "Keine Teilnehmer unter 18";
            }

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
            if (preg_match('/^(\d{3})\s?(\d{3})\s?(\d{2})\s?(\d{2})$/', $_POST['inPhone'])) {
                $phone = $_POST['inPhone'];
                $allset++;
            } else {
                $phoneError = 'Ungültige Tel.Nr. (079 123 45 67)';
            }
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
            if (preg_match('/^\d{4}$/', $_POST['inZip'])) {
                $zip = $_POST['inZip'];
                $allset++;
            } else {
                $zipError = 'PLZ ungültig';
            }
        } else {
            $zipError = 'Bitte PLZ eingeben';
        }

        if (!empty($_POST['inCity'])) {
            $city = $_POST['inCity'];
            $allset++;

        } else {
            $cityError = 'Bitte Stadt eingeben';
        }
    $nextID = getNextUserAutoIncrement();
    echo $picture;
    postPicture($nextID, $picture);

        if ($allset == 8) {
            try {
                $nextID = getNextUserAutoIncrement();
                postUserData($firstname, $lastname, $dob, $email, $phone, $street, $zip, $city, $hasCorrectBool);
                echo $picture;
                postPicture($nextID, $picture);
            } catch (Exception $e) {
                echo $e;
            }
            exit();
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
<img src="../assets/Logo-M153.svg" alt="" width="70">

<section class="camera-section <?php  if($activeTab !== 'camera') echo 'veryHidden'; ?>">
    <h1 class="center">Foto aufnehmen</h1>
    <div class="camera">
        <video id="webcam" autoplay="" playsinline="" width="auto" height="480" class="center"></video>
        <canvas id="canvas" class="canvas center stack-top"></canvas>
        <audio id="snapSound" src="../audio/snap.wav" preload="auto"></audio>

        <div class="camera_controls">
            <form action="Camera.php" method="post" autocomplete="on">
                <input id="btnTakePic" type="button" class="center" onclick="takeAPicture()" value="Foto aufnehmen"/>
                <input id="btnReTakePic" type="button" name="reshoot" onclick="reshoot_pic()" value="Neu" class="center hidden"/>
                <input id="picture" type="hidden" name="PictureJS">

                <script type="text/javascript" src="../JS/camera.js"></script>

                <input type="submit" id="btnSubmit" name="camera-form" class="center hidden" value="Weiter">
            </form>
        </div>
    </div>
</section>

<section class="registration-section <?php  if($activeTab !== 'registration') echo 'veryHidden'; ?>">
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
</section>

</body>
</html>
