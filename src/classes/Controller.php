<?php
class Controller
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;

        //I could start our route here with $this->route();
    }

    public function route()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->getReq();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postReq();
        }
    }

    private function getReq()
    {
        //we process our get Requests here
        if (isset($_GET['name'])) {
            echo "Working for you!" . $_GET['name'];
            die();
        }
        if (isset($_GET['read'])) {
            echo "Going to read " . $_GET['read'];
            die();
        }
        $this->model->processData(["operation" => "get"]);
    }

    private function postReq()
    {
        var_dump($_POST);
        if (isset($_POST['delete'])) {
            echo "You want to delete me!";
            //call Model to delete entry from db
        } else if (isset($_POST['update'])) {
            echo "You want to update me";
            //update model
        }

        die("add connection to Model");
    }
}
