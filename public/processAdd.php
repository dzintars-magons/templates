<?php
    session_start();
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
        $title = $_POST['title'];
        $artist = $_POST['artist'];
        $length = $_POST['length'];
        $user_id = $_SESSION['id']; 

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO tracks (title, artist, length, user_id) 
                                VALUES (:title, :artist, :length, :user_id)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':artist', $artist);
        $stmt->bindParam(':length', $length);
        $stmt->bindParam(':user_id', $user_id);
        
        $stmt->execute();
        //we go to our index.php
        header('Location: /');

    } else {
        echo "That was not a POST, most likely GET";
    }
    // die("Let's add some songs!");