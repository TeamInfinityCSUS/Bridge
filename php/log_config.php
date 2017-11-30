<?php
error_reporting(E_ALL);

ini_set("log_errors", 1);
ini_set("error_log", "logs/php-error.log");

//Include this file at the top of any php file to log non-syntax errors.
//If the php file has syntax errors, this won't log them.
//In that case, you'll need to use test_parse.php
//This is useable for catching things like mysql connection errors and the like.

?>
