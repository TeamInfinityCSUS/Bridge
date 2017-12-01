<?php
$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); //Opens Database
if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
}
$sql = 'SELECT * FROM site_members;'; // Prepare Query
$result = $conn->query($sql); // Sends Query

$studentarray = '<option value = "AllStudent">All Student</option>';
$creatorarray = '<option value = "AllCreator">All Creator</option>';
$badminarray = '<option value = "AllBAdmin">All BAdmin</option>';
$adminarray = '<option value = "AllAdmin">All Admin</option>';
if ($result->num_rows > 0) { //Checks if Query table is empty
        //$_POST['search] is an array [0] is incoming search by. [1] is incomingsearch on bar. [2] is
    while($row = $result->fetch_assoc()) { // Fetches the first row
        if ($row['acc_type']==='Student'){
                $studentarray .= '<option value = \''. $row['email'] .'\'>'. $row['username'] .'</option>';
        }
        if ($row['acc_type']==='Creator'){
                $creatorarray .= '<option value = \''. $row['email'] .'\'>'. $row['username'] .'</option>';
        }
        if ($row['acc_type']==='BAdmin'){
                $creatorarray .= '<option value = \''. $row['email'] .'\'>'. $row['username'] .'</option>';
        }
        if ($row['acc_type']==='Admin'){
                $adminarray .= '<option value = \''. $row['email'] .'\'>'. $row['username'] .'</option>';
        }
    }
}
echo json_encode( array('studentemail'=>$studentarray,'creatoremail'=>$creatorarray,'badminemail'=>$badminarray,'adminemail'=>$adminarray) );

$conn->close(); // Close Connection
?>
