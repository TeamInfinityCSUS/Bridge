<?php

if(isset($_POST['action']) && !empty($_POST['action'])) { //control module, html file sends requests with certain string and this will determine which function to call
    $action = $_POST['action'];
    switch($action) {
		case 'init': init(); break;
        case 'cards' : generateCards();break;
    }
}
function init(){
	$user_info = array();
	$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
	if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM users WHERE username = 'HHill';"; // Prepare Query
	$result = $conn->query($sql); // Sends Query

	if ($result->num_rows > 0) { //Checks if Query table is empty
		while($row = $result->fetch_assoc()) { // Fetches the first row
			array_push($user_info, $row); // Push the first row into the array
		}
	}
	$result = json_encode($user_info);
	echo $result; // Returns the array
	
	$conn->close(); // Close Connection
}

function generateCards(){ //function to generate video cards, may possibly split fetching database data to different function
  $content = array();
	$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
	if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM content;"; // Prepare Query
	$result = $conn->query($sql); // Sends Query

	if ($result->num_rows > 0) { //Checks if Query table is empty
		while($row = $result->fetch_assoc()) { // Fetches the first row
			array_push($content, $row); // Push the first row into the array
		}
	}
	$result = json_encode($content);
	echo $result; // Returns the array
	
	$conn->close(); // Close Connection
  foreach($content as $row){ //card generation, will post videos based on fetched database info
    echo "<div class=\"card mx-auto\" style=\"width: 20rem;\">
            <img class=\"card-img-top\" src=\"...\" alt=\"Thumbnail\">
            <div class=\"card-block\">
              <h3 class=\"card-title\">$row[1]</h3>
              <div class=\"card-footer text-muted\">
              <p>By: $row[3]</p>
              <p>Uploaded $row[4]</p>
              <p>$row[5] Views</p>
              <p>$row[6] Likes</p>
              </div>
              </div>
              </div>";
    }
}
?>
