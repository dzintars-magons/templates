<?php
require_once '../config/config.php';

//CHECK IF WE CAN CONNECT TO THE DATABASE
try {
    //if we need to set port it would come after $SERVER; port=3307;dbname=$DB
    $conn = new PDO("mysql:host=$SERVER;dbname=$DB;charset=utf8", USER, PW);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

//WE CREATE A STATEMENT and execute it
//where we take ALL from the table which is called "tracks"

$stmt = $conn->prepare("SELECT * FROM tracks");
$stmt->execute();

//set the resulting array to associative
$isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);
var_dump($isFetchModeSet . "<br>");

//WE ARE GETTING ALL ROWS FROM THAT STATEMENT
$allRows = $stmt->fetchAll();
foreach ($allRows as $key => $value){
    echo "<hr>";
    echo "KEY: ";
    var_dump ($key);
    var_dump ($value);
    echo "<br>";
}

//WE ARE GETTING all TITLES
//we can get information from any column that we have created 
foreach ($allRows as $value){
    echo "<div>";
    echo "<span>Title: " .$value["title"] . "</span>";
    echo "</div>";
}
echo "<hr>";