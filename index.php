<?php
	session_start();
	//setcookie("userid",NULL,time()-3600,"/");
	//$_SESSION["userid"]=0;
	session_unset();
	// unset($_SESSION["userid"]);
	// unset($_SESSION["edit"]);

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
		header("Location: /includes/error.html.php");
		exit(); 
		}
		$row = $s->fetch();


		if($row['userid']){
			$_SESSION["userid"] = $row['userid'];
			if(test_input($_POST['login_psw']) == '123456'){
				$_SESSION["firstlogin"] = "You need to edit your information first!";
				header("Location: ./editinfo/newuser.php");
			}else header("Location: ./dashboard");

		}else{
			$_SESSION["logintimes"] = "Fail login";
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





// if (getenv('HTTP_CLIENT_IP')) {
// $ip = getenv('HTTP_CLIENT_IP');
// }
// elseif (getenv('HTTP_X_FORWARDED_FOR')) {
// $ip = getenv('HTTP_X_FORWARDED_FOR');
// }
// elseif (getenv('HTTP_X_FORWARDED')) {
// $ip = getenv('HTTP_X_FORWARDED');
// }
// elseif (getenv('HTTP_FORWARDED_FOR')) {
// $ip = getenv('HTTP_FORWARDED_FOR');
// }
// elseif (getenv('HTTP_FORWARDED')) {
// $ip = getenv('HTTP_FORWARDED');
// }
// else {
// $ip = $_SERVER['REMOTE_ADDR'];
// }



?>


<form action="register.php">
  <input type="submit" value="Regis">
</form> 

<a href="register.php" class="submit_btn" title=" click here to register
" tabindex="4"> register </a>


