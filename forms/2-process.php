<?php
    // the file form.php leads to this place 
    session_start();
    echo "Processing form<br>";

    //we check if we got a GET REQUEST
    //we check what $key and $value we obtained from that $_GET

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        echo "We got a GET request!<br>";
        foreach ($_GET as $key => $value){
            echo "We received name $key with value $value <br>";
        }

        //if the user has provided 'myname' then we echo his provided name from that $_GET

        if (isset($_GET['myname'])){
            echo "Hello there" .  $_GET['myname'] . "!<hr>";
            $_SESSION['myname'] = $_GET['myname'];
        }
        //and then after all of this we go to /greeting.php
        header('Location: /greeting.php');
    }