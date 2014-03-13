<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Homepage</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/overlay.css" rel="stylesheet" type="text/css">
<script src="js/JQuery1_11_0.js"></script>
<script src="js/search.js"></script>
</head>
<body>
<div id="wrapper" class="clearfix">
    <div id="header">
      <div id="homeDiv" class="inset-text-grey">
        <a href="index.php" id="home">Ctrl-P</a>
      </div>
      <div id="catalogDiv" class="inset-text-grey">
        <a href="" id="catalog">Catalog</a>
      </div>
      <div id="tutorialDiv"  class="inset-text-grey">
        <a href="" id="tutorial">Tutorial</a>
      </div>
      <div id="search">
        <input type="text" size="35" placeholder="Search..." />
      </div>
      <div id="profile" class="inset-text-grey">
        <?php include('php/accountcontrol.php');?>
      </div>
    </div>
    <div id="content">
      <div id="userIndentificationDiv">
        User Info
      </div>
      <div id="userSummaryDiv">
        <h3 class="inset-text-white">Summary</h3>
      </div>
      <div id="collabChatDiv">
        Collaborator Chat
      </div>
      <div id="downloadedModelDiv">
        <h3 class="inset-text-white">Downloads</h3>
      </div>
      <div id="uploadedModelDiv">
        <h3 class="inset-text-white">Uploads</h3>
      </div>
      <div id="collaboratorModelDiv">
        <h3 class="inset-text-white">Collaborator Models</h3>
      </div>
      <div id="privateModelDiv">
        <h3 class="inset-text-white">Private Models</h3>
      </div>
      <!-- popup Login -->
        <a href="#x" class="overlay" id="loginForm"></a>
        <div class="popup inset-text-white centered" id="login">
          <div id="username">
            <label for="login">Username</label><br/>
            <input type="text" id="login" value="" />
          </div>
          <div id="password">
            <label for="password">Password</label><br/>
            <input type="password" id="password" value="" />
          </div>
          <div id="submital">
            <input type="button" value="Login" />
          </div>
        </div>
      <!-- End of Login Popup-->
      <!-- popup Sign up -->
        <a href="#x" class="overlay" id="joinForm"></a>
        <div class="popup inset-text-white centered" id="join">
          <div id="newUsernameDiv">
            <label for="newUsername">Username</label>
            <input type="text" id="newUsername" value="" />
          </div>
          <div id="emailDiv">
            <label for="email">Email</label>
            <input type="text" id="email" value="" />
          </div>
          <div id="emailVerifyDiv">
            <label for="emailVerify">Confirm-Email</label>
            <input type="text" id="emailVerify" value="" />
          </div>
          <div id="newPasswordDiv">
            <label for="newPassword">Password</label>
            <input type="password" id="newPassword" value="" />
          </div>
          <div id="passwordVerifyDiv">
            <label for="passwordVerify">Confirm-Password</label>
            <input type="password" id="passwordVerify" value="" />
          </div>
          <div id="joinDiv">
            <input type="button" value="Join" />
          </div>
        </div>
        <!-- end sign up-->
    </div>
    <div id="footer">
      <a href="" id="about">About</a> |
      <a href="" id="help">Help</a> |
      <a href="" id="contactUs">Contact Us</a>
    </div>
</div>
</body>
</html>
