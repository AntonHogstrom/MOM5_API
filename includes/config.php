<?php
$devMode = true;

if($devMode) {
    error_reporting(-1);
    ini_set("display_errors", 1);
}
$devmode = true;

//Autoload classes from classes/classFile.php
spl_autoload_register(function($class_name) {
    include 'classes/' . $class_name . '.class.php';
});

if($_SERVER['SERVER_NAME'] === "localhost") {
    define("DBHOST", "localhost");
    define("DBUSER", "courses");
    define("DBPASS", "password");
    define("DBDATABASE", "courses");
} else {
    define("DBHOST", "devnoe.com.mysql");
    define("DBUSER", "devnoe_commiun");
    define("DBPASS", "MIUNPassWord123Secret!");
    define("DBDATABASE", "devnoe_commiun");
}
