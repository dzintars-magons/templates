<?php
    require_once '../src/db.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // echo "We got a POST request!<br>";
        // foreach ($_POST as $key => $value) {
        //     echo "We received name $key with value $value <br>";
        // }
        // if (isset($_POST['myname'])) {
        //     echo "Why hello there " . $_POST['myname'] . "! <hr>";
        //     $_SESSION['myname'] = $_POST['myname'];
        // }
        // var_dump ($_POST);

        //we need to add song to database
        $username = $_POST['username'];
        if (strlen($_POST['password']) < 8) {
            echo "Password too short";
            die ("Too short!");
        }
        if ($_POST['password'] != $_POST['password2']) {
            echo "Password mismatch";
        }
        //you could check if password matches certain format
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (username, hash) 
                                VALUES (:username, :hash)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':hash', $hash);
        
        $stmt->execute();
        //we go to our index.php
        header('Location: /');

    } else {
        echo "That was not a POST, most likely GET";
    }
    // die("Let's add some songs!");