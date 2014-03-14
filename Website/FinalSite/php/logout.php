<?php
$profilePage = $_GET['user'];

    $query="SELECT Color FROM UserColors JOIN Users ON UserColors.idUserColors=Users.UserColors_idUserColors WHERE user_name='$profilePage';";
    $result=mysql_query($query);
    $row=mysql_fetch_array($result);
    $color=$row['Color'];
    $rgbcolor=hex2rgb($color);
    $rgbvalue="rgba($rgbcolor[0],$rgbcolor[1],$rgbcolor[2],1.00)";
    $shadevalue="background-color: #$color; color: rgba(112,112,112, 0.8); text-shadow: 1px 4px 6px $rgbvalue, 0 0 0 #000, 1px 4px 6px $rgbvalue;";

if (isset($_POST['logout']))
{
	session_start();
	if(session_destroy())
	{
	header("Location: index.php");
	}
}
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
	<div id="logout">
		<form action="" method="POST">
			<input type="submit" name="logout" style="$shadevalue" value="Logout">
		</form>
    </div>
</body>
</html>