<?php
    include_once('../CRUD.php');
    $allWinnerAndPrizeList = array();

    /*
     * Tier 4 = worst prize, currently Trostpreis Plüschmaskotchen
     * Tier 3 = second worst prize, currently Einkaufsgutschein
     * Tier 2 = second best prize, currently Kreuzfahrt
     * Tier 1 = best prize, currently Auto
     */

    function mergeWinnerLists(array $list, int $prizeID) {
        global $allWinnerAndPrizeList;
        foreach ($list as $userID){
            $user = getWinner($userID);
            $prize = getPrize($prizeID);

            $winnerAndPrize = array_merge($user, $prize);

            $allWinnerAndPrizeList[] = $winnerAndPrize;
        }
    }

    function printArr($arr) {
        echo implode('|', $arr);
        echo ' ||| Size: ' . sizeof($arr);
        echo ' ||| Duplicates: ' . (sizeof($arr) - count(array_count_values($arr)));
        echo '<br>';
    }

    function removeOverlap($arr1, $arr2) {
        $arr = $arr1;
        for($i = 0; $i<sizeof($arr1); $i++) {
            if (in_array($arr1[$i], $arr2)) {
                unset($arr[$i]);
            }
        }
        return $arr;
    }

    function rollWinner(int $userCount){

        $tier4WinnerList = array();
        $tier3WinnerList = array();
        $tier2WinnerList = array();
        $tier1WinnerList = array();

        $userIDs = getAllUserIDs();

        $tier4WinnerCount = 33;
        $tier3WinnerCount = 13;
        $tier2WinnerCount = 3;
        $tier1WinnerCount = 1;


        $winnerCount = count($userIDs, COUNT_NORMAL);
        if ($winnerCount<1){
        }
        elseif ($winnerCount<3){
            $tier4WinnerCount = $winnerCount;
            $tier3WinnerCount = $winnerCount;
            $tier2WinnerCount = $winnerCount;
        }
        elseif ($winnerCount<13){
            $tier4WinnerCount = $winnerCount;
            $tier3WinnerCount = $winnerCount;

        }
        elseif($winnerCount<33){
            $tier4WinnerCount = $winnerCount;
        }

        // winnerList
        echo $tier4WinnerCount;
        for($i = 0; $i<$tier4WinnerCount; $i++) {

            $key = -1;
            while($key == -1) {
                $winnerIndex = rand(0, sizeof($userIDs) - 1);
                $key = array_search($userIDs[$winnerIndex], $tier4WinnerList);

                if ($key === false) {
                    $tier4WinnerList[$i] = $userIDs[$winnerIndex];
                } else {
                    $key = -1;
                }
            }
        }

        // tier3WinnerList
        for($i = 0; $i<$tier3WinnerCount; $i++) {
            $key = -1;
            while($key == -1) {
                $luckyWinner = rand(0, sizeof($tier4WinnerList) - 1);
                $key = array_search($tier4WinnerList[$luckyWinner], $tier3WinnerList);
                if ($key === false) {
                    $tier3WinnerList[$i] = $tier4WinnerList[$luckyWinner];
                } else {
                    $key = -1;
                }
            }
        }
        $tier4WinnerList = removeOverlap($tier4WinnerList, $tier3WinnerList);

        // tier2WinnerList
        for($i = 0; $i<$tier2WinnerCount; $i++){
            $key = -1;
            while($key == -1){
                $veryLuckyWinner = rand(0, sizeof($tier3WinnerList) - 1);
                $key = array_search($tier3WinnerList[$veryLuckyWinner], $tier2WinnerList);
                if ($key === false) {
                    $tier2WinnerList[$i] = $tier3WinnerList[$veryLuckyWinner];
                } else {
                    $key = -1;
                }
            }
        }

        $tier3WinnerList = removeOverlap($tier3WinnerList, $tier2WinnerList);

        // tier1WinnerList
        for($i = 0; $i<$tier1WinnerCount; $i++){
            $key = -1;
            while($key == -1){
                $superLuckyWinner = rand(0, sizeof($tier2WinnerList) - 1);
                $key = array_search($tier2WinnerList[$superLuckyWinner], $tier1WinnerList);
                if ($key === false) {
                    $tier1WinnerList[$i] = $tier2WinnerList[$superLuckyWinner];
                } else {
                    $key = -1;
                }
            }
        }
        $tier2WinnerList = removeOverlap($tier2WinnerList, $tier1WinnerList);

        mergeWinnerLists($tier1WinnerList, 1);
        mergeWinnerLists($tier2WinnerList, 2);
        mergeWinnerLists($tier3WinnerList, 3);
        mergeWinnerLists($tier4WinnerList, 4);
    }

    if(isset($_POST['pickWinner'])){

        $userCount = getUserCount();

        rollWinner($userCount);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olma | Home</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body id="admin-view_body">
<section class="admin_content">
    <br>
    <h1>Gewinner</h1>
    <br>
    <form action="adminWinner.php" method="post">
        <input type="submit" name="pickWinner" value="Gewinner auslosen">
        <br>
        <br>
        <table id="allWinnerAndPrizeList" style=<?php
        if(isset($_POST['pickWinner'])){
            echo '""';
        }
        else{
            echo '"display:none"';
        }
        ?>>
            <tr>
                <th>Preis</th>
                <th>Wert</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>E-Mail</th>
                <th>Tel.</th>
            </tr>

            <?php
             foreach ($allWinnerAndPrizeList as $winner) {
                 ?>
                <tr>
                    <td><?php echo $winner[4] ?></td>
                    <td><?php echo $winner[5] ?></td>
                    <td><?php echo $winner[0] ?></td>
                    <td><?php echo $winner[1] ?></td>
                    <td><?php echo $winner[2] ?></td>
                    <td><?php echo $winner[3] ?></td>
                </tr>
            <?php } ?>
        </table>

    </form>
</section>

<section class="admin_sidebar">
    <a href="adminUserData.php" class="sidebarRemoveLink"><div class="sidebarItem">Benutzer</div></a>
    <a href="adminWinner.php" class="sidebarRemoveLink"><div id="currentPage" class="sidebarItem">Gewinner</div></a>
    <a href="home.php" class="sidebarRemoveLink"><div class="sidebarItem">Abmelden</div></a>
</section>

</body>
</html>

