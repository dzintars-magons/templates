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

        //printSongs.php button has name='delete' and form has method='post' ofcourse
        $song_id = $_POST['delete'];

        // prepare and bind
        $stmt = $conn->prepare("DELETE FROM `tracks` WHERE `tracks`.`id` = (:songid)");
        $stmt->bindParam(':songid', $song_id);
        
        $stmt->execute();
        //we go to our index.php
        header('Location: /');

    } else {
        echo "That was not a POST, most likely GET";
    }
    // die("Let's add some songs!");