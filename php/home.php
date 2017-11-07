<?php

if(isset($_POST['action']) && !empty($_POST['action'])) { //control module, html file sends requests with certain string and this will determine which function to call
    $action = $_POST['action'];
    switch($action) {
		case 'init': init(); break; //fetch user info and fill in profile
		case 'cards' : generateCards();break; //generate content
		case 'eProfile' : changeBio();break; //update new self bio
		case 'upload' : uploadContent();break;
    }
}
function init(){
	$user_info = array();
	$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
	if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM site_members,creators,students WHERE username = 'HHill';"; // Prepare Query
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
	$sql = "SELECT * FROM content;"; // Grab all content from database, will refine later
	$result = $conn->query($sql); // receive list of content

	if ($result->num_rows > 0) { //while list is not empty
		while($row = $result->fetch_assoc()) { // fetch row
			array_push($content, $row); // push row into array
		}
	}
	$conn->close(); // Close Connection

  foreach($content as $row){ //card generation, will post content based on fetched database info
	if($row[1] == 'video'){
    echo "<div class=\"card mx-auto\" style=\"width: 20rem;\">
            <img class=\"card-img-top\" src=\"...\" alt=\"Thumbnail\">
            <div class=\"card-block\">
              <h3 class=\"card-title\">$row[1]</h3>
              <div class=\"card-footer text-muted\">
              <p>By: $row[2]</p>
              <p>Uploaded $row[7]</p>
              <p>$row[8] Views</p>
              <p>$row[9] Likes</p>
              </div>
              </div>
              </div>";
	}
	if($row[1] == 'post'){
    echo "<div class=\"card mx-auto\" style=\"width: 20rem;\">
            <div class=\"card-block\">
              <h3 class=\"card-title\">$row[1]</h3>
              <div class=\"card-footer text-muted\">
              <p>By: $row[2]</p>
              <p>Uploaded $row[7]</p>
              <p>$row[8] Views</p>
              <p>$row[9] Likes</p>
              </div>
              </div>
              </div>";
	}
    }
}
function changeBio(){
	$newBio = $_POST['newBio'];
	$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
	if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
	}
	$isql = "UPDATE users SET about_us = $newBio WHERE username = 'HHill';"; // Query to update bio with new bio
	$iresult = $conn->query($isql); // returns success msg, no need to use further

	$osql = "SELECT about_us FROM users WHERE username = 'HHill'"; //get updated bio to update profile live
	$oresult = $conn->query($osql); //receive string

	$conn->close(); // Close Connection
}
function uploadContent(){
	$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
	if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
	}
	$sql = "INSERT INTO content () VALUES ();"; // insert content into database
	$result = $conn->query($sql);

	$conn ->close();
}
?>
