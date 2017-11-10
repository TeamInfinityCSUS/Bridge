<?php
// Define variables and set to empty values
$outgoing = array();
$uName = $_POST['studentAcct'][0];
$password = $_POST['studentAcct'][1];
$cPassword = $_POST['studentAcct'][2];
$email = $_POST['studentAcct'][3];
$cEmail = $_POST['studentAcct'][4];
$fName = $_POST['studentAcct'][5];
$lName = $_POST['studentAcct'][6];
$studentID = $_POST['studentAcct'][7];

if () {
  //Validates Username
  if($uName == '') {
    array_push($outgoing, "uNameErr"=>"Username is required.");
  } else {
    $uName = test_input($uName);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]*$/",$uName)) {
      array_push($outgoing, "uNameErr"=>"Username accepts only letters and numbers.");
    }
  }
  //Validates Password
  if($password == '') {
    array_push($outgoing, "passwordErr"=>"Password is required.");
  } else {
    $password = test_input($password);
    $cPassword = test_input($cPassword);
    // check if Password only contains letters, numbers and special characters
    if (!preg_match("/^[a-zA-Z0-9!@#$%^&*()_+-=[]\{}|;:,./<>?~]*$/",$password)) {
      array_push($outgoing, "passwordErr"=>"Password accepts only letters, numbers and special characters.");
    } else if($password !== $cPassword) {
      array_push($outgoing, "passwordErr"=>"Passwords must match.");
    }
  }
  //Validates Email address
  if($email == '') {
    array_push($outgoing, "emailErr"=>"Email is required.");
  } else {
    $email = test_input($email);
    $cEmail = test_input($cEmail);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($outgoing, "emailErr"=>"Email format is required.");
    } else if($email !== $cEmail) {
      array_push($outgoing, "emailErr"=>"Email addresses must match.");
    }

  }
  //Validates First Name
  if($fName == '') {
    array_push($outgoing, "fNameErr"=>"First Name is required.");
  } else {
    $fName = test_input($fName);
    // check if First Name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fName)) {
      array_push($outgoing, "fNameErr"=>"Only letters and white spaces allowed.");
    }
  }
  //Validates Last Name
  if($lName == '') {
    array_push($outgoing, "lNameErr"=>"Last Name is required.");
  } else {
    $lName = test_input($lName);
    // check if Last Name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lName)) {
      array_push($outgoing, "lNameErr"=>"Only letters and white spaces allowed.");
    }
  }
  //Validates Student ID
  if($studentID == '') {
    array_push($outgoing, "studentIDErr"=>"Student ID is required.");
  } else {
    $studentID = test_input($studentID);
    // check if Last Name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$studentID)) {
      array_push($outgoing, "stydentIDErr"=>"Only numbers allowed.");
    } //else if () //Finish the code to check for 9 digits
  }
}

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

 ?>
