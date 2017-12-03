<?php
$outgoing = 0;
$incoming1 = $_POST['log'][0]; // username
$incoming2 = $_POST['log'][1]; // password
$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge');
if ($conn->connect_error) {
     die("Connection to database failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM site_members;";
$result = $conn->query($sql);

// encrypted (username or email + password + verified) $row['is_verified']
$incoming1 = crypt( strtolower($incoming1).''.$incoming2, '$#kn0^__wN@1_saL7;l');

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { // {Column_name_key : field_value}
        if (hash_equals( crypt(strtolower($row['email']).''.$row['password'], '$#kn0^__wN@1_saL7;l'), $incoming1 ) ||
            hash_equals( crypt(strtolower($row['username']).''.$row['password'], '$#kn0^__wN@1_saL7;l'), $incoming1 )
           ){
                $outgoing = crypt( strtolower($row['username']).''.$row['password'], '$#kn0^__wN@1_saL7;l');
        }
    }
}

echo json_encode($outgoing); // outgoing is the encrypted database item
$conn->close();
?>

