<?php
//Implement, that the picture is saved in something like a session and only save it when the user entered his name
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olma | Home</title>
    <link rel="stylesheet" href="../styles.css">
    <script type="text/javascript" src="../JS/webcam-easy.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
</head>
<body>
<img src="../assets/Logo-M153.svg" alt="" width="70">
<h1 class="center">Foto aufnehmen</h1>

<div class="camera">
    <video id="webcam" autoplay="" playsinline="" width="auto" height="480" class="center"></video>
    <canvas id="canvas" class="center"></canvas>
    <audio id="snapSound" src="../audio/snap.wav" preload="auto"></audio>

    <div class="camera_controls">
        <form action="Registration.php" method="post">
            <input type="button" class="center" onclick="takeAPicture()" value="Foto aufnehmen"></input>
            <input type="button" name="reshoot" onclick="reshoot_pic()" value="Neu" class="center"></input>
            <script type="text/javascript" src="../JS/camera.js"></script>
            <input type="submit" name="next" value="Weiter" class="center">
        </form>
    </div>
</div>

</body>
</html>
