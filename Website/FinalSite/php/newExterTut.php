

<?php
//New External Tutorials php page

	//connect to SQL
	include('php/sql_config.php');
	
	//create query
	$query = "SELECT tut.idTutorials, tut.title, tut.summary, tutUsers.user_name, cat.category_title, tut.post_time, tut.tuttype
			FROM ctrlp.Tutorials AS tut
			JOIN ctrlp.Users AS tutUsers ON tut.Users_idUsers = tutUsers.idUsers
			JOIN ctrlp.TutorialCategories AS cat ON tut.TutorialCategories_idTutorialCategories = cat.idTutorialCategories
			where tuttype='1'
			ORDER BY tut.post_time DESC 
			LIMIT 5;";
	
	//execute Query
	$result = mysql_query($query) or die ("Error in query: $query.".mysql_error());
	
	while($rows=mysql_fetch_array($result)){
	    echo "<div id=\"Tutorma\">";
		echo "<h3> Title: ";
		echo "<a href=\"ViewExterTut.php?tutid='".$rows["idTutorials"]."'\">";
		echo $rows["title"]."</a></h3>";
		echo "<strong>Author:</strong> ".$rows["user_name"]."<br>"; 
		echo "<strong> Category:</strong> ".$rows["category_title"]."<br>";
		echo "<strong>Summary:</strong> ".$rows['summary']."<br>";
		echo "</div><br>";
	}	
	?>