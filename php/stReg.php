<?php
//Define variables and set to empty values
$outgoing = array();  //will hold any error messages
$uName = $_POST['studentAcct'][0];
$password = $_POST['studentAcct'][1];
$cPassword = $_POST['studentAcct'][2];
$email = $_POST['studentAcct'][3];
$cEmail = $_POST['studentAcct'][4];
$fName = $_POST['studentAcct'][5];
$lName = $_POST['studentAcct'][6];
$studentID = $_POST['studentAcct'][7];
//Validates Username
$uName = test_input($uName);
if($uName == '') {
  // array_push($outgoing, "uNameErr"=>"Required");
}// else {
//   // check if username only contains letters and numvbers
//   if (!preg_match("/^[a-zA-Z0-9]*$/",$uName)) {
//     array_push($outgoing, "uNameErr"=>"Only letters and numbers.");
//   }
// }
echo json_encode(array($outgoing));

// //Validates Password
// $password = test_input($password);
// $cPassword = test_input($cPassword);
// if(empty($password)) {
//   array_push($outgoing, "passwordErr"=>"Required.");
// } else {
//   // check if Password only contains letters, numbers and special characters
//   if (!preg_match("/^[a-zA-Z0-9!@#$%^&*()]*$/",$password)) {
//     array_push($outgoing, "passwordErr"=>"Only letters, numbers and special characters.");
//   } else if($password !== $cPassword) {
//     array_push($outgoing, "passwordErr"=>"Passwords must match.");
//   }
// }
// //Validates Email address
// $email = test_input($email);
// $cEmail = test_input($cEmail);
// if(empty($email)) {
//   array_push($outgoing, "emailErr"=>"Required.");
// } else {
//   // check if e-mail address is properly formatted
//   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     array_push($outgoing, "emailErr"=>"Invalid email format.");
//   } else if($email !== $cEmail) {
//     array_push($outgoing, "emailErr"=>"Email addresses must match.");
//   }
// }
// //Validates First Name
// $fName = test_name($fName);
// if(empty($fName)) {
//   array_push($outgoing, "fNameErr"=>"Required.");
// } else {
//   // check if First Name only contains letters and whitespace
//   if (!preg_match("/^[a-zA-Z ]*$/",$fName)) {
//     array_push($outgoing, "fNameErr"=>"Only letters and white spaces allowed.");
//   }
// }
// //Validates Last Name
// $lName = test_name($lName);
// if(empty($lName)) {
//   array_push($outgoing, "lNameErr"=>"Required.");
// } else {
//   // check if Last Name only contains letters and whitespace
//   if (!preg_match("/^[a-zA-Z ]*$/",$lName)) {
//     array_push($outgoing, "lNameErr"=>"Only letters and white spaces allowed.");
//   }
// }
// //Validates Student ID
// $studentID = test_input($studentID);
// if(empty($studentID)) {
//   array_push($outgoing, "studentIDErr"=>"Required.");
// } else {
//   // check if Last Name only contains letters and whitespace
//   if (!preg_match("/^[0-9]*$/",$studentID)) {
//     array_push($outgoing, "studentIDErr"=>"Only numbers allowed.");
//   } else if (strlen($studentID) > 9 || strlen($studentID) < 9) {
//     array_push($outgoing, "studentIDErr"=>"Must be 9 didgits.")
//   }
// }
// //If there are no error messages, then the data is safe to be added to the database
// if(count($outgoing) == 0) {
//   $conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
//   if ($conn->connect_error) { // Connection Check
//        die("Connection to database failed: " . $conn->connect_error);
//   }
//
//   //sets up the Student query
//   $addStudent = "INSERT INTO site_member(username, password, email, fname, lname, acc_type, is_verified)
//   VALUES ($uName, $password, $email, $fName, $lName, 'Student', 0);
//   INSERT INTO students(username, school_id)
//   VALUES ($uName, $studentID)";
//
//   if($conn->multi_query($addStudent) === TRUE) {
//
//     echo "console.log('New record created successfully')";
//   } else {
//     echo "console.log('Error: ' . $addStudent . '<br>' . $conn->error)";
//   }
//   $conn->close(); // Close Connection
// } else {
//  echo json_encode(array($outgoing));
// }
//Function to test the strings
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
//Function to test name strings
function test_name($data) {
$data = htmlspecialchars($data);
return $data;
}
?>
