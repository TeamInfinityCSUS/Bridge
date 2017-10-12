<!-- DOCTYPE -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bridge: Home</title>
    <meta charset="utf-8">
    <!-- Viewport Meta Tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <h1> <!--Heading, includes Logo, Profile button, and other menu buttons -->
      Bridge
      <img src="images/defaultavatar.png" height = "40" width = "40" id = "hPic" class="rounded float-right" data-toggle = "modal" data-target="#Profile"><br />
    <button type="button" class="btn blue btn-sm">Internships</button>
     <!-- if user is student, button will be "Internships", if user is content creator, button will be "Manage Content" -->
    <button type="button" class="btn blue btn-sm">Manage Content</button>
    <button type="button" class="btn blue btn-sm">Fab Five</button>
    <button type="button" id = "aButton" class="btn blue btn-sm" data-toggle = "modal" data-target = "#aSet">Admin</button>
    <!--only visible if user is admin -->
    <img src="images/settingsicon.png" height = "40" width = "40" id = "oPic" class="rounded float-right" data-toggle = "modal" data-target="#Settings">
    <!--image will be whatever user sets avatar to -->
  </h1>
  <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"> <!-- Container for cards -->
    <div class="card mx-auto" style="width: 20rem;">
      <!--card generation will be a PHP for loop, using a 2D array of user and video info to generate 12 cards -->
      <img class="card-img-top" src="..." alt="Thumbnail">
      <div class="card-block">
        <h4 class="card-title">Example 1</h4>
        <div class="card-footer text-muted">
          <h4>By: Mary</h4>
          <h4>Uploaded 12 hours ago</h4>
        </div>
      </div>
    </div>
</div>
<!-- Profile page,Edit Profile page and Settings page, activated and swapped by buttons -->
  <div class="modal fade" id="Profile" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" id = "pHeader">
          <img src="images/defaultavatar.png" id = "pPic" class="img-thumbnail">
          <div class="modal-body">
             <!--Profile info will be whatever user used during registration and profile editing -->
            <h2 id="pName">Bob</h2>
            <p id="pAffil">Intel Corporation</p>
            <p id="pRole">Senior Software Engineer</p>
      </div>
      </div>
      <div class="modal-body">
        <div id = "Bio">Static profile info here</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="rPB">Report</button>
         <!--only visible if profile is someone else's -->
        <button type="button" class="btn blue" id="ePB" data-toggle ="modal" data-target = "#eProfile">Edit Profile</button>
        <!-- Only visible if profile is one's own -->
      </div>
    </div>
    </div>
    </div>

    <div class="modal fade" id="eProfile" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" id = "pHeader">
            <img src="images/defaultavatar.png" id = "pPic" class="img-thumbnail">
            <div class="modal-body"> <!--Same as above, editable through reaching database -->
              <h2 id="pName">Bob</h2>
              <p id="pAffil">Intel Corporation</p>
              <p id="pRole">Senior Software Engineer</p>
            </div>
          </div>
        <div class="modal-body"> <!--If profile is edited, note changes to database -->
          <input class="text input-lg fluid" id ="newProfile"></input>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn blue" id ="sPB" data-dismiss="modal" data-toggle ="modal" data-target = "#Profile">Save</button>
        </div>
      </div>
      </div>
      </div>

      <div class="modal fade" id="Settings" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <div class="modal-body">
              <button type="button" class="btn blue" data-dismiss="modal" data-toggle ="modal" data-target = "eProfile">Change Field</button><br />
              <button type="button" class="btn blue" data-dismiss="modal">Log Out</button>
          </div>
          </div>
        </div>
        </div>
        </div>

        <div class="modal fade" id="aSet" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <div class="modal-body">
                <button type="button" class="btn blue" data-dismiss="modal">View All Accounts</button><br />
                <button type="button" class="btn blue" data-dismiss="modal">Manage Flagged Content</button>
            </div>
            </div>
          </div>
          </div>
          </div>
	<style>
	h1{
		background-color: #1A7CBC;
    height: 90px;
	}
	body{
		background-color: #82CBFB;
	}
  .newProfile{
    height:500px;
  }
  .row{
    margin-bottom: 10px;
    margin-left: 10px;
  }
  .modal-body{
    margin-bottom:5px;
  }
  .aButton{
    background-color: #FF33E3;
  }
  .Settings:active{

  }
  .pAffil:default{
    text-decoration-color: #FF33E3;

  }
  .blue{
    background-color:#B7ABFF;
  }
  .card{
    margin-bottom: 15px;
  }
	</style>

		<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

		<!-- Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

		<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<script> //Javascript for the page here
$(document).ready(function () {
    $('#ePB').click(function onchange() { //fill in edit field with original bio, in case only minor edits are needed
          $('#newProfile').val($('#Bio').html());
      });

    $('#sPB').click(function onchange() { //replace old profile with new one, primitive
          $('#Bio').html($('#newProfile').val());
      });

});

</script>

  </body>
</html>
