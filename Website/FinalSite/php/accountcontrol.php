<?php
	include('php/sql_config.php');
	session_start();
	$current_user=$_SESSION['login_user'];
	$query="SELECT user_name FROM Users WHERE `user_name`='$current_user';";
	$result=mysql_query($query);
	$row[]=mysql_fetch_array($result);
	$login_session=$row[0]['user_name'];
	if(!isset($login_session))
	{
		include('php/loginjoin.php');
	}
	else
	{
		include('php/usertag.php');
	}
?>