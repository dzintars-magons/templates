<?php
require 'head.php';
echo "Arrays";
echo "<hr>";

//SIMPLE ARRAYS

$cars = ["BMW", "Lamborghini", "Audi", "Volvo", "Maseratti"];
var_dump($cars);

$supermarkets = [
    "highend" => "Stockman",
    "mid" => ["Rimi", "Maxima"],
    "lowend" => ["Top", "Elvi"]
];
echo "<hr>";
var_dump($supermarkets);
echo "<hr>";

//USING FOREACH

foreach ($supermarkets as $status => $market){
    echo "We have $status supermarkets like $market";
}
echo "<hr>";

foreach ($cars as $car){
    echo "This is my auto: ".$car."<br>";
}

echo "<hr>";

//USING FOR LOOP 

echo "<ul>";
for ($i = 0; $i < sizeof($cars); $i++){
    echo "<li>Car number $i is $cars[$i]</li>";
}
echo "</ul>";
echo "<hr>";

//CHECK THIS CODE IF THIS WORKS 

$tmpArray = [
    "Dog" => ["Bites", "Growls", "Fights"],
    "Cat" => ["Meows", "Hisses", "Plays"],
    "Bear" => ["Eats Humans,", "Growls", "Fights oover food"],
    "Donkey" => ["being laughed at", "popular in memes", "is da man of tha house"]
];
foreach ($tmpArray as $innerArray) {
    //  Check type
    if (is_array($innerArray)){
        //  Scan through inner loop
        foreach ($innerArray as $value) {
            echo  $value."<br>";
        }
    }else{
        // one, two, three
        echo $innerArray."<br>";
    }
}
echo "<hr>";
var_dump(sort($tmpArray));
require 'foot.php';

