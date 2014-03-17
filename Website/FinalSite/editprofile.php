<?php
  session_start();
  $profilePage=trim($_GET['user']);
  $current_user=trim($_SESSION['login_user']);
  if($current_user!=$profilePage)
  {
    header("Location: profile.php?user=$profilePage");
  }
  $numb=strcmp($profilePage, $current_user);
?>
<head>
<meta charset="utf-8">
<title>Edit Profile</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/overlay.css" rel="stylesheet" type="text/css">
<script src="js/JQuery1_11_0.js"></script>
<script src="js/search.js"></script>
</head>
<body>
<div id="wrapper" class="clearfix">
  <?php include('php/header.php');?>

  <div id="content">
    <?php include('php/modifyprofile.php');?>
  </div>

  <?php  include('php/footer.php');?>
</div>
</body>
</html>