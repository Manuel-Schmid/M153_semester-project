<?php
// (A) CONNECT TO DATABASE
$dsn = "mysql:host=213.196.190.205; dbname=olmadb";
$user = "odb_admin";
$pw = "]T&7]/9GqCzn=8zY1vFG}T4s5";

try {
    $pdo = new PDO($dsn, $user, $pw);

    // TEST SETTINGS
    $sql = 'SELECT * FROM user'; // sql-query goes here
    $params = null;
    $runs = 1;

    // TIME QUERY
    $start = microtime(true);
    $stmt = $pdo->prepare($sql);
    for ($i = 0; $i < $runs; $i++) {
//        $params[0] = '';
//        $params[1] = $i;
        $stmt->execute($params);
    }
    $end = microtime(true);

    // (D) CLOSE & RESULTS
    $taken = $end - $start;
    $average = $taken / $runs;
    echo "Total runs: $runs<br> 
          Total execution time:   $taken seconds<br>
          Average execution time: $average seconds<br>
          ";

} catch (PDOException $e) {
    echo 'Database-Connection unsuccessful';
    exit();
}

