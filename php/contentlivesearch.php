<?php
$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
}
$sql = 'SELECT * FROM content;'; // Prepare Query
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
if ($result->num_rows > 0) { //Checks if Query table is empty
        //$_POST['search] is an array [0] is incoming search by. [1] is incoming search on bar. [2] is
    while($i < $_POST['search'][2] and $row = $result->fetch_assoc()) { // Fetches the first row
        if ( substr_compare($_POST['search'][1],$row[$_POST['search'][0]],0,strlen($_POST['search'][1]),true) !== 0 ){
                continue;
        }
    $result_array .= '<tr>';
        $result_array .= '<td>' . $row['CID'] . '</td>';
        $result_array .= '<td>' . $row['kind'] . '</td>';
        $result_array .= '<td>' . $row['username'] . '</td>';
        $result_array .= '<td>' . $row['field'] . '</td>';
        //$result_array .= '<td>' . $row['content'] . '</td>';
        //$result_array .= '<td>' . $row['description'] . '</td>';
        $result_array .= '<td>' . $row['time_posted'] . '</td>';
        $result_array .= '<td>' . $row['data_posted'] . '</td>';
        $result_array .= '<td>' . $row['views'] . '</td>';
        $result_array .= '<td>' . $row['likes'] . '</td>';
        $result_array .= '<td>' . $row['eternship'] . '</td>';
        $result_array .= '<td>' . '<button type="button" onclick="contentverify('.$i.')">Verify</button>';
        $result_array .= '<td>' . '<button type="button" onclick="contentliveedit('.$i.')">Edit</button>';
        $result_array .= '<td>' . '<button type="button" onclick="contentdelete('.$i.')">Delete</button>';
        array_push($outlisting,$row['CID']);
    $result_array .= '</tr>';
        $i += 1;
    }
}
echo json_encode( array('outstring'=>$result_array,'outlisting'=>$outlisting) );
//echo json_encode($result_array);
//echo json_encode($outlasting);

$conn->close(); // Close Connection
?>
