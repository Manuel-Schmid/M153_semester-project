<?php
include_once('../CRUD.php');

if(isset($_POST['backHome'])) {
    echo "test";
    header('Location:home.php');
    exit();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olma | Preise</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

    <br>
    <h1>Preise</h1>
    <br>
    <form action="prizesScreen.php" method="post">
        <br>
        <table id="prizeList" style="overflow-y: unset">
            <tr>
                <th>Preis</th>
                <th>Wert</th>
                <th>Anzahl</th>
            </tr>

            <?php
            $prizeList = getAllPrizes();
            foreach ($prizeList as $prize) {
                ?>
                <tr>
                    <td><?php echo $prize[1] ?></td>
                    <td><?php echo $prize[3] ?></td>
                    <td><?php echo $prize[2] ?></td>
                </tr>
            <?php } ?>
        </table>

        <input type="submit" name="backHome" value="Zurück zum Startbildschirm">
    </form>



</body>
</html>