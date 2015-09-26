<?php

session_start();

  include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';


	$UID = $_SESSION["userid"];


	try
	{
	$sql = 'SELECT work_info.timeid, timedate, starttime, endtime FROM work_info INNER JOIN time_info on work_info.timeid = time_info.timeid 
	WHERE userid = :userid AND NOT EXISTS ( SELECT 1 FROM   switch WHERE  switch.userid1 = work_info.userid AND work_info.timeid=switch.usertime1)
	AND NOT EXISTS ( SELECT 1 FROM   application WHERE  application.userid = work_info.userid AND work_info.timeid=application.timeid)';
	$s = $pdo->prepare($sql);
	$s->bindValue(':userid',$UID);	
	$s->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location:http://localhost/error.html.php");
	exit(); 
	}
	$rows = $row = array();
	while(	$row = $s->fetch() ){	
		$rows[] = $row;
	}


	include 'application.html.php';


	if(isset($_POST['action']) and $_POST['action'] == 'Submit')
	{
	  	$_SESSION["states"] = "Application submitted!!!!" ;
		try
		{
			$sql = 'INSERT INTO application SET
			timeid = :timeid,
			userid = :userid,
			reason = :reason';
			$s = $pdo->prepare($sql);
			$s->bindValue(':timeid',$_POST['timeid']);
			$s->bindValue(':userid',$UID);	
			$s->bindValue(':reason',$_POST['reason']);	
			$s->execute();
		}
		catch (PDOException $e){
		$error = 'Error select.';
		header("Location:http://localhost/error.html.php");
		exit(); 
		}

	  header('Location: /application');
	}

?>