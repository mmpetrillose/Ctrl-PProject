<?php
//connect to SQL
	include('php/sql_config.php');
	session_start();
	$Tutorialid=$_GET['tutid'];
	echo "Rate Page";

	echo "<a href=".$_SERVER['PHP_SELF']."?mode=vote&voted=neg\">Awful!</a>";
	echo "<a href=".$_SERVER['PHP_SELF']."?mode=vote&voted=pos\">Awesome!</a>";
	
	if($mode=="vote"){
		if($voted=="pos"){
		mysql_query("UPDATE ctrlp.Tutorials SET rep_pos=rep_pos+1 where idTutorials='$Tutorialid';");
		}
		if($voted=="neg"){
		mysql_query("UPDATE ctrlp.Tutorials SET rep_neg=rep_neg+1 where idTutorials='$Tutorialid';");
		}}
	?>