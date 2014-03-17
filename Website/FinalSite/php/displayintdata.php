    <?php
//connect to SQL
	include('php/sql_config.php');
	$Tutid=$_SESSION['tutorialID'];
	//query for the basic data

	$query = "SELECT tut.idTutorials, tut.title, tut.summary, tutUsers.user_name, cat.category_title, tut.post_time, tut.tuttype, tut.rep_pos, tut.rep_neg
			FROM ctrlp.Tutorials AS tut
			JOIN ctrlp.Users AS tutUsers ON tut.Users_idUsers = tutUsers.idUsers
			JOIN ctrlp.TutorialCategories AS cat ON tut.TutorialCategories_idTutorialCategories = cat.idTutorialCategories
			where tut.idTutorials =$Tutid;";
	$result = mysql_query($query) or die ($error = mysql_error());
	//display basic data
	while($rows=mysql_fetch_array($result)){
	echo "<Strong><font size =\" 6\">".$rows["title"]."</font></strong><br>";
	echo "<Strong><font size =\" 4\">Author: </font></strong>".$rows["user_name"]."<br>";
	echo "<Strong><font size =\" 4\">Date created:</font></strong> ".$rows["post_time"]."<br>";
	echo "<Strong><font size =\" 4\">Category:</font></strong> ".$rows["category_title"]."<br>";
	echo "<Strong><font size =\"4\">Tutorial Rating:</font></strong><br>";
	echo "<Strong>Likes:</strong> ".$rows["rep_pos"]." <strong>Dislikes:</strong> ";
	echo $rows["rep_neg"]."<br>";
	echo "<Strong><font size =\" 5\">Summary: </font></strong><br>";
	echo $rows["summary"]."<br>";
	}
	
	//Query for the steps	
	$stepQuery="Select media_title,media_location
				from ctrlp.TutorialMedia
				where Tutorials_idTutorials=$Tutid;";
	$Stepresult=mysql_query($stepQuery) or die ($error = mysql_error());
	
	
	echo "<h2> Tutorial Steps:</h2>";
	
	while($rows=mysql_fetch_array($Stepresult)){
	    echo "<div id=\"TutormaStep\">";
		echo "<h3>".$rows["media_title"]."</h3>";
		echo $rows["media_location"];
		echo "</div>";
	}	
	
?>
   