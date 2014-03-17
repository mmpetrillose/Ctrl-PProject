<?php
//connect to SQL
	include('php/sql_config.php');
	$Modid=$_SESSION['modelID'];
	echo "<div id=\"alignRight\">";
	echo "<Strong><Font size =\"5\"> Rate Page: </font></strong>";
	echo "<a href=\"likeDesign.php?modid=".$Modid."\">";
	echo "Like Design</a> |";
	echo "<a href=\"dislikeDesign.php?modid=".$Modid."\">Dislike Design</a>";
	echo "</div>";
	