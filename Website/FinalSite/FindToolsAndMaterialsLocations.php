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
	 <h2> Find Tools and Materials Locations</h2>
     <h4> Define: Tools and materials locations are locations that are posted by a Ctrl-P user. These are posted so other users can find a place that sells 3D printing tools and materials.</h4>
        <?php include('php/ListToolsAndMaterialsLocations.php');?>
        
           
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
