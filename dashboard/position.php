<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

	$UID = $_SESSION["userid"];

	if(!$UID) header("Location: index.php");

    echo $_SESSION["status"] . "<br>"; $_SESSION["status"] = "";

	try
	{
	$sql = 'SELECT * FROM user_info WHERE userid = :userid';
	$s = $pdo->prepare($sql);
	$s->bindValue(':userid',$UID);	
	$s->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location: /includes/error.html.php");
	exit(); 
	}

	$dashrow = $s->fetch();
	$_SESSION["groupid"] = $dashrow['groupid'] ;

	switch ($dashrow[position])
	{

	case 'leader':
	  include './leader/index.php';
	  break;
	case 'warden':
	  include './warden/index.php';
	  break;
	case 'administrator':
	  include './administ/index.php';
	  break;  
	default:
	  break;
	}

?>