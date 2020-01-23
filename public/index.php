<?php
    require_once '../src/classes/Model.php';
    require_once '../src/classes/View.php';
    require_once '../src/classes/Controller.php';
    //order will be important here
    $model = new Model();
    $controller = new Controller($model);
    $view = new View($controller, $model);
    $view->render();