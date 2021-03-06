<?php 
include('php/sql_config.php');
Session_start();
$user=$_SESSION['login_user'];
$query="SELECT public_summary FROM Users WHERE `user_name`='$user';";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	
if($_SERVER["REQUEST_METHOD"] == "POST")
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
$extCategory=$_POST["Category"];

	if(!empty($errorMessage)){
		if(!empty($errorMessage)){
		echo "<div id=\"ErrorColor\" >";
		echo("<p> There was an error with your form:</p>\n");
		echo("<ul>".$errorMessage."</ul>\n");
		echo "</div>";
	}else{
	//Category stuff
	$Catid = "select idTutorialCategories from ctrlp.TutorialCategories where category_title=$extCategory;";
	$catResult=mysql_query($Catid) or die ($error = mysql_error());
	//userid 
	$userquery ="SELECT idUsers FROM Users WHERE `user_name`='$user';";
	$userid=mysql_query($userquery) or die ($error = mysql_error());
	
		$SQL = "INSERT into ctrlp.Tutorials( Users_idUsers, 
		TutorialCategories_idTutorialCategories, title, num_steps,
		post_time, rep_por, rep_neg, tutorial_views, tuttype, summary, 		
							link) Values (".PrepSQL($userid).",".
										   PrepSQL($catResult).",".
										   PrepSQL($ExternTitle).",".
										   PrepSQL(0).",".
										   Now().",".
										   PrepSQL(0).",".
										   PrepSQL(0).",".
										   PrepSQL(0).",".
										   PrepSQL(1).",".
										   PrepSQL($ExternalSummary).",".
										   PrepSQL($ExternalLink).")";
										   
	$results=mysql_query($SQL)or die ($error = mysql_error());
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
}}}}

?>
<!doctype html>
<html>
<?php session_write_close();?>
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
	
	<?php if (!isset($_POST['TutSubmit'])){?>
    A external Tutorial is any tutorial that was created using external resources such as youtube. Or was created by someone else but something that you thought was useful and want to share with other people. 
     <h3> Please Fill in all the fields below:</h3>
     <form method = "POST" action="">
     Tutorial Title:<input type="text" name="ExternalTitle" Size="75" maxlength="150"><br>
      Category: <select name = "Category"><?php 
	 try{
	 include('php/sql_config.php');
     $query = mysql_query("Select category_title from ctrlp.TutorialCategories;");
	 while ($row = mysql_fetch_array($query)){
		 echo "<option value =\"".$row["category_title"]."\">".$row["category_title"]."</option>";
	 }
	 }catch(PDOException $e){
		 echo 'No Results';
	 }
	 ?>
	 Brief Summary of Tutorial:<br> <textarea name="ExternalSummary" rows="5" cols="100" wrap="physical"></textarea><br>
     Link:<input type="Text" name="ExternalLink"Size="85" ><br><br>
     <div id="buttonlook"><input type="submit" value="Submit" name="TutSubmit" /></div>
     </form>
	 
	 <?php }?>
	 
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
