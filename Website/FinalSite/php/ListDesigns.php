

<?php
//New Designs php page

	//connect to SQL
	include('php/sql_config.php');
	
	//create query
	$query = "SELECT mod.idModels, modUsers.user_name, mod.model_title, mod.upload_date, mod.model_description
			FROM ctrlp.Models AS mod
			JOIN ctrlp.Users AS modUsers ON mod.Users_idUsers = modUsers.idUsers
			JOIN ctrlp.ModelCategories AS cat ON mod.ModelCategories_idModelCategories = cat.idModelCategories
			where mod.ModelCategories='1'
			ORDER BY mod.upload_date DESC 
		    limit 150;";
	
	//execute Query
	$result = mysql_query($query) or die ("Error in query: $query.".mysql_error());
	
	while($rows=mysql_fetch_array($result)){
	    echo "<div id=\"Designmalong\">";
		echo "<h3> Title: ";
		echo "<a href=\"ViewDesign.php?modid='".$rows["idModels"]."'\">";
		echo $rows["title"]."</a></h3>";
		echo "<strong>Author:</strong> ".$rows["user_name"]."<br>";
		echo "<strong>Summary:</strong> ".$rows['summary']."<br>";
		echo "</div><br>";
	}	
	?>