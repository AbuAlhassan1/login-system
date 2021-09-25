<?php 

/*set your website title*/

define('WEBSITE_TITLE', "My Website");

/*set database variables*/

define('DB_TYPE','mysql');
define('DB_NAME','test');
define('DB_USER','root');
define('DB_PASS','');
define('DB_HOST','localhost');

/*protocal type http or https*/
define('PROTOCAL','http');

/*root and asset paths*/

$path = str_replace("\\", "/",PROTOCAL ."://" . $_SERVER['SERVER_NAME'] . __DIR__  . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

// define('ROOT', str_replace("app/core", "public", $path));
// define('ROOT', "http://192.168.0.106/GamingBuddy/public/");
// define('ASSETS', "http://192.168.0.106/GamingBuddy/public/assets/");
// define('ASSETS', str_replace("app/core", "public/assets", $path));
define('ROOT', strtolower(explode('/', $_SERVER['SERVER_PROTOCOL'])[0]) . "://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . str_replace( "app/core", "public", str_replace( '\\', '/',str_replace( $_SERVER['DOCUMENT_ROOT'], "", str_replace( '\\', '/', __DIR__ ) ) ) ) . "/");
define('ASSETS', strtolower(explode('/', $_SERVER['SERVER_PROTOCOL'])[0]) . "://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . str_replace( "app/core", "public/assets", str_replace( '\\', '/',str_replace( $_SERVER['DOCUMENT_ROOT'], "", str_replace( '\\', '/', __DIR__ ) ) ) ) . "/");

/*set to true to allow error reporting
set to false when you upload online to stop error reporting*/

define('DEBUG',false);

if(DEBUG)
{
	ini_set("display_errors",1);
}else{
	ini_set("display_errors",0);
}