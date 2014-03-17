<?php
	$profilePage = $_GET['user'];
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
    <div id="collaboratebutton">
      <a href="php/collaborate.php?user=<?php echo $profilePage?>">Collaborate!</a>
    </div>
</body>
</html>