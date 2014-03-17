<?php
	$query="SELECT * FROM Models WHERE idModels='1';";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	$title=$row['model_title'];
	$description=$row['model_description']
?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<div id="featDownload" class="inset-text-white">
      <h1 class="inset-text-white">Feature Download</h1>
      <h3 class="inset-text-white"><?php echo $title;?></h3>
      <p>
      	<?php echo $description?>
      </P>
    </div>
</body>
</html>