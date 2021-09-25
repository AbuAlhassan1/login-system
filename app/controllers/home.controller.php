<?php
    class home extends controllerMain {
        public function index ($one = "", $two = "", $three = "") {

            $info["title"] = "Home";
            $this -> view("home", $info);

        }
    }