<?php
//we need to start session to check if user already exists
session_start();

require_once '../src/templates/head.php';

require_once '../src/login.php';

require_once '../src/addSongs.php';

require_once '../src/printSongs.php';

require_once '../src/templates/foot.php';