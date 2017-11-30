<?php
error_reporting(E_ALL);

ini_set("log_errors", 1);
ini_set("error_log", "logs/php-error.log");
error_log("Error Logging: Start");

include 'home.php';

//To use this file, include the php file you want to test above.
//Then, on the browser visit /php/test_parse.php
//Any syntax errors in the php file you've included will be logged to /logs/php-error.log

?>
