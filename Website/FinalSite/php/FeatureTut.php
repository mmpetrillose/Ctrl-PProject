<?php
	include('php/sql_config.php');
	session_start();
	//create query
	$query= "select tut.idTutorials,tut.title,tutuser.user_name
			,tut.rep_neg,tut.rep_pos from ctrlp.Tutorials as tut
			join ctrlp.Users as tutuser on tut.Users_idUsers=tutuser.idUsers
			order by tut.rep_pos desc limit 10;";
	
	//execute Query
	$result = mysql_query($query) or die ("Error in query: $query.".mysql_error());
	$NumRecords= mysql_num_rows($results);
	
	echo "<table cellpadding='5px'>";
	while($row=mysql_fetch_array($result)){
		echo "<tr>" ; 
		echo "<td><h3>";
		echo "<a href=\"viewExterTut.php?tutid='".$rows["idTutorialLink"]."'\">";
		echo $rows["title"]."</a></h3></td>"; 
		echo "<td><h4>".$rows["user_name"]."</h4></td>"; 
		echo "</tr><tr>"; 
		echo "<td>".$rows["rep_pos"]."</td>";
		echo "<td>".$rows["rep_neg"]."</td></tr>"; 
		echo "<tr></tr>" ; 
	}
	echo "</table>"; 
	?>