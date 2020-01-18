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

require_once '../src/templates/foot.php';