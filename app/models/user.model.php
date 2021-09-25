<?php
    class user {
        public $RegEx = [
            "firstname"  => "/^[a-z]{3,25}$/i" ,
            "lastname"   => "/^[a-z]{3,25}$/i" ,
            "username"   => "/^[a-z_\-\d]{3,20}$/i" ,
            "email"      => "/^([a-z\d\.\-]+)@([a-z\d\-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/i" ,
            "password"   => "/^[\w!@#$%^&*\-_]{8,25}$/i"
        ];


        public function login ($POST) {

            $database = new dataBase();
            if ( $POST["email_login"] != "" && $POST["password_login"] != "" ) {

                // Getting password from database
                $query1 = "SELECT user_password FROM user WHERE user_email=?;";
                $hashed_password = $database -> read( $query1, [$POST["email_login"]] );
                // Getting password from database

                // Getting email from database
                $query2 = "SELECT user_email FROM user WHERE user_email=?;";
                $userdata = $database -> read( $query2, [ $POST["email_login"] ] );
                // Getting email from database


                if ( $userdata[0]["user_email"] == $POST["email_login"] && password_verify($POST["password_login"], $hashed_password[0]["user_password"]) == 1 ) {
                    $_SESSION["error"] = "none";
                    $_SESSION["loginStatus"] = 1;
                    // Saving User Information In Session
                    $query3 = "SELECT user_id, user_firstname, user_lastname, user_username, user_email FROM user WHERE user_email=?;";
                    $userinfo = $database -> read( $query3, [ $POST["email_login"] ] );
                    $_SESSION["info"]["user_id"] = $userinfo[0]["user_id"];
                    $_SESSION["info"]["firstname"] = $userinfo[0]["user_firstname"];
                    $_SESSION["info"]["lastname"] = $userinfo[0]["user_lastname"];
                    $_SESSION["info"]["username"] = $userinfo[0]["user_username"];
                    $_SESSION["info"]["email"] = $userinfo[0]["user_email"];
                    show($_SESSION["info"]);
                    die;
                }else {
                    $_SESSION["error"] = "wrong email or password";
                    $_SESSION["loginStatus"] = 0;
                    echo $_SESSION["error"];
                    die;
                }
            }else {
                $_SESSION["error"] = "Please Enter a Valid Email And Password";
                $_SESSION["loginStatus"] = 0;
                echo $_SESSION["error"];
                die;
            }

        }
        public function signup ( $POST ) {

            $database = new dataBase();

            if ( isset ( $POST["firstname_signup"] ) && isset ( $POST["lastname_signup"] ) && isset ( $POST["username_signup"] ) && isset ( $POST["email_signup"] ) && isset ( $POST["password_signup"] ) ) {
                if ( preg_match( $this -> RegEx["firstname"], $POST["firstname_signup"] ) && preg_match( $this -> RegEx["lastname"], $POST["lastname_signup"] ) && preg_match( $this -> RegEx["username"], $POST["username_signup"] ) && preg_match( $this -> RegEx["email"], $POST["email_signup"] ) && preg_match( $this -> RegEx["password"], $POST["password_signup"] ) ) {
                    $array = [ $POST["firstname_signup"], $POST["lastname_signup"], $POST["username_signup"], $POST["email_signup"], password_hash($POST["password_signup"], PASSWORD_DEFAULT) ];
                    $query = "INSERT INTO user (user_firstname,user_lastname,user_username,user_email,user_password) VALUES (?, ?, ?, ?, ?);";
                    if ( $this -> check_database_username ( $POST["username_signup"] ) ) {
                        $_SESSION["error"] = "Username Already Exists";
                        echo $_SESSION["error"];
                    }else if ( $this -> check_database_email ( $POST["email_signup"] ) ) {
                        $_SESSION["error"] = "Email Already Exists";
                        echo $_SESSION["error"];
                    }else {
                        $database -> write( $query, $array );
                        if ( $database ) {
                            mkdir("uploads/" . $POST["username_signup"]);
                            $_SESSION["error"] = "success";
                            echo $_SESSION["error"];
                        }
                    }
                }else {
                    $_SESSION["error"] = "Please Fill All The Fields With The Suggested Values \n";
                    echo $_SESSION["error"];
                }
            }else {
                echo "Something Went Wrong !";
            }
        }

    // Check If The Submited Username is Already In The Database
        public function check_database_username ($input) {
            if ( preg_match( $this -> RegEx["username"], $input) ) {
                $database = new dataBase();
                $query = "SELECT user_username FROM user WHERE user_username=?;";
                $username = $database -> read( $query, [$input] );
                if ( $username[0]["user_username"] == $input ) {
                    return true;
                }else{
                    return false;
                }
            }
        }
    // Check If The Submited Email is Already In The Database
        public function check_database_email ($input) {
            if ( preg_match( $this -> RegEx["email"], $input) ) {
                $database = new dataBase();
                $query = "SELECT user_email FROM user WHERE user_email=?;";
                $email = $database -> read( $query, [$input] );
                if ( $email[0]["user_email"] == $input ) {
                    return true;
                }else{
                    return false;
                }
            }
        }

    // Function To Upload The Image
        public function upload_img ($FILES) {
            $file_allowed_extension = [ "jpg", "jpeg", "png", "gif" ];
            $file_extenstion = end(explode( ".", $_FILES["file"]["name"] ));
            $file_distination = "../../public/uploads/AbuAlhassan11/" . rand() ."." . $file_extenstion;
        
            if ( $_FILES["file"]["size"] > 2500000 ) {
                $_SESSION["error"] = "File Size Is Too Large";
                header("Refresh:0");
            } else if ( !in_array( $file_extenstion, $file_allowed_extension ) ) {
                $_SESSION["error"] = "File Type Is Not Allowed";
                header("Refresh:0");
            } else {
                move_uploaded_file( $_FILES['file']['tmp_name'], $file_distination );
        
                $database = new dataBase();
                $query = "INSERT INTO user_posts (post_id, user_id, post_title, post_path) VALUES (NULL, ?, ?, ?);";
                $database -> write( $query, [$_SESSION["info"]["user_id"], $_FILES["file"]["name"], $file_distination] );
        
                $_SESSION["error"] = "Image Uploaded !";
            }
        }
    }