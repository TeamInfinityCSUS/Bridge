<?php
//Define variables and set to empty values
$outgoing = [];  //will hold any error messages
$uName = $_POST['creatorAcct'][0];
$password = $_POST['creatorAcct'][1];
$cPassword = $_POST['creatorAcct'][2];
$email = $_POST['creatorAcct'][3];
$cEmail = $_POST['creatorAcct'][4];
$fName = $_POST['creatorAcct'][5];
$lName = $_POST['creatorAcct'][6];
$prName = $_POST['creatorAcct'][7];
$prEmail = $_POST['creatorAcct'][8];
$intField = $_POST['studentAcct'][9];

$uName = test_input($uName);  //Validate Username
if(empty($uName)) {
    array_push($outgoing, array('uNameErr'=>'Required'));
//} else if (!preg_match('/^[a-zA-Z]*$/',$uName)) {
//     //check if username only contains letters and numbers
//     array_push($outgoing, "uNameErr", "Only letters and numbers.");
//   }
}

$password = test_input($password);   //Validate Password
$cPassword = test_input($cPassword);
if(empty($password)) {
    array_push($outgoing, array('passwordErr'=>'Required'));
} else if ($password !== $cPassword) {
    array_push($outgoing, array('passwordErr'=>'Passwords must match.'));
//} else if(!preg_match("/^[a-zA-Z0-9!@#$%^&*()]*$/",$password)) {
//    // check if Password only contains letters, numbers and special characters
//    array_push($outgoing, array('passwordErr'=>'Only letters, numbers and special characters.'));
}

$email = test_input($email);  //Validate Email address
$cEmail = test_input($cEmail);
if(empty($email)) {
    array_push($outgoing, array('emailErr'=>'Required.'));
} else if($email !== $cEmail) {
    //Check if emails match
    array_push($outgoing, array('emailErr'=>'Email addresses must match.'));
//} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//    // check if e-mail address is properly formatted
//    array_push($outgoing, array('emailErr'=>'Invalid email format.'));
}

$fName = test_name($fName);  //Validates First Name
if(empty($fName)) {
    array_push($outgoing, array('fNameErr'=>'Required.'));
//} else if (!preg_match("/^[a-zA-Z ]*$/",$fName)) {
//    // check if First Name only contains letters and whitespace
//    array_push($outgoing, array('fNameErr'=>'Only letters and white spaces allowed.'));
}

$lName = test_name($lName);  //Validate Last Name
if(empty($lName)) {
    array_push($outgoing, array('lNameErr'=>'Required.'));
//} else if (!preg_match("/^[a-zA-Z ]*$/",$lName)) {
//    // check if Last Name only contains letters and whitespace
//    array_push($outgoing, array('lNameErr'=>'Only letters and white spaces allowed.'));
}

$prName = test_name($prName);  //Validate Reference Name
if(empty($prName)) {
    array_push($outgoing, array('prNameErr'=>'Required.'));
//} else if (!preg_match("/^[a-zA-Z ]*$/",$prName)) {
//    // check if Last Name only contains letters and whitespace
//    array_push($outgoing, array('prNameErr'=>'Only letters and white spaces allowed.'));
}

$prEmail = test_input($prEmail);  //Validate Email address
if(empty($prEmail)) {
    array_push($outgoing, array('emailErr'=>'Required.'));
//} else if (!filter_var($prEmail, FILTER_VALIDATE_EMAIL)) {
//    // check if e-mail address is properly formatted
//    array_push($outgoing, array('prEmailErr'=>'Invalid email format.'));
}


//If there are no error messages, then the data is safe to be added to the database
if(count($outgoing) == 0) {
    $conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
    if ($conn->connect_error) { // Connection Check
        die("Connection to database failed: " . $conn->connect_error);
    }

    $conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
    $acctType = 'Creator';
    //sets up the query for the SITE_MEMBERS table
    $in1 = "INSERT INTO site_members(username, password, email, fname, lname, acc_type, is_verified)
    VALUES ('$uName', '$password', '$email', '$fName', '$lName', '$acctType', 0)";
    
    //Sets up the wuery for the CREATORS table
    $in2 = "INSERT INTO creators(username, ref_name, ref_email, field)
    VALUES ('$uName', '$prName', '$prEmail', '$intField')";

    if($conn->query($in1) === TRUE && $conn->query($in2) === TRUE) {  //If both queries are successful, it commits
        $conn->commit();
        array_push($outgoing, array('createSuccess'=>'New record created successfully.'));
//        echo "console.log('New record created successfully')";
    } else {
        array_push($outgoing, array('connError'=>[$in1, $in2, $conn->error]));
//        echo "console.log('Error: ' . $in1 . '<br>' . $in2 . '<br>' .$conn->error)";
    }
    $conn->close(); // Close Connection
    echo json_encode($outgoing);  //Send the Error messages back
} else {
    echo json_encode($outgoing);  //Send the Error messages back
}

function test_input($data) {  //Function to test the strings
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function test_name($data) {  //Function to test name strings
    $data = htmlspecialchars($data);
    return $data;
    }
?>