<?php
session_start();
  include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	

  //edit someone
  try
  {
    $sql = 'SELECT * FROM user_info WHERE userid = :userid';
    $s = $pdo->prepare($sql);
    $s->bindValue(':userid', $_SESSION["userid"]);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching user details.';
    include '/includes/error.html.php';
    exit();
  }
  $row = $s->fetch();
  //print_r($row);
  $pageTitle = 'Edit User';
  $action = 'editform';
  $username = $row['username'];
  $userpwd = $row['userpwd'];
  $phone = $row['phone'];
  $email = $row['email'];
  $address = $row['address'];
  $id = $_SESSION["userid"];
  $button = 'Update author';


  include 'editinfo.html.php';

if (isset($_GET['editform']))
{
  include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
  if( $username == $_POST['username'] &&
      $userpwd == $_POST['userpwd'] &&
      $phone == $_POST['phone'] &&
      $email == $_POST['email'] &&
      $address == $_POST['address'] )  $_SESSION["states"] = " ";
  else   $_SESSION["states"] = "Edit info Successful!!";


//check input configpwd

  try
  {
    $sql = 'UPDATE user_info SET
        username = :username,
        userpwd = :userpwd,
        phone = :phone,
        email = :email,
        address = :address
        WHERE userid = :userid';
    $s = $pdo->prepare($sql);
    $s->bindValue(':userid', $id);
    $s->bindValue(':username', $_POST['username']);
    $s->bindValue(':userpwd', $_POST['userpwd']);
    $s->bindValue(':phone', $_POST['phone']);
    $s->bindValue(':email', $_POST['email']);
    $s->bindValue(':address', $_POST['address']);
    $s->execute();
    
  }
  catch (PDOException $e)
  {
    $error = 'Error updating submitted user.';
    include '/includes/error.html.php';
    exit();
  }

  header('Location: .');

  //header('Location: http://localhost/editinfosuc.php');
  // exit();
}

?>