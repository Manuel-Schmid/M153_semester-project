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
        echo '<br>';
    }

    function removeOverlap($arr1, $arr2) {
        $arr = $arr1;
        foreach ($arr as $item) {
            $index = array_search($item, $arr2);
            if ($index != false) {
                unset($arr[$index]);
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

        for($i = 0; $i<33; $i++) {
            $key = -1;
            while ($key == -1) {
                $winner = rand(0, sizeof($userIDs)-1);
                $key = array_search($winner, $winnerList);
                if ($key == false) {
                    $winnerList[$i] = $userIDs[$winner];
                } else {
                    $key = -1;
                }
            }
        }

//        printArr($winnerList);
//        echo '<br>';
//        echo $winnerList[5] . ', <br>';

        for($i = 0; $i<13; $i++) {
            $key = -1;
            while($key == -1) {
                $luckyWinner = rand(0, sizeof($winnerList) - 1);
                $key = array_search($winnerList[$luckyWinner], $luckyWinnerList);
                if ($key == false) {
//                    echo $luckyWinner . ', <br>';
                    $luckyWinnerList[$i] = $winnerList[$luckyWinner];
                } else {
                    $key = -1;
                }
            }
        }
        printArr($winnerList);
        printArr($luckyWinnerList);
        printArr(removeOverlap($winnerList, $luckyWinnerList));

//        for($i = 0; $i<2; $i++){
//            $key = -1;
//            while($key == -1){
//                $veryLuckyWinner = rand(1, 13);
//                $key = array_search($veryLuckyWinner, $veryLuckyWinnerList);
//                if (!$key){
//                    $veryLuckyWinnerList[$i] = $luckyWinnerList[$veryLuckyWinner];
//                    $key = array_search($veryLuckyWinner, $luckyWinnerList);
//                    if ($key !== false) {
//                        unset($luckyWinnerList[$key]);
//                    }
//                }
//                else{
//                    $key = -1;
//                }
//
//            }
//        }
//
//
//        $superLuckyWinner = rand(1, 2);
//        $superLuckyWinnerList[0] = $veryLuckyWinnerList[$superLuckyWinner];
//        unset($veryLuckyWinnerList[$superLuckyWinner]);
//
//
//        printWinner($winnerList, 1);
//        printWinner($luckyWinnerList, 2);
//        printWinner($veryLuckyWinnerList, 3);
//        printWinner($superLuckyWinnerList, 4);



        /*
        for($i = 0; $i<20; $i++){
            $winner = rand(1, $userCount);
            $user = getUser($winner);
            switch ($prizeStatus[$winner]){
                case 0:
                    echo $user['firstName'] + $user['lastName'] + "has won" + getPrize(2);
                    $prizeStatus[$winner] = 1;
                    break;
                case 1:
                    echo $user['firstName'] + $user['lastName'] + "has won" + getPrize(1);
                    $prizeStatus[$winner] = 2;
                    break;
                default:
                    rollWinner($userCount, $prizeStatus);
                    break;
            }
        }
        */
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

