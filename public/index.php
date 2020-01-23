<?php
    require_once '../src/classes/Model.php';
    require_once '../src/classes/View.php';
    require_once '../src/classes/Controller.php';
    //order will be important here
    $view = new View(); //for rendering
    $model = new Model($view); //for business logic and data access
    $controller = new Controller($model); //for routing
    $controller->route();
 