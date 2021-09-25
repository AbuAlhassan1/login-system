<?php
    class login extends controllerMain {
        public function index ($one = "", $two = "", $three = "") {

            $info["title"] = "login";
            $this -> loadModel("user");
            $user = new user();

            if ( !isset($_POST["action"]) && $_POST["action"] != "signup" && $_POST["action"] != "login" ) {
                $this -> view("login", $info);
            }
            if ( isset($_POST["action"]) ) {
                if ( $_POST["action"] == "signup" ) {
                    $user -> signup( $_POST );
                    
                }
            }
            if (  isset($_POST["action"]) && $_POST["action"] == "login" ) {
                $user -> login( $_POST );
                show($_POST);
            }
        }
    }