<?php
    class controllerMain {
        public function view ( $view, $info = [] ) {
            if ( file_exists( "../app/views/" . $view .".view.php" ) ) {
                require ( "../app/views/" . $view .".view.php" );
            }else {
                require ( "../app/views/404.view.php" );
            }
        }
        public function loadModel ( $model ) {
            if ( file_exists( "../app/models/" . $model .".model.php" ) ) {
                require ( "../app/models/" . $model .".model.php" );
            }
            return false;
        }
    }