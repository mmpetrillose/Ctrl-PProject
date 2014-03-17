<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
<?php
include('php/sql_config.php');
	session_start();
$Tutorialid=$_GET['tutid'];
$_SESSION['tutorialID'] = $Tutorialid;
?>

<<<<<<< HEAD
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
=======
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
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
<<<<<<< HEAD
<<<<<<< HEAD
      <div id="homeDiv" class="inset-text-grey">
=======
       <div id="homeDiv" class="inset-text-grey">
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
=======
       <div id="homeDiv" class="inset-text-grey">
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
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
<<<<<<< HEAD
<<<<<<< HEAD
    <div id="ViewExternTut" >
        <a href="" id="ExternalTutorials">View External Tutorials</a>
      </div>
       <div id="ViewInternTut" >
        <a href="" id="InternalTutorials">View Internal Tutorials</a>
=======
=======
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
   <div id="ViewExternTut" >
        <a href="ViewListExternal.php" id="ExternalTutorials">View External Tutorials</a>
      </div>
       <div id="ViewInternTut" >
        <a href="ViewListInternal.php" id="InternalTutorials">View Internal Tutorials</a>
<<<<<<< HEAD
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
=======
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
      </div>
       <div id="CreateaTutorial" >
        <a href="CreateAExternalTut.php" id="createTutorials">Create a External Tutorial</a>
      </div>
      <div id="CreateaTutorial" >
        <a href="CreateAInternalTut.php" id="createTutorials">Create a Internal Tutorial</a>
      </div>
    </div> 
    <div id="content">
     <h2> Internal Tutorial</h2>
<<<<<<< HEAD
<<<<<<< HEAD
     <?php include('php/tutrating.php');?>
     
     <div id="Tutormalong">
=======
=======
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
     
     
     <div id="Tutormalong">
	<?php include('php/tutrating.php');?>
<<<<<<< HEAD
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
=======
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
 	<?php include('php/displayintdata.php'); ?>  
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
