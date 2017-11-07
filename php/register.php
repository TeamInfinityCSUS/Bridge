<?php
// define variables and set to empty values
$uName = $password = $email = $fName = $lName = $studentID = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$uName = test_input($_POST["uName"]);
$password = test_input($_POST["password"]);
$email = test_input($_POST["email"]);
$fName = test_input($_POST["fName"]);
$lName = test_input($_POST["lName"]);
$studentID = test_input($_POST["studentID"]);
}

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}


// if(isset($_POST['studentAcct']) && !empty($_POST['studentAcct'])) { //control module, html file sends requests with certain string and this will determine which function to call
//   echo console.log("In the php student control module.");
//   studentReg();
// } else if (isset($_POST['creatorAcct']) && !empty($_POST['creatorAcct'])) {
//   echo console.log("In the php creator control module.");
//   creatorReg();
// }

//Student registration function
function studentReg() {
  echo conole.log("In the student registration function");
  // $conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
  // if ($conn->connect_error) { // Connection Check
  //      die("Connection to database failed: " . $conn->connect_error);
  // }
  //
  // //sets up the Student query
  // $addStudent = "INSERT INTO site_member(username, password, email, fname, lname, acc_type, is_verified)
  // VALUES ($student[3], $student[4], $student[6], $student[1], $student[2], 'student', 0);
  // INSERT INTO students(school_id, primary_interest, secondary_interest)
  // VALUES ($student[0], $student[8], $student[9])";
  //
  // if($conn->multi_query($addStudent) === TRUE) {
  //
  //   echo "console.log('New record created successfully')";
  // } else {
  //   echo "console.log('Error: ' . $addStudent . '<br>' . $conn->error)";
  // }
  //   $conn->close(); // Close Connection
}  //studentReg()

//Creator registration function
function creatorReg() {

    echo conole.log("In the creator registration function");
  // $conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
  // if ($conn->connect_error) { // Connection Check
  //      die("Connection to database failed: " . $conn->connect_error);
  // }
  //
  // //sets up the Creator query
  // $addCreator = "INSERT INTO site_member(username, password, email, fname, lname, acc_type, is_verified)
  // VALUES ($creator[2], $creator[3], $creator[5], $creator[0], $creator[1], 'creator', 0);
  // INSERT INTO creators(field, ref_name, ref_email)
  // VALUES ($creator[7], $creator[8], $creator[9])";
  //
  // if($conn->multi_query($addCreator) === TRUE) {
  //   echo "console.log('New record created successfully')";
  // } else {
  //   echo "console.log('Error: ' . $addCreator . '<br>' . $conn->error)";
  // }  //else
  //
  // $conn->close(); // Close Connection
}  //creatorReg()
?>
