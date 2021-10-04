<?php
$devMode = true;

if($devMode) {
    error_reporting(-1);
    ini_set("display_errors", 1);
}

//Autoload classes from classes/classFile.php
spl_autoload_register(function($class_name) {
    include 'classes/' . $class_name . '.class.php';
});

if($devMode) {
    define("DBHOST", "localhost");
    define("DBUSER", "courses");
    define("DBPASS", "password");
    define("DBDATABASE", "courses");
} else {
    define("DBHOST", "");
    define("DBUSER", "");
    define("DBPASS", "");
    define("DBDATABASE", "");
}
