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

  include 'page-register.html.php';

if (isset($_GET['editform']))
{
  include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

  // first check input form then check change or not? or other better algrithem
  if (empty($_POST["username"])) {
    $_SESSION["error1"] = "Username can't be empty!";
  }else{
    $testusername = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$testusername)) // check if name only contains letters and whitespace
      $_SESSION["error1"] = "Only letters, number and white space allowed!"; 
  }

  if (empty($_POST["userpwd"])) {
    $_SESSION["error2"] = "Userpwd can't be empty!";
  }else{
    $testuserpwd = test_input($_POST["userpwd"]);
    if( strtolower($testuserpwd) == $testuserpwd) 
      $_SESSION["error2"] = "Need at least one Capital letter in password!"; 
  }

  if (empty($_POST["confpwd"])) {
    $_SESSION["error3"] = "Please confrim password!";
  }else{
    if($_POST["confpwd"] != $_POST["userpwd"]) 
      $_SESSION["error3"] = "Confirm password shoulb be the same!"; 
  }

  if (empty($_POST["phone"])) {
    $_SESSION["error4"] = "Phone can't be empty!";
  }else{
    $testphone = test_input($_POST["phone"]);
    if(!preg_match("/^[0-9]{10}$/",$testphone)) 
      $_SESSION["error4"] = "Invalid phone number!"; 
  }

  if (empty($_POST["email"])) {
    $_SESSION["error5"] = "Email can't be empty!";
  }else{
    $testuseremail = test_input($_POST["email"]);
    if (!filter_var($testuseremail, FILTER_VALIDATE_EMAIL)) {
      $_SESSION["error5"] = "Invalid email format!"; 
    }
  }



  if($_SESSION["error1"] || $_SESSION["error2"] || $_SESSION["error3"] || $_SESSION["error4"] || $_SESSION["error5"] )  // if something wrong
    $_SESSION["states"] = "";
  else if( 
    $username == $_POST['username'] &&$userpwd == $_POST['userpwd'] && $phone == $_POST['phone'] && $email == $_POST['email'] && $address == $_POST['address'] )  
    $_SESSION["states"] = "";
  else   $_SESSION["states"] = "Edit success! ";

  
  if($_SESSION["error1"] || $_SESSION["error2"] || $_SESSION["error3"] || $_SESSION["error4"] || $_SESSION["error5"] ){  // if something wrong
    $_SESSION["states"] = "";
  }
  if($_SESSION["states"]){ 
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
    $_SESSION["states"] = "Welcome newuser! ";
    header('Location: ../dashboard');
  }else header('Location: newuser.php');

  //header('Location: http://localhost/editinfosuc.php');
  // exit();
}


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>