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
    <script type="text/javascript" src="../JS/webcam-easy.js"></script>
</head>
<body>
<img src="../assets/Logo-M153.svg" alt="" width="70">
<h1 class="center">Foto aufnehmen</h1>

<div class="camera center">
    <video id="webcam" autoplay playsinline width="640" height="480"></video>
    <canvas id="canvas"></canvas>
    <button class="center"><a download onclick="takeAPicture()">TakeASnap</a> </button>

    <script type="text/javascript" src="../JS/camera.js"></script>

<!--    <div class="controls">-->
<!--        <form action="cheat.php" method="post">-->
<!--            <input type="submit" name="next" value="Weiter">-->
<!--        </form>-->
<!--    </div>-->
</div>

</body>
</html>
