<?php
if ($_POST['subject']==='' || $_POST['message'] === '') {exit('Subject and Message is required.');}

$subject = $_POST['subject'];
$message = $_POST['message'];
$emailarray = array();
$emaillist = $_POST['to'];
if (array_key_exists('All',$emaillist) ||
 array_key_exists('AllStudent',$emaillist) ||
 array_key_exists('AllCreator',$emaillist) ||
 array_key_exists('AllBAdmin',$emaillist) ||
 array_key_exists('AllAdmin',$emaillist)
){
        $conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
        if ($conn->connect_error) { // Connection Check
                die("Connection to database failed: " . $conn->connect_error);
        }
        $sql = 'SELECT * FROM site_members'; // Prepare Query
        $result = $conn->query($sql); // Sends Query and grab entire database

        if ($result->num_rows > 0) { //Checks if Query table is empty
                while($row = $result->fetch_assoc()) { // Fetches the first row
                        if ( !array_key_exists('All',$emaillist) &&
                         !( array_key_exists('AllStudent',$emaillist) && $row['acc_type']==='Student' ) &&
                         !( array_key_exists('AllCreator',$emaillist) && $row['acc_type']==='Creator' ) &&
                         !( array_key_exists('AllBAdmin',$emaillist) && $row['acc_type']==='BAdmin' ) &&
                         !( array_key_exists('AllAdmin',$emaillist) && $row['acc_type']==='Admin' )
                         ){
                                continue; // skips current row
                        }
                        $emailarray[$row['email']]=true;
                }
        }
}
// Remove those Tags
unset( $emaillist['All'], $emaillist['AllStudent'], $emaillist['AllCreator'], $emaillist['AllBAdmin'], $emaillist['AllAdmin'] );

$emailto = array_merge($emailarray, $emaillist);

// The email array will = false if the email send fails. Warning: Successful delivery does not imply successful recieve.
foreach ( $emailto as $key => $value ){
        if ( !mail($key, $subject, $message,'From: NoReply') ){
                echo 'Sent Fail: '.$key;
        }
}
echo 'Email Sent';
//echo json_encode( $emailto );
?>
