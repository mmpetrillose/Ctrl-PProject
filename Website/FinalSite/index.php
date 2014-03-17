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
    <div id="slideshow" style="content: url(./img/Front.jpg);">
    </div>
      <?php
        include('php/featdown.php');
        include('php/feattut.php');
        include('php/popups.php');
      ?>
  </div>

  <?php include('php/footer.php');?>
</div>
</body>
</html>
