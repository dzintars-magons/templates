<?php
//if we want to use $_SESSION then we have to initialize session_start() before that like here
session_start();
?>

<!-- // form action is where that form leads to -->

<form action="process.php" method="get">
    <input type="text" name="myname" placeholder="Enter Your Name" required>
    <input type="text" name="lastname" placeholder="Enter Your Last Name" required>
    <button type="submit" name="submitBtn">submit</button>
</form>
<?php

//We are checking if there is a SESSION cookie saved for that user

if (isset ($_SESSION['myname'])){
    echo "I know you " . $_SESSION['myname'];
}
else{
    echo "You will need to provide your name!";
}
require 'stats.php';