<?php
  $profilePage = $_GET['user'];
  $editmode = $_GET['edit'];
  if(!isset($profilePage) || $profilePage=="")
  {
    header("Location: index.php");
  }
  if($editmode=='true')
  {
    $current_user=$_SESSION['login_user'];
    #if($current_user==$profilePage)
    #{
     #header("Location: profile.php?user=$profilePage");
    #}
  }
?>
<html>
<head>
<meta charset="utf-8">
<title>Profile</title>
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
      <?php
        if($editmode=="true")
        {
          include('php/modifyprofile.php');
        }
        else
        {
          include('php/profilecontent.php');
        }
      ?>
      <a href="" class="overlay" id="loginForm"></a>
        <div class="popup inset-text-white centered" id="login">
          <?php include('php/loginpop.php');?>
        </div>
        <a href="" class="overlay" id="joinForm"></a>
        <div class="popup inset-text-white centered" id="join">
          <?php include('php/joinpop.php');?>
        </div>
    </div>
    <div id="footer" class"inset-text-grey">
      <a href="" id="about">About</a> |
      <a href="" id="help">Help</a> |
      <a href="" id="contactUs">Contact Us</a>
    </div>
</div>
</body>
</html>
