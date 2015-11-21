
<?php
session_start();
$UID = $_SESSION["userid"];
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
$warning = "";
$createaccount='createaccount';

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
try
  {
    $sql = 'SELECT * FROM user_info WHERE userid = :userid';
    $s = $pdo->prepare($sql);
    $s->bindValue(':userid',$UID);
    $s->execute();
  }
  catch (PDOException $e){
    $error = 'Error select.';
    echo "$e";
    // header("Location: /includes/error.html.php");
    exit(); 
  }
  $row = $s->fetch();
  $position = $row['position'];

if($position=="warden"){
  echo "welcome dear warden";

  try
  {
    $sql = 'SELECT * FROM user_info ORDER BY userid DESC';
    $s = $pdo->prepare($sql);
    $s->bindValue(':userid',$UID);
    $s->execute();
  }
  catch (PDOException $e){
    $error = 'Error select.';
    echo "$e";
    // header("Location: /includes/error.html.php");
    exit(); 
  }
  $row = $s->fetch();
  $highestid = $row['userid'];
  ++$highestid;


  if (isset($_GET['createaccount'])) {
     if (empty($_POST["name"])) {
       $nameErr = "Name is required";
       $warning = "Name is required";
     } else {
       $name = test_input($_POST["name"]);
       // check if name only contains letters and whitespace
       if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
         $nameErr = "Only letters and white space allowed"; 
       }
     }  
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
    if(1){
        try
        {
          $sql = 'INSERT INTO user_info 
              SET
              userid = :userid,
              username = :username,
              userpwd = "aA"';
          $s = $pdo->prepare($sql);
          $s->bindValue(':userid', $highestid);
          $s->bindValue(':username', $_POST['username']);
          $s->execute();
          
        }
        catch (PDOException $e)
        {
          $error = 'Error updating submitted user.';
          echo "$e";
          //include '/includes/error.html.php';
          exit();
        }

        }



  }
  include 'index.html.php';
}
else{
  echo "you do not have access to this page!";
}


  // display highest userid number








?>


