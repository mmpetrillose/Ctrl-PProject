<?php
include_once("sql_config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    // username and password sent from Form
    $myusername=addslashes($_POST['login']);
    $mypassword=addslashes($_POST['password']);

    $sql="SELECT pass_hash FROM Users WHERE `user_name`='$myusername';";
    $result=mysql_query($sql) or die ($error = $sql."<br/><br/>".mysql_error());
    $row=mysql_fetch_array($result);
    $passhash=$row['pass_hash'];
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($passhash==$mypassword)
    {
        $_SESSION['login_user']=$myusername;
        header("location: profile.php?user=$myusername");
    }
    else
    {
        $error="Your Username or Password is invalid.";
    }
}
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
	<?php
		if(isset($error)) echo "$error";
	?>
  <form action="" method="POST">
  <div id="username">
    <label for="login">Username</label><br/>
    <input type="text" id="login" name="login" value="" />
  </div>
  <div id="password">
    <label for="password">Password</label><br/>
    <input type="password" id="password" name="password" value="" />
  </div>
  <div id="submital">
    <input type="submit" value="Login" />
  </div>
  </form>
</body>
</html>