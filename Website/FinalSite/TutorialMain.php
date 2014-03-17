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
        <a href="ViewListExternal.php" id="ExternalTutorials">View External Tutorials</a>
      </div>
       <div id="ViewInternTut" >
        <a href="ViewListInternal.php" id="InternalTutorials">View Internal Tutorials</a>
      </div>
       <div id="CreateaTutorial" >
=======
=======
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
	  <div id="ViewExternTut" >
        <a href="ViewListExternal.php" id="ExternalTutorials">View External Tutorials</a>
      </div>
      <div id="ViewInternTut" >
        <a href="ViewListInternal.php" id="InternalTutorials">View Internal Tutorials</a>
      </div>
      <div id="CreateaTutorial" >
<<<<<<< HEAD
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
=======
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
        <a href="CreateAExternalTut.php" id="createTutorials">Create a External Tutorial</a>
      </div>
      <div id="CreateaTutorial" >
        <a href="CreateAInternalTut.php" id="createTutorials">Create a Internal Tutorial</a>
      </div>
    </div> 
    <div id="content">
     

<<<<<<< HEAD
<<<<<<< HEAD
      <div id="featDownload" class="inset-text-white">
=======
      <div id="featureTut" class="inset-text-white">
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
=======
      <div id="featureTut" class="inset-text-white">
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
        <h1  class="inset-text-white">Feature Tutorials</h1>
        <?php include('php/FeatureTut.php');?>
               
      </div>
<<<<<<< HEAD
<<<<<<< HEAD
      <div id="featTutorial">
=======
      <div id="newTut">
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
=======
      <div id="newTut">
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
        <h1  class="inset-text-white">New Tutorials</h1>
        
        <h3 class="inset-text-white"> Internal Tutorials: These are tutorials that are created by you!</h3>
        <?php include('php/newInternTut.php');?>
        <h3 class="inset-text-white"> External Tutorials: These are tutorials that are from a outside source!</h3>
        <?php include('php/newExterTut.php');?>
<<<<<<< HEAD
<<<<<<< HEAD
      </div>      
=======
=======
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
      </div>  


	  
<<<<<<< HEAD
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
=======
>>>>>>> b6624d468580f35a46ddeb5d349342b96e9b9687
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
