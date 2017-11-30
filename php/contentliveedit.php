<?php
$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
}
$sql = 'SELECT * FROM content WHERE CID=\''.$_POST['num'].'\''; // Prepare Query
$result = $conn->query($sql); // Sends Query
$result_array = "";
if ($result->num_rows > 0) { //Checks if Query table is empty
    while($row = $result->fetch_assoc()) { // Fetches the first row
        $result_array .= 'Video ID<label class="form-control" id="e11" value="' . $row['CID'] . '">'. $row['CID'] .'</label>';
        $result_array .= 'Kind<input type="text" class="form-control" id="e1" value="' . $row['kind'] . '">';
        $result_array .= 'Uploader:<input type="text" class="form-control" id="e2" value="' . $row['username'] . '">';
        $result_array .= 'Interest:<input type="text" class="form-control" id="e3" value="' . $row['field'] . '">';
        $result_array .= 'Content:<textarea rows="4" class="form-control" cols="25" id="e4">'. $row['content'] .'</textarea>';
        $result_array .= 'Description:<textarea rows="4" class="form-control" cols="25" id="e5">'. $row['description'] .'</textarea>';
        $result_array .= 'Time Posted:<input type="text" class="form-control" id="e6" value="' . $row['time_posted'] . '">';
        $result_array .= 'Date Posted:<input type="text" class="form-control" id="e7" value="' . $row['date_posted'] . '">';
        $result_array .= 'Views:<input type="text" class="form-control" id="e8" value="' . $row['views'] . '">';
        $result_array .= 'Likes:<input type="text" class="form-control" id="e9" value="' . $row['likes'] . '">';

        $result_array .= '<br>Eternship: <select id="e10"><option ';
        if ($row['eternship']==="1"){$result_array .= 'selected ';}
        $result_array .= 'value=1>Yes</option><option ';
        if ($row['eternship']==="0"){$result_array .= 'selected ';}
        $result_array .= 'value=0>No</option></select>';

        $result_array .= '<br><button type="button" onclick="contentediting(1)">Apply</button>';
        $result_array .= '<button type="button" onclick="contentediting(0)">Cancel</button>';
    }
}
//echo json_encode( array('outstring'=>$result_array,'outlisting'=>$outlisting) );
echo $result_array;
//echo json_encode($outlasting);

$conn->close(); // Close Connection
?>
