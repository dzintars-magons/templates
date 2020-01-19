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
//finally we can print the results
echo "<div class='song-container'>";
$columnsPrinted = false; 
foreach ($allRows as $row){
    if (!$columnsPrinted){
        echo "<div class='row-column-names'>";
        foreach ($row as $key => $value){
            echo "<span class='column-name'>$key </span>";
        }
        $columnsPrinted = true;
        echo "</div>";
    }
    echo "<div class='row-song'>";
    //created a form for updating below
    echo "<form action='updateSong.php' method='post'>";
    // echo "<span>Title: " .$row["title"] . "</span>";
    foreach ($row as $key => $value){
        echo "<span class='value-cell'>$value</span>";
        //we need to process title, artist and length seperately as special cases
    }
    echo "<button name='delete' value='" . $row['id'] . "'>Update</button>";
    echo "</form>";
    //a form for deleting songs below
    echo "<form action='deleteSong.php' method='post'>";
    echo "<button name='delete' value='" . $row['id'] . "'>Delete</button>";
    echo "</form>";
    echo "</div>";
}
echo "</div>";
echo "<hr>";
