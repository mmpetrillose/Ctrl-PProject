<?php
	$profilePage = $_GET['user'];
	$query="SELECT model_title, picture_location, Models.upload_date
			FROM Users JOIN Models
			ON Users.idUsers=Models.Users_idUsers
			JOIN ModelPictures
			ON Models.idModels=ModelPictures.Models_idModels
			WHERE user_name='$profilePage' AND main_photo='1';";
	$result=mysql_query($query);
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
	<div id="uploadedModelDiv">
	    <h3 class="inset-text-white">Uploads</h3>
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
</body>
</html>