<?php
// Define variables and set to empty values
$outgoing = array();
$uNameErr = $passwordErr = $emailErr = $fNameErr = $lNameErr = $studentIDErr = "";
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
      $passwordErr = "Only letters and white space allowed";
    } else if($password !== $cPassword) {
      $passwordErr = "Passwords must match";
    }
  }
  //Validates Email address
  if($email == '') {
    $emailErr = "Email is required";
  } else {
    $email = test_input($email);
    $cEmail = test_input($cEmail);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    } else if($email !== $cEmail) {
      $emailErr = "Email addresses must match";
    }

  }
  //Validates First Name
  if($fName == '') {
    $fNameErr = "First Name is required";
  } else {
    $fName = test_input($fName);
    // check if First Name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fName)) {
      $fNameErr = "Only letters and white space allowed";
    }
  }
  //Validates Last Name
  if($lName == '') {
    $lNameErr = "Last Name is required";
  } else {
    $lName = test_input($lName);
    // check if Last Name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lName)) {
      $lNameErr = "Only letters and white space allowed";
    }
  }
  //Validates Student ID
  if($studentID == '') {
    $studentIDErr = "Student ID is required";
  } else {
    $studentID = test_input($studentID);
  }
}

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

 ?>
