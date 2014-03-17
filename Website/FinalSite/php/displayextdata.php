 <?php
//connect to SQL
	include('php/sql_config.php');
	$Tutid=$_SESSION['tutorialID'];
	//echo $Tutid;
	$query = "SELECT tut.idTutorials, tut.title, tut.summary, tutUsers.user_name, cat.category_title, tut.post_time, tut.tuttype,tut.link, tut.rep_pos, tut.rep_neg
			FROM ctrlp.Tutorials AS tut
			JOIN ctrlp.Users AS tutUsers ON tut.Users_idUsers = tutUsers.idUsers
			JOIN ctrlp.TutorialCategories AS cat ON tut.TutorialCategories_idTutorialCategories = cat.idTutorialCategories
			where tut.idTutorials =$Tutid;";
	$result = mysql_query($query) or die ($error = mysql_error());
	while($rows=mysql_fetch_array($result)){
	echo "<Strong><font size =\" 6\">".$rows["title"]."</font></strong><br>";
	echo "<Strong><font size =\" 4\">Author: </font></strong>".$rows["user_name"]."<br>";
	echo "<Strong><font size =\" 4\">Date created:</font></strong> ".$rows["post_time"]."<br>";
	echo "<Strong><font size =\" 4\">Category:</font></strong> ".$rows["category_title"]."<br>";
	echo "<Strong><font size =\"4\">Tutorial Rating:</font></strong><br>";
	echo "<Strong>Likes:</strong> ".$rows["rep_pos"]." <strong>Dislikes:</strong> ";
	echo $rows["rep_neg"]."<br>";
	echo "<Strong><font size =\" 5\">Summary: </font></strong><br>";
	echo $rows["summary"]. "<br>";
	echo "<Strong><font size =\" 5\">External Link: </font></strong> <a href=\"".$rows["link"]."\">".$rows["link"]."</a></h3>";
	}
?>