<?php
	include_once('sql_config.php');
	session_start();
	$user = $_SESSION['login_user'];

	$profilePage = $_GET['user'];
	$query=$query="SELECT * FROM Users WHERE user_name='$user';";
	$result=mysql_query($query);
 	$row=mysql_fetch_array($result);
 	$userid=$row['idUsers'];

 	$query=$query="SELECT * FROM Users WHERE user_name='$profilePage';";
	$result=mysql_query($query);
 	$row=mysql_fetch_array($result);
 	$collabid=$row['idUsers'];

 	$query="INSERT INTO ctrlp.Collaborators (Users_idUsers, collab_id) VALUES ('$userid','$collabid');";
	$result=mysql_query($query);

	header("Location: ../profile.php?user=$profilePage");
?>