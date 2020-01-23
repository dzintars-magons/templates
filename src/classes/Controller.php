<?php
    class Controller
    {
        private $model;

        public function _construct($model) {
            $this->$model = $model;
        }
    }