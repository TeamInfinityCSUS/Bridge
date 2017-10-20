<?php

if(isset($_GET['action']) && !empty($_GET['action'])) { //control module, html file sends requests with certain string and this will determine which function to call
    $action = $_GET['action'];
    switch($action) {
        case 'cards' : generateCards();break;
    }
}

function generateCards(){ //function to generate video cards, may possibly split fetching database data to different function
  $results = array();
  $videos = array( //2D Array of videos of the form (id,title,field,author,date uploaded,views,likes), will most likely be changed later
    array(001,"Title 1","Computer Science","Bob","October 12th, 2017",500,10),
    array(002,"Title 2","Mechanical Engineering","Mary","October 2nd,2017",250,5),
    array(003,"Title 3","Civil Engineering","Tom","October 11th,2017",50,1),
    array(004,"Title 4","Network Security","Walter","October 17th,2017",75,23),
    array(005,"Title 5","Civil Engineering","Jim","October 17th,2017",125,6),
    array(006,"Title 6","Civil Engineering","Rebecca","October 12th,2017",323,31),
    array(007,"Title 7","Civil Engineering","Dylan","October 7th,2017",255,21),
    array(008,"Title 8","Civil Engineering","Fred","October 5th,2017",456,32),
    array(009,"Title 9","Civil Engineering","George","October 3rd,2017",678,32),
    array(010,"Title 10","Civil Engineering","Jerry","October 17th,2017",111,12),
    array(010,"Title 11","Civil Engineering","Kate","October 22th,2017",522,25),
    array(010,"Title 12","Civil Engineering","Michael","August 11th,2017",343,22)
  );
  for($i = 0; $i < 12; $i++){ //card generation, will post videos based on fetched database info
    echo '<div class="card mx-auto" style="width: 20rem;">
            <img class="card-img-top" src="..." alt="Thumbnail">
            <div class="card-block">
              <h4 class="card-title">$videos[i][1]</h4>
              <div class="card-footer text-muted">
              <h4>By: $videos[i][3]</h4>
              <h4>Uploaded $videos[i][4]</h4>
              <h4>$videos[i][5] Views</h4>
              <h4>$videos[i][6] Likes</h4>
              </div>
              </div>
              </div>';
    }
}
?>
