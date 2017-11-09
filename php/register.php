<?php
// define variables and set to empty values
$uNameErr = $passwordErr = $emailErr = $fNameErr = $lNameErr = $studentIDErr = "";
$uName = $password = $cPassword = $email = $cEmail = $fName = $lName = $studentID = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //Validates Username
  if(empty($_POST["uName"])) {
    $uNameErr = "Username is required";
  } else {
    $uName = test_input($_POST["uName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]*$/",$uName)) {
      $uNameErr = "Only letters and numbers allowed";
    }
  }
  //Validates Password
  if(empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    $cPassword = test_input($_POST["cPassword"]);
    // check if Password only contains letters, numbers and special characters
    if (!preg_match("/^[a-zA-Z0-9!@#$%^&*()_+-=[]\{}|;:,./<>?~]*$/",$password)) {
      $passwordErr = "Only letters and white space allowed";
    } else if($password !== $cPassword) {
      $passwordErr = "Passwords must match";
    }
  }
  //Validates Email address
  if(empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    $cEmail = test_input($_POST["cEmail"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    } else if($email !== $cEmail) {
      $emailErr = "Email addresses must match";
    }

  }
  //Validates First Name
  if(empty($_POST["fName"])) {
    $fNameErr = "First Name is required";
  } else {
    $fName = test_input($_POST["fName"]);
    // check if First Name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fName)) {
      $fNameErr = "Only letters and white space allowed";
    }
  }
  //Validates Last Name
  if(empty($_POST["lName"])) {
    $lNameErr = "Last Name is required";
  } else {
    $lName = test_input($_POST["lName"]);
    // check if Last Name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lName)) {
      $lNameErr = "Only letters and white space allowed";
    }
  }
  //Validates Student ID
  if(empty($_POST["studentID"])) {
    $studentIDErr = "Student ID is required";
  } else {
    $studentID = test_input($_POST["studentID"]);
  }
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
