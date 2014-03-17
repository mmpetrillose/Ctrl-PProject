<?php
	include('php/sql_config.php');
	//create query
	$query= "SELECT tut.idTutorials, tut.title, tut.summary, tutUsers.user_name, cat.category_title
			FROM ctrlp.Tutorials AS tut
			JOIN ctrlp.Users AS tutUsers ON tut.Users_idUsers = tutUsers.idUsers
			JOIN ctrlp.TutorialCategories AS cat ON tut.TutorialCategories_idTutorialCategories = cat.idTutorialCategories
			ORDER BY rep_pos DESC 
			LIMIT 1";
	
	//execute Query
	$result = mysql_query($query) or die ("Error in query: $query.".mysql_error());
	
	while($rows=mysql_fetch_array($result)){
		echo "<div id=\"TutormaFront\">";
		echo "<h3> Title: ";
		echo "<a href=\"viewInternTut.php?tutid='".$rows["idTutorials"]."'\">";
		echo $rows["title"]."</a></h3>"; 
		echo "<strong> Author:</strong> ".$rows["user_name"]."<br>"; 
		echo "<strong> Category:</strong> ".$rows["category_title"]."<br>";
		echo "<strong> Summary:</strong> ".$rows["summary"];
		echo "</div>";
	}
 
	?>