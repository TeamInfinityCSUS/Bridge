<?php
$result_array = array(); // Hash are called Associative Array in PHP
$input = $_POST['input']; // input is an array [user, password]
$output = 0;
// Data hashkey => [stringarray0, stringarray1] 
$result_array[1]=['john@email.com','password'];

foreach($result_array as $key => $value){
  if (strtolower($input[0])==$value[0] && strtolower($input[1])==$value[1]){
    $output=$key;
    break;
  }
}

echo $output; // if the output is 0 log in failed
?>
