<?php
	
if(isset($_POST['action']) && !empty($_POST['action'])) { //control module, html file sends requests with certain string and this will determine which function to call
    $action = $_POST['action'];
    switch($action) {
		case 'init': init(); break; //fetch user info and fill in profile
		case 'cards' : generateCards();break; //generate content
		case 'eProfile' : changeBio();break; //update new self bio
		case 'viewP' : viewProfile();break;
		case 'upload' : uploadContent();break;
    }
}
function init(){
	$username = $_POST['name'];
	$user_info = array();
	$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
	if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM site_members,creators,students WHERE site_members.username = $username;"; // Prepare Query
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

function viewProfile(){
	$user_info = array();
	$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
	if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM site_members,creators,students WHERE username = 'HHill' AND (site_members.username = creators.username OR site_members.username = students.username);"; // Prepare Query
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
    echo "<div class=\"card mx-auto\" style=\"width: 20rem;\" data-toggle =\"modal\" data-target = \"Player\">
            <img class=\"card-img-top\" src=\"https://www.img.youtube.com/vi/$row[4]/hqdefault.jpg\" alt=\"Thumbnail\">
            <div class=\"card-block\">
              <h3 class=\"card-title\">$row[1]</h3>
              <div class=\"card-footer text-muted\">
              <p class = \"viewp\">By: $row[2]</p>
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
              <div class=\"card-footer text-muted\">
              <p>By: $row[2]</p>
              <p>Uploaded $row[7]</p>
              <p>$row[8] Views</p>
              <p>$row[9] Likes</p>
              </div>
              </div>
              </div>";
	           }
   if($row[1] == 'announcement'){
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
function changeBio(){ //changes user's bio and returns it back to the page to change on the fly
	$newBio = $_POST['newBio'];
	$username = $_POST['name'];
	$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
	if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
	}
	$sql = "UPDATE site_members SET bio = $newBio WHERE username = $username;"; // Query to update bio with new bio
	$result = $conn->query($sql); // returns success msg, no need to use further
	echo $result;
	$conn->close(); // Close Connection
}
function uploadContent(){ //uploads content to database
	$date = date("m d,Y");
	$time = date("h:i a");
	$cType = $_POST['type'];
	$cWho = $_POST['who'];
	$cField = $_POST['field'];
	$cDesc = $_POST['desc'];
	if($_POST['type'] == eternship) $et = 1;
	else $et = 0;
	$conn = new mysqli('athena.ecs.csus.edu','bridge_user','bridge_db','bridge'); // Opens Database
	if ($conn->connect_error) { // Connection Check
     die("Connection to database failed: " . $conn->connect_error);
	}
    if($_POST['type'] == video){
     $vID = substr($_POST['URL'],31,11); //store youtube's video ID into database, every URL is the same other than ID
	 $sql = "INSERT INTO content (kind,username,field,content,description,time_posted,date_posted,views,likes,eternship) VALUES ($cType,$cWho,$vID,$cField,$cDesc,$date,$time,0,0,$et;"; // insert video info into database
    }
    if($_POST['type'] == post){
	 $sql = "INSERT INTO content (kind,username,field,content,description,time_posted,date_posted,views,likes,eternship) VALUES ($cType,$cWho,\"post\",$cField,$cDesc,$date,$time,0,0,$et;"; // insert post info into database
    }
	$result = $conn->query($sql);

	$conn ->close();
}
?>
