<?php
$mysql_hostname = "localhost";
$mysql_user = "phpuser";
$mysql_password = "phpuserpassword";
$mysql_database = "ctrlp";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
or die("Oops some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");
?>