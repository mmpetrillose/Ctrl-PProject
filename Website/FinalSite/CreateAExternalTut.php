
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
include('php/sql_config.php');
session_start();
 $sql="SELECT idUsers FROM Users WHERE `user_name`='$current_user';";
 $Userid=mysql_query($sql) or die ($error = mysql_error());
 
if($_POST['submit']=="Submit")
{ 
$errorMessage="";
	if(empty($current_user)){
		$errorMessage .="<li> You must be logged in to Create a Tutorial!</li>";
	}
	if(empty($_POST["ExternalTitle"])){
		$errorMessage .="<li> You forgot to enter the Tutorial Title!</li>";
	}
	if(empty($_POST["ExternalSummary"])){
		$errorMessage .="<li> You forgot to enter the Tutorial Summary!</li>";
	}
	if(empty($_POST["ExternalLink"])){
		$errorMessage .="<li> You forgot to enter the Tutorials Link!</li>";
	}
$ExternTitle = $_POST["ExternalTitle"];
$ExternSummary=$_POST["ExternalSummary"];
$ExternalLink= $_POST["ExternalLink"];
	if(!empty($errorMessage)){
		echo("<p> there was an error with your form:</p>\n");
		echo("<ul>".$errorMessage."</ul>\n");
	}else{
		$SQL = "INSERT into ctrlp.TutorialLink( Users_idUsers, title, summary, 		
				post_date, link) Values (".PrepSQL($Userid).",".
										   PrepSQL($ExternTitle).",".
										   PrepSQL($ExternSummary).",".
										   Now().",".
										   PrepSQL($ExternalLink).")";
										   
	$results=mysql_query($SQL);
	if($results){
		echo("<br> Tutorial was created!");
	}else{
		echo("<br> Tutorial was not created Please try again!");
	}
	
	
	function PrepSQL($value){
		//Stripslaches
		if(get_magic_quotes_gpc()) 
    {
        $value = stripslashes($value);
    }
    // Quote
    $value = "'" . mysql_real_escape_string($value) . "'";
 
    return($value);
} 
		
	}

}
}

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
    <h1> Create A External Tutorial:</h1>
    A external Tutorial is any tutorial that was created using external resources such as youtube. Or was created by someone else but something that you thought was useful and want to share with other people. 
     <h3> Please Fill in all the fields below:</h3>
     <form method = "POST" action="">
     Tutorial Title:<input type="text" name="ExternalTitle" Size="75" maxlength="150"><br>
     Brief Summary of Tutorial:<br> <textarea name="ExternalSummary" rows="5" cols="100" wrap="physical"></textarea><br>
     Link:<input type="Text" name="ExternalLink"Size="85" ><br>
     
     <input type="submit" value="Submit" name="submit" />
     </form>
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
