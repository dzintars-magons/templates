<?php
    class View
    {
        private $model;
        private $controller;

        public function _construct($controller,$model){
            $this->controller = $controller;
            $this->model = $model;
        }

        public function render(){
            echo "<p>" . $this->model->string . "</p>";
        }
    }