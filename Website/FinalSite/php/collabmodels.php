<?php
	$profilePage = $_GET['user'];
	$query="SELECT model_title, picture_location, download_date
			FROM Users JOIN Downloads
			ON Downloads.Users_idUsers=Users.idUsers
			JOIN Models
			ON Downloads.Models_idModels=Models.idModels
			JOIN ModelPictures
			ON Downloads.Models_idModels=ModelPictures.Models_idModels
			WHERE user_name='$profilePage' AND main_photo='1' AND follower_restrict='1';";
	$result=mysql_query($query);
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
	<?php if(mysql_num_rows($result)!=0){?>
	<div id="collaboratorModelDiv">
		<h3 class="inset-text-white">Collaborator Models</h3>
		<?php
			while($row=mysql_fetch_array($result))
			{
		?>
		<div id="modeldispdiv">
			<?php echo $row['model_title']?>
		</div>
		<?php }?>
		<div style="clear:both;"></div> 
	</div>
	<?php }?>
</body>
</html>