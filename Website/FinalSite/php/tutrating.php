<?php
//connect to SQL
	include('php/sql_config.php');
	$Tutid=$_SESSION['tutorialID'];
	echo "<div id=\"alignRight\">";
	echo "<Strong><Font size =\"5\"> Rate Page: </font></strong>";
	echo "<a href=\"likeTutorial.php?tutid=".$Tutid."\">";
	echo "Like Tutorial</a> |";
	echo "<a href=\"dislikeTutorial.php?tutid=".$Tutid."\">Dislike Tutorial</a>";
	echo "</div>";
	