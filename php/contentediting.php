<?php
$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
}
if ($_POST['funct']==='verify'){
        $sql = 'UPDATE content SET likes = likes + 1 WHERE CID=\''.$_POST['num'].'\''; // Prepare Query
}
if ($_POST['funct']==='delete'){
        $sql = 'DELETE FROM content WHERE CID=\''.$_POST['num'].'\''; // Prepare Query
}

if ($_POST['funct']==='edit'){
        $sql = 'UPDATE content SET kind=\''.$_POST['num'][0].'\', ';
        $sql .= 'username=\''.$_POST['num'][1].'\', ';
        $sql .= 'field=\''.$_POST['num'][2].'\', ';
        $sql .= 'content=\''.$_POST['num'][3].'\', ';
        $sql .= 'description=\''.$_POST['num'][4].'\', ';
        $sql .= 'time_posted=\''.$_POST['num'][5].'\', ';
        $sql .= 'date_posted=\''.$_POST['num'][6].'\', ';
        $sql .= 'views=\''.$_POST['num'][7].'\', ';
        $sql .= 'likes=\''.$_POST['num'][8].'\', ';
        $sql .= 'eternship=\''.$_POST['num'][9].'\' ';
        $sql .= 'WHERE CID=\''.$_POST['num'][10].'\''; // Prepare Query
}

$result = $conn->query($sql); // Sends Query

$conn->close(); // Close Connection
?>
