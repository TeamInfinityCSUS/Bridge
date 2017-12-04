<?php
$result_array = array();
$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM content;"; // Prepare Query
$result = $conn->query($sql); // Sends Query

if ($result->num_rows > 0) { //Checks if Query table is empty
    while($row = $result->fetch_assoc()) { // Fetches the first row
        array_push($result_array, $row); // Push the first row into the array
    }
}

echo json_encode($result_array); // Returns the array

$conn->close(); // Close Connection
?>
