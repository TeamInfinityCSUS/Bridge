<?php
$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
}
if ($_POST['funct']==='verify'){
        $sql = 'UPDATE site_members SET is_verified = NOT is_verified WHERE username=\''.$_POST['num'].'\''; // Prepare Query
        //$sql = 'UPDATE users SET is_verified = 1 WHERE username='.$_POST['num'];
}
if ($_POST['funct']==='delete'){
        $sql = 'DELETE FROM site_members WHERE username=\''.$_POST['num'].'\''; // Prepare Query
}

$result = $conn->query($sql); // Sends Query

$conn->close(); // Close Connection
?>

