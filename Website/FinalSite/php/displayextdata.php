 <?php
//connect to SQL
	include('php/sql_config.php');
	session_start();
	$Tutid=$_SESSION['tutorialID'];
	$query = "Select tut.link,tut.post_date, tut.summary, tut.title, tutuser.user_name
			from ctrlp.TutorialLink as  tut
			join ctrlp.Users as tutuser on tut.Users_idUsers=tutuser.idUsers
			where `tut.idTutorialLink` ='$Tutid';";
	$result = mysql_query($query) or die ($error = mysql_error());
	echo "<h2>Tutorial Title: ".$result["title"]."</h2>";
	echo "<h3>Author: ".$result["user_name"]."</h3>";
	echo "<h3>Date created: ".$result["post_date"]."</h3>";
	echo "<h3>Summary: </h3>";
	echo "<h4>".$result["summary"]."</h4>";
	echo "<h3><a href=\"".$result["link"]."\">".$result["link"]."</a></h3>";
?>