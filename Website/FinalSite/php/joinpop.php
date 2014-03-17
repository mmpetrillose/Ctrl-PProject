<?php
  $disperror = $_GET['error'];
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $uname=addslashes($_POST['newUsername']);
    if($uname!="")
    {
      $pass=addslashes($_POST['newPassword']);
      $vpass=addslashes($_POST['passwordVerify']);
      $mail=addslashes($_POST['email']);
      $vmail=addslashes($_POST['emailVerify']);

      $query="SELECT * FROM Users WHERE user_name='$uname';";
      $result=mysql_query($query);
      $rowcount=mysql_num_rows($result);
      if($rowcount>0)
      {
        $error="Username already in use!";
      }

      $query="SELECT * FROM Users WHERE email='$mail';";
      $result=mysql_query($query);
      $rowcount=mysql_num_rows($result);
      if($rowcount>0)
      {
        $error="Email already registered!";
      }
      elseif($mail!=$vmail)
      {
        $error="Emails do not match!";
      }
      elseif($pass!=$vpass)
      {
        $error="Passwords do not match!";
      }

      if(!isset($error))
      {
        $query="INSERT INTO ctrlp.Users (UserColors_idUserColors, user_name, email, pass_hash, pass_salt, user_online) VALUES ('140', '$uname', '$mail', '$pass', '0000', '0');";
        $result=mysql_query($query);
        unset($uname);
        header("Location: index.php#");
      }
      else
      {
        header("Location: index.php?error=$error#joinForm");
      }
    }
  }
?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
  <form action="" method="POST">
    <div id="newUsernameDiv">
      <?php if(isset($disperror)) echo $disperror;?></br>
      <label for="newUsername">Username</label>
      <input type="text" id="newUsername" name="newUsername" value="" />
    </div>
    <div id="emailDiv">
      <label for="email">Email</label>
      <input type="text" id="email" name="email" value="" />
    </div>
    <div id="emailVerifyDiv">
      <label for="emailVerify">Confirm Email</label>
      <input type="text" id="emailVerify" name="emailVerify" value="" />
    </div>
    <div id="newPasswordDiv">
      <label for="newPassword">Password</label>
      <input type="password" id="newPassword" name="newPassword" value="" />
    </div>
    <div id="passwordVerifyDiv">
      <label for="passwordVerify">Confirm Password</label>
      <input type="password" id="passwordVerify" name="passwordVerify" value="" />
    </div>
    <div id="joinDiv">
      <input type="submit" value="Join" />
    </div>
  </form>
</body>
</html>