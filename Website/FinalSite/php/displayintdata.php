    <?php
//connect to SQL
	include('php/sql_config.php');
	session_start();
	$Tutorialid=$_GET['tutid'];
	$query = "Select tut.title, tut.post_time, tut.rep_neg
			, tut.rep_pos, cat.category_title, tutusers.user_name
			from ctrlp.Tutorials tut
			join ctrlp.TutorialCategories cat on tut.TutorialCategories_idTutorialCategories= cat.idTutorialCategories
			Join ctrlp.Users tutusers on tut.Users_idUsers=tutusers.idUsers
			where`tut.idTutorials`='$Tutorialid';";
	$result = mysql_query($query) or die ($error = mysql_error());
	
	$stepQuery="Select media_title,media_location
				from ctrlp.TutorialMedia
				where `Tutorials_idTutorials`='$Tutorialid';";
	$Stepresult=mysql_query($stepQuery) or die ($error = mysql_error());
	
	echo "<h2>Tutorial Title: ".$result["title"]."</h2>";
	echo "<h3>Author: ".$result["user_name"]."</h3>";
	echo "<h3>Date created: ".$result["post_time"]."</h3>";
	echo "<h3>Category: ".$result["category_title"]."</h3>";
	echo "<h3>Positive: ".$result["rep_pos"]."     Negative: ".$result["rep_neg"]."</h3>";
	
	echo "<h2> Tutorial Steps:</h2>";
	
	while($row=mysql_fetch_array($Stepresult)){
	    echo "<div id=\"Tutormalong\">";
		echo "<h3> Step number".$rows["media_title"]."</h3>";
		echo "<h4>".$row['media_location']."</h4>";
		echo "</div>";
	}	
	
?>
   