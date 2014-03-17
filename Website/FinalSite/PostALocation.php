<?php
	Session_start();
	$user=$SESSION['login_user'];

if (isset($_POST['btnSubmit'])) {
	
   include('php/sql_config.php');
	session_start();
    
    $sql="SELECT idUsers FROM Users WHERE `user_name`='$user';";
    $Userid=mysql_query($sql) or die ($error = mysql_error());
if($_POST['btnSubmit']=="Submit")
{ 
$errorMessage="";
	if(empty($user)){
		$errorMessage .="<li> You must be logged in to Post a Location!</li>";
	}
	if(empty($_POST["InternalTitle"])){
		$errorMessage .="<li> You forgot to enter the Location Title!</li>";
	}
$InternalTitle = $_POST["InternalTitle"];
$InternalComment = $_POST["InternalComment"];
$InCategory=$_POST["Category"];
$InternalEmail=$_POST["InternalEmail"];
$InternalAddress=$_POST["InternalAddress"];
$InternalPhone=$_POST["InternalPhone"];

	if(!empty($errorMessage)){
		echo("<p> there was an error with your form:</p>\n");
		echo("<ul>".$errorMessage."</ul>\n");
	}else{
		$Catid = "select idServiceCategories from ctrlp.ServiceCategories where `category_title`='$InCategory';";
		$catResult=mysql_query($Catid) or die ($error = mysql_error());
		$sqlServices = "INSERT into ctrlp.Services( Users_idUsers, ServiceCategories_idServiceCategories, service_title, service_comment,   		
				post_date) Values (".PrepSQL($Userid).",".
									PrepSQL($catResult).",".
									PrepSQL($InternalTitle).",".
									PrepSQL($InternalComment).",".
									Now().")";								   
	$results=mysql_query($sqlServices);
	if($results){
		$serviceid = "select idServices from ctrlp.Services where `title`='$InternalTitle';";
		$ResultsServiceID= mysql_query($serviceid) or die ($error = mysql_error());	
    if ($_POST['fields']) {    
        foreach($_POST['fields'] as $servicevalue) {
		 $contactsql= "INSERT into ctrlp.ContactInfo( Services_idServices, alternate_email, address, phone) Values (".PrepSQL($ResultsServiceID).",".
									PrepSQL($InternalEmail).",".
									PrepSQL($InternalAddress).",".
									PrepSQL($InternalPhone).",".
									PrepSQL(mysql_real_escape_string($servicevalue)).")";      
		$stepsqlresult=mysql_query($contactsql) or die ($error = mysql_error());
							
        }  
    } else{}
    echo "<h1> Location Added!</h1>";
	}else{
		echo("<br> Location was not created. Please try again!");
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
        <a href="CatalogMain.php" id="Designs">View Designs</a>
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
	 <h2> Post a Print or Tools and Materials Location:</h2>
     <h4> Locations are locations that are posted by a Ctrl-P user. Print locations are posted so other users can find a place that will print their design (or model). Tools and materials locations are posted so other users can find a place that sells 3D printing tools and materials.</h4>
	 
	 <?php if (!isset($_POST['btnSubmit'])) {?>
     <form name = "test" method ="post" action="">
     Title: <input type="text" name="InternalTitle" id="InternalTitle"  size="75"/><br>
     Category: <select name = "Category"><?php 
		 try{
		 include('php/sql_config.php');
		session_start();
		 $query = mysql_query("Select printloca from ctrlp.ServiceCategories;");
		 while ($row = mysql_fetch_array($query)){
			 echo "<option value =\"".$row["printloca"]."\">".$row["printloca"]."</option>";
		 }
		 }catch(PDOException $e){
			 echo 'No Results';
		 }
	 ?>
     </select>
     <div id="container">
      <p id="add_field"><a href="#"><span>&raquo; Add contact information to your Location</span></a></p>
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
