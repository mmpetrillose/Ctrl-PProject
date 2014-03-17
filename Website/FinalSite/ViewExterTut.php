<?php
include('php/sql_config.php');
	session_start();
$Tutorialid=$_GET['tutid'];
$_SESSION['tutorialID'] = $Tutorialid;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ctrl-P</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/overlay.css" rel="stylesheet" type="text/css">
<link href="css/tutorial.css" rel="stylesheet" type="text/css" />
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
        <a href="CatalogMain.php" id="catalog">Catalog</a>
      </div>
      <div id="tutorialDiv"  class="inset-text-grey">
        <a href="TutorialMain.php" id="tutorial">Tutorial</a>
      </div>
      <div id="search">
        <input type="text" size="35" placeholder="Search..." />
      </div>
      <div id="profile" class="inset-text-grey">
        <?php include('php/accountcontrol.php');?>
      </div>
    </div>
    <div id="tutorialOptions">
    <div id="ViewExternTut" >
        <a href="ViewListExternal.php" id="ExternalTutorials">View External Tutorials</a>
      </div>
       <div id="ViewInternTut" >
        <a href="ViewListInternal.php" id="InternalTutorials">View Internal Tutorials</a>
      </div>
       <div id="CreateaTutorial" >
        <a href="CreateAExternalTut.php" id="createTutorials">Create a External Tutorial</a>
      </div>
      <div id="CreateaTutorial" >
        <a href="CreateAInternalTut.php" id="createTutorials">Create a Internal Tutorial</a>
      </div>
    </div> 
    <div id="content">
     <h2> External Tutorial</h2>

    <div id="Tutormalong">
	<?php include('php/tutrating.php');?>
     <?php include('php/displayextdata.php');?>
     </div>
   
        <a href="" class="overlay" id="loginForm"></a>
        <div class="popup inset-text-white centered" id="login">
          <?php include('php/loginpop.php');?>
        </div> 
        <a href="" class="overlay" id="joinForm"></a>
        <div class="popup inset-text-white centered" id="join">
          <?php include('php/joinpop.php');?>
        </div>
    </div>
    <div id="footer">
      <a href="" id="about">About</a> |
      <a href="" id="help">Help</a> |
      <a href="" id="contactUs">Contact Us</a>
    </div>
</div>
</body>
</html>
