<?php
	include('php/sql_config.php');
	session_start();
	//create query
	$query= "select tut.idTutorialLink, tut.title , tut.summary, tutuser.user_name 			from ctrlp.TutorialLink as tut join ctrlp.Users as tutuser on 	
			tut.Users_idUsers=tutuser.idUsers 
			order by tut.post_date desc limit 5;";
	
	//execute Query
	$result = mysql_query($query) or die ("Error in query: $query.".mysql_error());
	
	echo "<table cellpadding='5px'>";
	while($row = mysql_fetch_array($result)){
		echo "<tr>" ; 
		echo "<td><h3>";
		echo "<a href=\"viewExterTut.php?tutid='".$rows["idTutorialLink"]."'\">";
		echo $rows["title"]."</a></h3></td>"; 
		echo "<td><h4>".$rows["user_name"]."</h4></td></tr>"; 
		echo "<tr></tr>" ; 
	}
	echo "</table>"; 
	?>