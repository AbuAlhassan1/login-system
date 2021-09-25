<?php
    class app {
        private $controller = "home";
        private $method = "index";
        private $param = [];

        public function __construct () {
            $url = [];
            $url = $this -> splitUrl();
            if ( isset($url[0]) ) {
                if ( file_exists("../app/controllers/". $url[0] .".controller.php") ) {
                    $this -> controller = $url[0];
                    unset($url[0]);
                }
            }
            require ( "../app/controllers/". $this -> controller .".controller.php" );
            $this -> controller = new $this -> controller;

            if ( isset($url[1]) ) {
                if ( method_exists( $this -> controller, $url[1] ) ) {
                    $this -> method = $url[1];
                    unset($url[1]);
                }
            }
            if ( isset( $url[2] ) ) {
                $this -> param = array_values($url);
            }
            call_user_func_array( [ $this -> controller, $this -> method ], $this -> param );
        }
        private function splitUrl () {
            if ( isset( $_GET["url"] ) ) {
                return explode("/", filter_var( trim($_GET["url"], "/"),FILTER_SANITIZE_URL ) );
            }
        }
    }