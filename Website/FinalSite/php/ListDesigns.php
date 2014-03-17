

<?php
//New Designs php page

	//connect to SQL
	include('php/sql_config.php');
	
	//create query
	$query = "SELECT ctrlp.Models.idModels, ctrlp.Users.user_name, ctrlp.Models.model_title, ctrlp.Models.upload_date, ctrlp.Models.model_description
			FROM ctrlp.Models
			JOIN ctrlp.Users ON ctrlp.Models.Users_idUsers = ctrlp.Users.idUsers
			JOIN ctrlp.ModelCategories ON ctrlp.Models.ModelCategories_idModelCategories = ctrlp.ModelCategories.idModelCategories
			where ctrlp.ModelCategories.idModelCategories='1'
			ORDER BY ctrlp.Models.upload_date DESC 
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