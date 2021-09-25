<?php

    class dataBase {
        public function connect () {
            try {
                $connect = new PDO ("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASS);
                $connect -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $connect;
            } catch ( PDOException $error ) {
                die ( $error -> getMessage() );
            }
        }

        public function read ( $query, $inputs = [] ) {
            $conn = $this -> connect();
            $stmt = $conn -> prepare( $query );

            if ( count( $inputs ) == 0 ) {
                $stmt = $conn -> query( $query );
                $progress = 0;
                if ( $stmt ) {
                    $progress = 1;
                }
            }else {
                $progress = $stmt -> execute ( $inputs );
            }

            if ( $progress ) {
                $data = $stmt -> fetchAll();
                return $data;
            }
        }

        public function write ( $query, $inputs = [] ) {
            $conn = $this -> connect();
            $stmt = $conn -> prepare( $query );

            if ( count( $inputs ) == 0 ) {
                $stmt = $conn -> query( $query );
            }else {
                $stmt -> execute ( $inputs );
            }
        }
    }