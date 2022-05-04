<?php
    include_once('../CRUD.php');


    function printWinner(array $list, int $prizeID){
        foreach ($list as $element){
            $user = getUser($element);
            $prize = getPrize($prizeID);
            echo $user['fistName'] . $user['lastName'] . "has won: " . $prize['name'] . " Email: " . $user['email'];
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
        $winnerList = array();
        $luckyWinnerList = array();
        $veryLuckyWinnerList = array();
        $superLuckyWinnerList = array();
        $userIDs = getAllUserIDs();
//        printArr($userIDs);

        // winnerList
        for($i = 0; $i<33; $i++) {
            $key = -1;
            while($key == -1) {
                $winnerIndex = rand(0, sizeof($userIDs) - 1);
                $key = array_search($userIDs[$winnerIndex], $winnerList);
                if ($key === false) {
                    $winnerList[$i] = $userIDs[$winnerIndex];
                } else {
                    $key = -1;
                }
            }
        }

        // luckyWinnerList
        for($i = 0; $i<13; $i++) {
            $key = -1;
            while($key == -1) {
                $luckyWinner = rand(0, sizeof($winnerList) - 1);
                $key = array_search($winnerList[$luckyWinner], $luckyWinnerList);
                if ($key === false) {
                    $luckyWinnerList[$i] = $winnerList[$luckyWinner];
                } else {
                    $key = -1;
                }
            }
        }
        $winnerList = removeOverlap($winnerList, $luckyWinnerList);

        // veryLuckyWinnerList
        for($i = 0; $i<3; $i++){
            $key = -1;
            while($key == -1){
                $veryLuckyWinner = rand(0, sizeof($luckyWinnerList) - 1);
                $key = array_search($luckyWinnerList[$veryLuckyWinner], $veryLuckyWinnerList);
                if ($key === false) {
                    $veryLuckyWinnerList[$i] = $luckyWinnerList[$veryLuckyWinner];
                } else {
                    $key = -1;
                }
            }
        }

        $luckyWinnerList = removeOverlap($luckyWinnerList, $veryLuckyWinnerList);

        // superLuckyWinnerList
        for($i = 0; $i<1; $i++){
            $key = -1;
            while($key == -1){
                $superLuckyWinner = rand(0, sizeof($veryLuckyWinnerList) - 1);
                $key = array_search($veryLuckyWinnerList[$superLuckyWinner], $superLuckyWinnerList);
                if ($key === false) {
                    $superLuckyWinnerList[$i] = $veryLuckyWinnerList[$superLuckyWinner];
                } else {
                    $key = -1;
                }
            }
        }
        $veryLuckyWinnerList = removeOverlap($veryLuckyWinnerList, $superLuckyWinnerList);

        /*
        printArr($winnerList);
        printArr($luckyWinnerList);
        printArr($veryLuckyWinnerList);
        printArr($superLuckyWinnerList);
        */
        printWinner($winnerList, 1);
        printWinner($luckyWinnerList, 2);
        printWinner($veryLuckyWinnerList, 3);
        printWinner($superLuckyWinnerList, 4);
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
    <h1>Winner</h1>
    <br>
    <form action="adminWinner.php" method="post">
        <input type="submit" name="pickWinner" value="Pick">
    </form>

</section>

<section class="admin_sidebar">
    <a href="adminQuestion.php" class="sidebarRemoveLink"><div  class="sidebarItem">Questions</div></a>
    <a href="adminGallery.php" class="sidebarRemoveLink"><div class="sidebarItem">Gallery</div></a>
    <a href="adminData.php" class="sidebarRemoveLink"><div class="sidebarItem">Data</div></a>
    <a href="adminWinner.php" class="sidebarRemoveLink"><div id="currentPage" class="sidebarItem">Winner</div></a>
    <a href="home.php" class="sidebarRemoveLink"><div class="sidebarItem">Logout</div></a>
</section>


</body>
</html>

