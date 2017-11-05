<?php
$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
}
if ($_POST['funct']==='verify'){
        $sql = 'UPDATE site_members SET is_verified = NOT is_verified WHERE username=\''.$_POST['num'].'\''; // Prepare Query
}
if ($_POST['funct']==='delete'){
        $sql = 'DELETE FROM site_members WHERE username=\''.$_POST['num'].'\''; // Prepare Query
}
if ($_POST['funct']==='edit'){
        $sql = 'UPDATE site_members SET username=\''.$_POST['num'][0].'\', ';
        $sql .= 'email=\''.$_POST['num'][1].'\', ';
        $sql .= 'fname=\''.$_POST['num'][2].'\', ';
        $sql .= 'lname=\''.$_POST['num'][3].'\', ';
        $sql .= 'acc_type=\''.$_POST['num'][4].'\', ';
        $sql .= 'is_verified=\''.$_POST['num'][5].'\' ';
        $sql .= 'WHERE username=\''.$_POST['num'][0].'\''; // Prepare Query
}

$result = $conn->query($sql); // Sends Query

$conn->close(); // Close Connection
?>


