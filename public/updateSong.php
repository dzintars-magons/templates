<?php
    require_once '../src/db.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //printSongs.php button has name='delete' and form has method='post' ofcourse
        $song_id = $_POST['update'];
        $title = $_POST['title'];
        $artist = $_POST['artist'];
        $length = $_POST['length'];
        // var_dump($_POST);
        // die("Got song_id $song_id");

        // prepare and bind
        $stmt = $conn->prepare("UPDATE `tracks` 
            SET `title` = (:title),
                `artist` = (:artist),
                `length` = (:length)
            WHERE `tracks`.`id` = (:songid)");

        $stmt->bindParam(':songid', $song_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':artist', $artist);
        $stmt->bindParam(':length', $length);
        
        $stmt->execute();
        //we go to our index.php
        header('Location: /');

    } else {
        echo "That was not a POST, most likely GET";
    }
    // die("Let's add some songs!");
