<?php
include('php/sql_config.php');
Session_start();


if (isset($_POST['btnSubmit'])) {
	$user=$_SESSION['login_user'];
	session_write_close();
	 
    $sql="SELECT idUsers FROM Users WHERE `user_name`='$user';";
    $Userid=mysql_query($sql) or die ($error = mysql_error());
if($_POST['btnSubmit']=="Submit")
{ 
$errorMessage="";
	if(empty($user)){
		$errorMessage .="<li> You must be logged in to Upload a Design!</li>";
	}
	if(empty($_POST["InternalTitle"])){
		$errorMessage .="<li> You forgot to enter the Design Title!</li>";
	}
$InternalTitle = $_POST["InternalTitle"];
$InternalComment = $_POST["InternalComment"];
$InCategory=$_POST["Category"];
$InternalFileLocation=$_POST["InternalFileLocation"];
$InternalFileTitle=$_POST["InternalFileTitle"];
$InternalFileSize=$_POST["InternalFileSize"];
$InternalUploadSize=$_POST["InternalUploadSize"];
$InternalPrintTime=$_POST["InternalPrintTime"];
$InternalModelComment=$_POST["InternalModelComment"];

	if(!empty($errorMessage)){
		echo("<p> there was an error with your form:</p>\n");
		echo("<ul>".$errorMessage."</ul>\n");
	}else{
		$Catid = "select idModelCategories from ctrlp.ModelCategories where `category_title`='$InCategory';";
		$catResult=mysql_query($Catid) or die ($error = mysql_error());
		$sqlServices = "INSERT into ctrlp.Services( Users_idUsers, ModelCategories_idModelCategories, model_title, upload_date,  		
				model_description) Values (".PrepSQL($Userid).",".
									PrepSQL($catResult).",".
									PrepSQL($InternalTitle).",".
									Now().",".
									PrepSQL($InternalComment).")";								   
	$results=mysql_query($sqlModels);
	if($results){
		$modelid = "select idModels from ctrlp.Models where `title`='$InternalTitle';";
		$ResultsModelID= mysql_query($modelid) or die ($error = mysql_error());	
  	
	if ($_POST['fields']) {    
	$count =0;
        foreach($_POST['fields'] as $modelvalue) {
			$count++;
		 $stepsql= "INSERT into ctrlp.ModelSTLs( Models_idModels, file_location, file_title, file_size, upload_date, upload_size, estimated_print_time, model_comments) Values (".PrepSQL($ResultsModelID).",".
									PrepSQL($InternalFileLocation).",".
									PrepSQL($InternalFileTitle).",".
									PrepSQL($InternalFileSize).",".
									Now().",".
									PrepSQL($InternalUploadSize).",".
									PrepSQL($InternalPrintTime).",".
									PrepSQL($InternalModelComment).",".
									PrepSQL(mysql_real_escape_string($modelvalue)).")";      
		$stepsqlresult=mysql_query($stepsql) or die ($error = mysql_error());
		}  
    } else{}
		
    echo "<h1> Model Added!</h1>";
	}else{
		echo("<br> Model was not uploaded. Please try again!");
	}
	
	
	function PrepSQL($value){
		if(get_magic_quotes_gpc()) {
        $value = stripslashes($value);
    }
    $value = "'" . mysql_real_escape_string($value) . "'";
    return($value);
}}}
    
    
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ctrl-P</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/overlay.css" rel="stylesheet" type="text/css">
<link href="css/catalog.css" rel="stylesheet" type="text/css" />
<script src="js/JQuery1_11_0.js"></script>
<script src="js/search.js"></script>
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
    <div id="CatalogOptions">
    <div id="ListDesigns" >
        <a href="ListDesigns.php" id="Designs">View Designs</a>
      </div>
	  <div id="UploadADesign" >
        <a href="UploadADesign.php" id="UploadDesign">Upload A Design</a>
      </div>
       <div id="FindPrintLocations" >
        <a href="FindPrintLocations.php" id="FindPrintLocations">Find Print Locations</a>
      </div>
       <div id="FindToolsAndMaterialsLocations" >
        <a href="FindToolsAndMaterialsLocations.php" id="FindToolsAndMaterialsLocations">Find Tools and Materials Locations</a>
      </div>
      <div id="PostALocation" >
        <a href="PostALocation.php" id="PostALocation">Post A Location</a>
      </div>
    </div> 
    <div id="content">
	 <h2> Upload a Design:</h2>
     <h4> Designs are designs (or models) that are uploaded by a Ctrl-P user. Designs are uploaded so other users can download and print them.</h4>
	 
	 <?php if (!isset($_POST['btnSubmit'])) {?>
     <form name = "test" method ="post" action="">
     Title: <input type="text" name="InternalTitle" id="InternalTitle"  size="75"/><br>
     Category: <select name = "Category"><?php 
		 try{
		 include('php/sql_config.php');
		session_start();
		 $query = mysql_query("Select category_title from ctrlp.ModelCategories;");
		 while ($row = mysql_fetch_array($query)){
			 echo "<option value =\"".$row["category_title"]."\">".$row["category_title"]."</option>";
		 }
		 }catch(PDOException $e){
			 echo 'No Results';
		 }
	 ?>
     </select>
     <div id="container">
      <p id="add_field"><a href="#"><span>&raquo; Enter your file here:</span></a></p>
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
      <a href="" id="about">About</a> |
      <a href="" id="help">Help</a> |
      <a href="" id="contactUs">Contact Us</a>
    </div>
</div>
</body>
</html>
