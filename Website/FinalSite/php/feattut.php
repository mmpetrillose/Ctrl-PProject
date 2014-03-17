<?php
	include_once('php/sql_config.php');
	//create query
	$query= "SELECT tut.idTutorials, tut.title, tut.summary, tutUsers.user_name, cat.category_title
	        FROM ctrlp.Tutorials AS tut
	        JOIN ctrlp.Users AS tutUsers ON tut.Users_idUsers = tutUsers.idUsers
	        JOIN ctrlp.TutorialCategories AS cat ON tut.TutorialCategories_idTutorialCategories = cat.idTutorialCategories
	        ORDER BY rep_pos DESC
	        LIMIT 1";
	$result = mysql_query($query) or die ("Error in query: $query.".mysql_error());
	$row=mysql_fetch_array($result);
    $ttitle=$row['title'];
    $submitter=$row['user_name'];
    $cat=$row['category_title'];
    $tsum=$row['summary'];
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
    <div id="featTutorial">
      <h1  class="inset-text-white">Feature Tutorial</h1>
      <a href="viewInternTut.php?tutid=<?php echo $row['idTutorials']?>"><h3 class="inset-text-white"><?php echo $ttitle;?></h3></a></br>
      <a href="profile.php?user=<?php echo $submitter?>"><h4><?php echo $submitter?></h4></a></br>
      <?php echo $cat; ?></br>
      <p>
      	<?php echo $tsum;?>
      </p>
    </div>
</body>
</html>