<?php
//we come here from process.php 
session_start();
echo "Now we know your name Mr." .  $_SESSION['myname'];
//and we also want to show the stats.php because there we will use $_SESSION['visits] to let the user know how many times he has visited that page
require_once 'stats.php';