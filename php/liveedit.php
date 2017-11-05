<?php
$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
}
$sql = 'SELECT * FROM site_members WHERE username=\''.$_POST['num'].'\''; // Prepare Query
$result = $conn->query($sql); // Sends Query
$pos_acc = array('Student','Creator','Badmin');
$result_array = "";
if ($result->num_rows > 0) { //Checks if Query table is empty
    while($row = $result->fetch_assoc()) { // Fetches the first row
        $result_array .= 'Username<input type="text" class="form-control" id="e1" value="' . $row['username'] . '">';
        $result_array .= 'Email:<input type="text" class="form-control" id="e2" value="' . $row['email'] . '">';
        $result_array .= 'First Name:<input type="text" class="form-control" id="e3" value="' . $row['fname'] . '">';
        $result_array .= 'Last Name:<input type="text" class="form-control" id="e4" value="' . $row['lname'] . '">';

        $result_array .= 'Account Type: <select id="e5"><option ';
        if ($row['acc_type']==="Student"){$result_array .= 'selected ';}
        $result_array .= 'value="Student">Student</option><option ';
        if ($row['acc_type']==="Creator"){$result_array .= 'selected ';}
        $result_array .= 'value="Creator">Creator</option><option ';
        if ($row['acc_type']==="Badmin"){$result_array .= 'selected ';}
        $result_array .= 'value="Badmin">Badmin</option></select>';

        $result_array .= '<br>Verified: <select id="e6"><option ';
        if ($row['is_verified']==="1"){$result_array .= 'selected ';}
        $result_array .= 'value=1>Verify</option><option ';
        if ($row['is_verified']==="0"){$result_array .= 'selected ';}
        $result_array .= 'value=0>Unverify</option></select>';

        $result_array .= '<br><button type="button" onclick="editing(1)">Apply</button>';
        $result_array .= '<button type="button" onclick="editing(0)">Cancel</button>';
    }
}
//echo json_encode( array('outstring'=>$result_array,'outlisting'=>$outlisting) );
echo $result_array;
//echo json_encode($outlasting);

$conn->close(); // Close Connection
?>


