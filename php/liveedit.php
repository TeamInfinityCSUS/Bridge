<?php
$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
}
$sql = 'SELECT * FROM users WHERE username=\''.$_POST['num'].'\''; // Prepare Query
$result = $conn->query($sql); // Sends Query

$result_array = "";
if ($result->num_rows > 0) { //Checks if Query table is empty
    while($row = $result->fetch_assoc()) { // Fetches the first row
        $result_array .= 'Last Name:<input type="text" class="form-control" id="editing1" placeholder="' . $row['last_name'] . '">';
        $result_array .= 'First Name:<input type="text" class="form-control" id="editing2" placeholder="' . $row['first_name'] . '">';
        $result_array .= 'Email:<input type="text" class="form-control" id="editing3" placeholder="' . $row['email'] . '">';
        $result_array .= 'Username<input type="text" class="form-control" id="editing4" placeholder="' . $row['username'] . '">';
        $result_array .= 'Account Type<input type="text" class="form-control" id="editing5" placeholder="' . $row['account_type'] . '">';
        $result_array .= 'Verified<input type="text" class="form-control" id="editing6" placeholder="' . $row['is_verified'] . '">';
        $result_array .= '<button type="button" onclick="editing(1)">Apply</button>';
        $result_array .= '<button type="button" onclick="editing(0)">Cancel</button>';
    }
}
//echo json_encode( array('outstring'=>$result_array,'outlisting'=>$outlisting) );
echo $result_array;
//echo json_encode($outlasting);

$conn->close(); // Close Connection
?>
