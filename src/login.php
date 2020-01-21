<?php
    //we need to start session to check if user already exists
    session_start();
    if (isset($_SESSION['username'])) {
        echo "You are logged in " . $_SESSION['username'];
        echo "<form action='processLogout.php' method='post' >";
        echo "<button>Logout</button>";
        echo "</form>";
    } else { 
        echo "<div class='register-p'>You need to <a href='register.php'>Register</a>or ";
        echo "<form class='login-f' action='processLogin.php' method='post'>";
        echo "<input name='username' placeholder='Enter username' required>";
        echo "<input name='password' type='password' placeholder='Enter password' required>";
        echo "<button>Login</button>";
        echo "</form>";
        echo "</div>";

    }
    echo "<hr>";