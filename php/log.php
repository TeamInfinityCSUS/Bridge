<?php
$outgoing = 0;
$incoming1 = $_POST['log'][0];
$incoming2 = $_POST['log'][1];
$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge');
if ($conn->connect_error) {
     die("Connection to database failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM site_members;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { // {Column_name_key : field_value}
        if ((strtolower($incoming1)===strtolower($row['email']) || $incoming1===$row['username']) && $incoming2===$row['password'] && 1==$row['is_verified']){
                $outgoing = $row['username'];
        }
    }
}

echo json_encode($outgoing);
$conn->close();
?>
