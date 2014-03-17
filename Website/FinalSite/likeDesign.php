<?php
include('php/sql_config.php');
$Modelid=$_GET['modid'];
$_SESSION['modelID'] = $Modelid;

//run update query
$query= "UPDATE ctrlp.Models SET rep_pos=rep_pos+1 where idModels=$Modelid;";
$result = mysql_query($query) or die ("Error in query: $query.".mysql_error());


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
     <h2> Design</h2>
     
     
     <div id="Designmalong">
	<h3> Thanks for Rating this design we thank you for your time!</h3>
	If you wish to go back to the design that you were just viewing 
	<?php echo "<a href=\"ViewDesign.php?modid=".$Modelid."\">Click Here</a>";?>
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
