<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olma | Home</title>
    <link rel="stylesheet" href="../styles.css">
    <script type="text/javascript" src="../JS/webcam-easy.js"></script>
</head>
<body>
<img src="../assets/Logo-M153.svg" alt="" width="70">
<h1 class="center">Foto aufnehmen</h1>

<div class="camera">
    <video id="webcam" autoplay playsinline width="auto" height="480" class="center"></video>
    <canvas id="canvas" class="d-none center"></canvas>
    <audio id="snapSound" src="../audio/snap.wav" preload="auto"></audio>

    <div class="camera_controls">
        <form action="Registration.php" method="post">
            <input type="button" class="center" onclick="takeAPicture() button_clicked()" value="Bild aufnehmen"></input>
            <script type="text/javascript" src="../JS/camera.js"></script>
            <input type="submit" name="next" value="Weiter" class="center">
        </form>
    </div>
</div>

</body>
</html>
