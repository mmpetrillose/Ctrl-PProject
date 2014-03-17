<?php
	$profilePage = $_GET['user'];

    function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
    }

	$query="SELECT Color FROM UserColors JOIN Users ON UserColors.idUserColors=Users.UserColors_idUserColors WHERE user_name='$profilePage';";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	$color=$row['Color'];
	$rgbcolor=hex2rgb($color);
	$rgbvalue="rgba($rgbcolor[0],$rgbcolor[1],$rgbcolor[2],1.00)";
	$shadevalue="background-color: #$color; color: rgba(112,112,112, 0.8); text-shadow: 1px 4px 6px $rgbvalue, 0 0 0 #000, 1px 4px 6px $rgbvalue;";

	$query="SELECT rating FROM Users WHERE user_name='$profilePage';";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	$comrating=$row['rating'];

  $query="SELECT idUsers FROM Users WHERE user_name='$profilePage';";
  $result=mysql_query($query);
  $row=mysql_fetch_array($result);
  $cid=$row['idUsers'];

  $query="SELECT * 
          FROM Users JOIN Collaborators
          ON Users.idUsers=Collaborators.Users_idUsers
          WHERE user_name='$login_session' AND collab_id='$cid';";
  $result=mysql_query($query);
  $clist=mysql_num_rows($result);

  session_write_close();
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
	<div id="userIndentificationDiv" style="<?php echo $shadevalue?>;">
    	<div id="bottom">
    		<?php echo $profilePage?>
    	</div>
    	<div id="rating">
        	Community Rating: <?php echo $comrating;?>
        </div>
    	<?php
    		if($login_session==$profilePage)
    		{
    			include('php/logout.php');
    			include('php/modifycolor.php');
    		}
        if($login_session!=$profilePage && $clist==0)
        {
          include('php/collaboption.php');
        }
    	?>
    </div>
</body>
</html>