<?php
  $profilePage = $_GET['user'];
  if(isset($login_session))
  {
    $cquery="SELECT idUsers, user_name, Users_idUsers, collab_id
                FROM Users JOIN Collaborators
                ON Users.idUsers=Collaborators.Users_idUsers
                WHERE
                  (
                    (
                      SELECT Users.idUsers
                      FROM Users
                      WHERE Users.user_name='$login_session'
                    )=Collaborators.collab_id
                    AND
                    (
                      SELECT Users.idUsers
                      FROM Users
                      WHERE Users.user_name='$profilePage'
                    )=Collaborators.Users_idUsers
                  )
                  OR
                  (
                    (
                      SELECT Users.idUsers
                      FROM Users
                      WHERE Users.user_name='$profilePage'
                    )=Collaborators.collab_id
                    AND
                    (
                      SELECT Users.idUsers
                      FROM Users
                      WHERE Users.user_name='$login_session'
                    )=Collaborators.Users_idUsers
                  );";
        $cresult=mysql_query($cquery);
        $crowcount=mysql_num_rows($cresult);
  }
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
  <?php include('php/useridentpanel.php');?>
  <?php include('php/usersummary.php');?>
  <?php
    if(isset($login_session))
    {
      if($login_session==$profilePage)
      {
        include('php/collabchat.php');
      }
      else
      {
        if($crowcount==2)
        {
          include('php/collabchat.php');
        }
      }
    }
  ?>
  <?php
    $query="SELECT *
            FROM Users JOIN Downloads
            ON Downloads.Users_idUsers=Users.idUsers
            WHERE user_name='$profilePage';";
    $result=mysql_query($query);
    $rowcount=mysql_num_rows($result);
    if($rowcount!=0)
    {
      include('php/userdownloads.php');
    }
  ?>
  <?php
    $query="SELECT *
            FROM Users JOIN Models
            ON Models.Users_idUsers=Users.idUsers
            WHERE user_name='$profilePage';";
    $result=mysql_query($query);
    $rowcount=mysql_num_rows($result);
    if($rowcount!=0)
    {
      include('php/useruploads.php');
    }
  ?>
  <?php
    if(isset($login_session))
    {
      if($login_session==$profilePage)
      {
        include('php/collabmodels.php');
      }
      else
      {
        if($crowcount==2)
        {
          include('php/collabmodels.php');
        }
      }
    }
  ?>
  <?php
    if(isset($login_session))
    {
      if($login_session==$profilePage)
      {
        include('php/prvtmodels.php');
      }
    }
  ?>
</body>
</html>