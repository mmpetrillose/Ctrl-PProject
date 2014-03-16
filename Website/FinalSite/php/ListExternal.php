

<?php
//New External Tutorials php page

	//connect to SQL
	include('php/sql_config.php');
	session_start();
	
	//create query
	$query = "select top 5 tut.idTutorials,tut.title,tutuser.user_name
			from ctrlp.Tutorials as tut join ctrlp.Users as tutuser on 		
			tut.Users_idUsers=tutuser.idUsers
			order by tut.post_time desc limit 150;";
	
	//execute Query
	$result = mysql_query($query) or die ("Error in query: $query.".mysql_error());
	
	while($row=mysql_fetch_array($result)){
	    echo "<div id=\"Tutorma\">";
		echo "<h3> Title: ";
		echo "<a href=\"ViewExterTut.php?tutid='".$rows["idTutorialLink"]."'\">";
		echo $rows["title"]."</a></h3>";
		echo "<h4>Author: ".$rows["user_name"]."</h4>"; 
		echo "<h4> Summary: </h4>".$rows['summary'];
		echo "</div><br>";
	}	
	?>