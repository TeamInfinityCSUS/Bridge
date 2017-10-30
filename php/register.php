<?php
$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
}

$addStudent = "INSERT INTO site_member(username, firstname, lastname, password, email)
VALUES ($student[0], $student[1], $student[2], $student[3], $student[4])";

if($conn->query($addStudent) === TRUE) {

  echo "console.log('New record created successfully')";
} else {
  echo "console.log('Error: ' . $addStudent . '<br>' . $conn->error)";
}

$conn->close(); // Close Connection
?>
