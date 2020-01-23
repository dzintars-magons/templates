<?php
    class Controller
    {
        private $model;

        public function _construct($model) {
            $this->$model = $model;
            //I could start our route hetere with $this->route()
        }

        public function route(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET'){
                $this->getReq();
            }
        }

        private function getReq() {
            //we process our get Reqests here
            //we created an array
            $this->model->processData(["operation" => "get"]);
        }
    }