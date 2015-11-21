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
  $target_dir =  "./uploads/";
  $pageTitle = 'Edit User';
  $editform = 'editform';
  $username = $row['username'];
  $userpwd = $row['userpwd'];
  $phone = $row['phone'];
  $email = $row['email'];
  $address = $row['address'];
  $id = $_SESSION["userid"];
  $button = 'Edit info';
  $changeicon = 'changeicon';
  $icon = searchFile($target_dir, $_SESSION["userid"] ); 
  include 'editinfo.html.php';
// 
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
  }
  //echo "yes";
  header('Location: .');

  //header('Location: http://localhost/editinfosuc.php');
  // exit();
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


if (isset($_GET['changeicon']))
{

  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  $target_file = $target_dir .$_SESSION["userid"] . "." . $imageFileType;
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          //echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          $_SESSION["states2"] = $_SESSION["states2"] . "<br>" . "File is not an image.";
          $uploadOk = 0;
      }
  }

  // Check if file already exists
  if ( $tmp = searchFile($target_dir, $_SESSION["userid"] )) {
    unlink($tmp);
  }
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
      $_SESSION["states2"] = $_SESSION["states2"] . "<br>" . "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      $_SESSION["states2"] = $_SESSION["states2"] . "<br>" . "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      $_SESSION["states2"] = $_SESSION["states2"] . "<br>" ."Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          $_SESSION["states2"] = $_SESSION["states2"] . "<br>" . "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      } else {
          $_SESSION["states2"] = $_SESSION["states2"] . "<br>" . "Sorry, there was an error uploading your file.";
      }
  }
  header('Location: .');
}


function searchFile($dir, $keyword) {
  $sFile = getFile($dir);
  if (count($sFile) <= 0) {
    return false;
  }
  foreach ($sFile as $file) {
    if(strstr($file, $keyword) !== false ){
      $sResult = $file;
    }
  }
  if (count($sResult) <= 0) {
    return false;
  } else {
    return $sResult;
  }

}

function getFile($dir){
  $dp = opendir($dir);
  $fileArr = array();
  while (!false == $curFile = readdir($dp)) {
    if ($curFile!="." && $curFile!=".." && $curFile!="") {
      if (is_dir($curFile)) {
        $fileArr = getFile($dir."/".$curFile);
      } else {
        $fileArr[] = $dir."/".$curFile;
      }
    }
  }
  return $fileArr;
}


?>