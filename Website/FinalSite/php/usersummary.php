<?php
	$profilePage = $_GET['user'];
	$query="SELECT public_summary FROM Users WHERE `user_name`='$profilePage';";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	$summary=$row['public_summary'];
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
	<div id="userSummaryDiv">
    	<h3 class="inset-text-white">Summary</h3>
    	<p><?php echo $summary?></p>
    </div>
</body>
</html>