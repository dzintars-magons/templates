<?php
    require_once '../src/templates/head.php';
?>
<form action = "post.php" method="post">
    <input type="text" name="myname" placeholder = "Enter My Name" required>
    <input type="text" name="lastname" placeholder="Enter My Last Name" required>
    <input type="date" name="date" required>
    <button type="submit" name="submitBtn" value="666">Submit</button>
</form>
<?php

// we just added ELSE STATEMENT to see in case there is a GET request

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "We got a POST request!<br>";
    foreach ($_POST as $key => $value) {
        echo "We received name $key with value $value <br>";
    }
    if (isset($_POST['myname'])) {
        echo "Why hello there " . $_POST['myname'] . "! <hr>";
        $_SESSION['myname'] = $_POST['myname'];
    }
    var_dump ($_POST);
} else {
    echo "That was not a POST, most likely GET";
}

require_once '../src/templates/foot.php';