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
	/*$sql = 'INSERT INTO info SET
		name = :name,
		age = :age';
	$s = $pdo->prepare($sql);
	$s->bindValue(':name',$_POST['my_login_name']);
	$s->bindValue(':age',$_POST['my_login2_name']);	
	$s->execute();*/
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

	//echo $row['UID'];

	if($row['userid']){
		$_SESSION["userid"] = $row['userid'];
		//header("Location:http://localhost/showsomething.php");

		header("Location: ./dashboard");

	}else{
		$loginfo = "Fail login";
		header("Location: .");
	}
}
include 'login.html.php';
?>


<form action="register.php">
  <input type="submit" value="Regis">
</form> 

<a href="register.php" class="submit_btn" title=" click here to register
" tabindex="4"> register
</a>
