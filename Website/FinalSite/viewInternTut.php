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
    <div id="tutorialOptions">
    <div id="ViewExternTut" >
        <a href="" id="ExternalTutorials">View External Tutorials</a>
      </div>
       <div id="ViewInternTut" >
        <a href="" id="InternalTutorials">View Internal Tutorials</a>
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
     <div id="Tutormalong">
     <?php
//connect to SQL
	include('php/sql_config.php');
	session_start();
	$Tutorialid=$_GET['tutid'];
	$query = "Select tut.title, tut.post_time, tut.rep_neg
			, tut.rep_pos, cat.category_title, tutusers.user_name
			from ctrlp.Tutorials tut
			join ctrlp.TutorialCategories cat on tut.TutorialCategories_idTutorialCategories= cat.idTutorialCategories
			Join ctrlp.Users tutusers on tut.Users_idUsers=tutusers.idUsers
			where`tut.idTutorials`='$Tutorialid';";
	$result = mysql_query($query) or die ($error = mysql_error());
	
	$stepQuery="Select media_title,media_location
				from ctrlp.TutorialMedia
				where `Tutorials_idTutorials`='$Tutorialid';";
	$Stepresult=mysql_query($stepQuery) or die ($error = mysql_error());
	
	echo "<h2>Tutorial Title: ".$result["title"]."</h2>";
	echo "<h3>Author: ".$result["user_name"]."</h3>";
	echo "<h3>Date created: ".$result["post_time"]."</h3>";
	echo "<h3>Category: ".$result["category_title"]."</h3>";
	echo "<h3>Positive: ".$result["rep_pos"]."     Negative: ".$result["rep_neg"]."</h3>";
	
	echo "<h2> Tutorial Steps:</h2>";
	
	while($row=mysql_fetch_array($Stepresult)){
	    echo "<div id=\"Tutormalong\">";
		echo "<h3> Step number".$rows["media_title"]."</h3>";
		echo "<h4>".$row['media_location']."</h4>";
		echo "</div>";
	}	
	
?>
     
     
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
