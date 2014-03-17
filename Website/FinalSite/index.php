<html>
<head>
<meta charset="utf-8">
<title>Ctrl-P</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/overlay.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper" class="clearfix">
  <?php include('php/header.php');?>

  <div id="content">
    <div id="slideshow">
      Slideshow Here
    </div>
    <div id="featDownload" class="inset-text-white">
      <h1  class="inset-text-white">Feature Download</h1>
      <?php include('php/featdown.php');?>
    </div>
    <div id="featTutorial">
      <h1  class="inset-text-white">Feature Tutorial</h1>
      <?php include('php/feattut.php');?>
    </div>

    <?php include('php/popups.php');?>
  </div>

  <?php include('php/footer.php');?>
</div>
</body>
</html>
