<?php
	include('php/sql_config.php');
	session_start();
	//create query
	$query= "select tut.idTutorials,tut.title,tutuser.user_name
			,tut.rep_neg,tut.rep_pos from ctrlp.Tutorials as tut
			join ctrlp.Users as tutuser on tut.Users_idUsers=tutuser.idUsers
			order by tut.rep_pos desc limit 5;";
	
	//execute Query
	$result = mysql_query($query) or die ("Error in query: $query.".mysql_error());
	
	while($row = mysql_fetch_array($result)){
		echo "<div id=\"Tutorma\">";
		echo "<h3> Title: ";
		echo "<a href=\"viewExterTut.php?tutid='".$rows["idTutorialLink"]."'\">";
		echo $rows["title"]."</a></h3>"; 
		echo "<h4> Author: ".$rows["user_name"]."</h4>";  
		echo "<h4> Positive Rating: ".$rows["rep_pos"]. "</h4>";
		echo "<h4> Negative Rating: ".$rows["rep_neg"]."</h4>"; 
		echo "</div><br>";
	}
	?>