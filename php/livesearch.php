<?php
$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
}
$searchlname = $_POST['lastname'];
$sql = "SELECT * FROM users;"; // Prepare Query
$result = $conn->query($sql); // Sends Query
/* ECHO FORMAT
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
*/
$result_array = "";
$outlisting = array();
$i = 0;
$maxi = 2;
if ($result->num_rows > 0) { //Checks if Query table is empty
    while($i < $maxi and $row = $result->fetch_assoc()) { // Fetches the first row
        if ( substr_compare($searchlname,$row['last_name'],0,strlen($searchlname),true) !== 0 ){
                continue;
        }
    $result_array .= '<tr>';
        $result_array .= '<td>' . $row['last_name'] . '</td>';
        $result_array .= '<td>' . $row['first_name'] . '</td>';
        $result_array .= '<td>' . $row['email'] . '</td>';
        $result_array .= '<td>' . $row['username'] . '</td>';
        $result_array .= '<td>' . $row['account_type'] . '</td>';
        $result_array .= '<td>' . $row['is_verified'] . '</td>';
        $result_array .= '<td>' . '<button type="button" onclick="liveverify('.$i.')">Verify</button>';
        $result_array .= '<td>' . '<button type="button" onclick="liveedit('.$i.')">Edit</button>';
        $result_array .= '<td>' . '<button type="button" onclick="livedelete('.$i.')">Delete</button>';
        array_push($outlisting,$row['username']);
    $result_array .= '</tr>';
        $i += 1;
    }
}
echo json_encode( array('outstring'=>$result_array,'outlisting'=>$outlisting) );
//echo json_encode($result_array);
//echo json_encode($outlasting);

$conn->close(); // Close Connection
?>
