<?php
    class Model
    {
        public $string; //this is our DB for now
        private $view;

        public function _construct($view){
            $this->view = $view;
            $this->string = "MVC + PHP = Awesome!";
        }

        public function processData($incoming = null){
            //process incoming
            $data = []; //empty array init
            switch ($incoming['operation']){
                case "get" :
                    $data = $this->processGet($incoming);
                    break;
            }
            //model
            $this->view->render($data);
        }

        private function processGet ($incoming){
            $data = [];
            //TODO get data from DB etc
            return $data;
        }
    }

