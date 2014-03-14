<?php
	$query="SELECT Color FROM UserColors JOIN Users ON UserColors.idUserColors=Users.UserColors_idUserColors WHERE user_name='$login_session';";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	$color=$row['Color'];
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
	<div id="colortag" style="background-color: #<?php echo $color;?>">
	</div>
	<div id="theuser">
		<a href="profile.php?user=<?php echo $login_session?>"><?php echo $login_session?></a>
	</div>
</body>
</html>
