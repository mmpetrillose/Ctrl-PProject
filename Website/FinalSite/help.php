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
    <div id="content">
	<h2> Help and FQA</h2>
	Below are some commonly asked questions. If you can't find the answer to your question below please feel free to <a href="contact.php" id="contactUs">Contact Us</a>.
	<div id="Tutormalong" >
	<h3> How do I sign in?</h3>
	In the upper right hand corner there you will fine "login and join" if you have already signed up then select Login.
	If you are new to Ctrl-p than select Join and sign up for a account. And Welcome to Ctrl-P!
	</div>
	<div id="Tutormalong" >
	<h3> What is a tutorial?</h3>
	A tutorial is usual some instructional material that is meant to help you complete a task.
	</div>
	<div id="Tutormalong" >
	<h3> Can I create a tutorial?</h3>
	Yes you can. You will simiply have to sign up/login to your account. And Navigate to the tutorial section and select the tutorial type that you would like to create.
		<br><strong> There are two types of tutorials:</strong> <br>
		<strong> Internal:</strong> These are tutorials that are made by you the users. 
		<br><strong> External:</strong> These are tutorials that you have found on the internet that have been created using different resources like YouTube.
	</div>
      <div id="Tutormalong" >
	<h3> What is a design?</h3>
	A design is what you use to print off a item using a 3D printer.
	</div>
	<div id="Tutormalong" >
	<h3> Do you display information about print locations, materials, etc.?</h3>
	Yes we do you can find that information in the catalog section. These sources are inputed by Ctrl-P's user base. 
	</div> 
	<div id="Tutormalong" >
	<h3> Do you print stuff or can we buy pre-printed stuff?</h3>
	No we don't. We are sorely here to create a means for you to get information.
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
      <a href="about.php" id="about">About</a> |
      <a href="help.php" id="help">Help</a> |
      <a href="contact.php" id="contactUs">Contact Us</a>
    </div>
</div>
</body>
</html>
