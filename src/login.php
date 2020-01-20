<?php
    //we need to start session to check if user already exists
    session_start();
    if (isset($_SESSION['username'])) {
        echo "You are logged in " . $_SESSION['username'];
    } else { 
        echo "You need to register";
        echo "<a href='register.php'>Register</a>";
    }
    echo "<hr>";