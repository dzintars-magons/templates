<?php
require_once 'db.php';
//we prepare a statement and execute it
$stmt = $conn->prepare("SELECT * FROM tracks");
$stmt->execute();

//set the resulting array to associative
$isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);

//we store the results in memory
$allRows = $stmt->fetchAll();

//SOME SORT OF TRICK where all columns will be printed
$columnsPrinted = false; 
foreach ($allRows as $row){
    if (!$columnsPrinted){
        foreach ($row as $key => $value){
            echo "KEY: $key <br>";
        }
        $columnsPrinted = true;
    }
    echo "<div>";
    echo "<span>Title: " .$row["title"] . "</span>";
    echo "</div>";
}
echo "<hr>";