<?php
  $profilePage = $_GET['user'];
  if(!isset($profilePage) || $profilePage=="")
  {
    header("Location: index.php");
  }
?>
<html>
<head>
<meta charset="utf-8">
<title>Profile</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/overlay.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper" class="clearfix">
  <?php include('php/header.php');?>

  <div id="content">
    <?php
      include('php/profilecontent.php');
      include('php/popups.php');
    ?>
  </div>

  <?php include('php/footer.php');?>
</div>
</body>
</html>
