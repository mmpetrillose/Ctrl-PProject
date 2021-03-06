<?php 
include('php/sql_config.php');
Session_start();
if(isset($_POST['TutSubmit'])){ 
$user=$_SESSION['login_user'];
session_write_close();

		$sql="SELECT idUsers FROM ctrlp.Users WHERE user_name='$user';";
		$Userid=mysql_query($sql) or die ($error = mysql_error());
	
if($_POST['TutSubmit']=="Submit"){	
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
	
$InternTitle = $_POST["Internaltitle"];
$InternSummary=$_POST["InternalSummary"];
$inCategory=$_POST["Category"];

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
	
		$SQL = "INSERT into ctrlp.Tutorials( Users_idUsers, 
		TutorialCategories_idTutorialCategories, title, num_steps,
		post_time, rep_por, rep_neg, tutorial_views, tuttype, summary, 		
							link) Values (".PrepSQL($Userid).",".
										   PrepSQL($catResult).",".
										   PrepSQL($InternTitle).",".
										   PrepSQL(0).",".
										   Now().",".
										   PrepSQL(0).",".
										   PrepSQL(0).",".
										   PrepSQL(0).",".
										   PrepSQL(0).",".
										   PrepSQL($InternSummary).")";
										   
	$results=mysql_query($SQL)or die ($error = mysql_error());
	if($results){
	//add the steps to the database
	
	
	
	
	
	
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
}}}}}

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
<script src="js/search.js"></script><br>
<script type="text/javascript">
var count = 0;
$(function(){
    $('p#add_field').click(function(){
        count += 1;
        $('#container').append(
                '<strong>Step #' + count + '</strong><br />' 
                + '<input id="field_' + count + '" name="fields[]' + '" type="text" size="75" /><br />' );
    
    });
});
</script> 

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
    <h1> Create A Internal Tutorial:</h1>
   A Internal tutorial is a tutorial that is created by Ctrl-p's users. Users can submit tutorials on all different topics.  
     <h3> Please Fill in all the fields below:</h3>
     
	 
	 <?php if (!isset($_POST['btnSubmit'])) {?>
     <form name = "test" method ="post" action="">
     Title: <input type="text" name="Internaltitle" id="internalTitle"  size="75"/><br>
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
     </select><br>
	 Brief Summary of Tutorial:<br> <textarea name="InternalSummary" rows="5" cols="100" wrap="physical"></textarea><br>
     <div id="container">
      <p id="add_field"><a href="#"><span>&raquo; Add a Step to your Tutorial</span></a></p>
        </div>
      <input id ="go" name="btnSubmit" type="submit" />
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
