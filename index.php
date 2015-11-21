<?php
session_start();
//setcookie("userid",NULL,time()-3600,"/");
//$_SESSION["userid"]=0;
unset($_SESSION["userid"]);
unset($_SESSION["edit"]);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';



if(isset($_POST['action']) and $_POST['action'] == 'Signin'){
  	

	try
	{

	$sql = 'SELECT userid FROM user_info WHERE userid = :userid AND userpwd = :userpwd';
	$s = $pdo->prepare($sql);
	$s->bindValue(':userid',$_POST['login_name']);	
	$s->bindValue(':userpwd',$_POST['login_psw']);	
	$s->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location: error.html.php");
	exit(); 
	}
	$row = $s->fetch();


	if($row['userid']){
		$_SESSION["userid"] = $row['userid'];

		if(test_input($_POST['login_psw']) == '123456'){
			$_SESSION["firstlogin"] = "Please edit your profile";
			header("Location: newuser.php");
		}else header("Location: ./dashboard");

	}else{
		$loginfo = "Fail login";
		header("Location: .");
	}
}
include 'login.html.php';

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


?>


