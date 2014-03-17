

<?php
//New Designs php page

	//connect to SQL
	include('php/sql_config.php');
	
	//create query
$query = "SELECT ser.idServices, ser.service_title, ser.service_comment, serUsers.user_name, cat.category_title, ser.post_date, ser.printloca
			FROM ctrlp.Tutorials AS ser
			JOIN ctrlp.Users AS serUsers ON ser.Users_idUsers = serUsers.idUsers
			JOIN ctrlp.ServiceCategories AS cat ON ser.ServiceCategories_idServiceCategories = cat.idServiceCategories
			where printloca='0'
			ORDER BY ser.post_date DESC 
		    limit 150;";
	
	//execute Query
	$result = mysql_query($query) or die ("Error in query: $query.".mysql_error());
	
	while($rows=mysql_fetch_array($result)){
	    echo "<div id=\"Designmalong\">";
		echo "<h3> Title: ";
		echo "<a href=\"ViewLocations.php?modid='".$rows["idServices"]."'\">";
		echo $rows["title"]."</a></h3>";
		echo "<strong>Author:</strong> ".$rows["user_name"]."<br>";
		echo "<strong>Summary:</strong> ".$rows['summary']."<br>";
		echo "</div><br>";
	}	
	?>