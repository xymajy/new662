<?php
	
	session_start();
  	include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';
  	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

//icon display

// infomation display
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
  $position = $row['position'];
  $group = $row['groupid'];
  $id = $_SESSION["userid"];
  $button = 'Update author';
  $changeicon = 'changeicon';

  	$target_dir =  "./icon/";
  	$id = $_SESSION["userid"];
  	$icon = searchFile($target_dir, $_SESSION["userid"] ); 

  	  	include "info.html.php";
	try{
	    $sql = 'SELECT * FROM user_info WHERE userid = :userid';
	    $s = $pdo->prepare($sql);
	    $s->bindValue(':userid', $_SESSION["userid"]);
	    $s->execute();
	}
	catch (PDOException $e){
	    $error = 'Error fetching user details.';
	    include '/includes/error.html.php';
	    exit();
	}
  	$row = $s->fetch();
	$username = $row['username'];


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
 echo "<script>location.href='./page-profile.html.php';</script>";
}




?>