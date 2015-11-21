<?php
	session_start();

  	include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';
  	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

	$UID = $_SESSION["userid"];


	// choose user's work time
	try
	{
	$sql = 'SELECT work_info.timeid, timedate, starttime, endtime FROM work_info INNER JOIN time_info on work_info.timeid = time_info.timeid 
	WHERE userid = :userid AND NOT EXISTS ( SELECT 1 FROM switch WHERE switch.userid1 = work_info.userid AND work_info.timeid=switch.usertime1)
	AND NOT EXISTS ( SELECT 1 FROM application WHERE application.userid = work_info.userid AND work_info.timeid=application.timeid)';
	$s = $pdo->prepare($sql);
	$s->bindValue(':userid',$UID);	
	$s->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location: /includes/error.html.php");
	exit(); 
	}
	$rows = $row = array();
	while(	$row = $s->fetch() ){	
		$rows[] = $row;
	}


	try
	{
	$sql2 = 'SELECT DISTINCT work_info.timeid, timedate, starttime, endtime FROM work_info INNER JOIN 
	time_info on work_info.timeid = time_info.timeid  INNER JOIN user_info WHERE work_info.userid != :userid 
	AND user_info.groupid = :groupid AND user_info.userid = work_info.userid AND work_info.timeid not in ( SELECT work_info.timeid 
	FROM  work_info WHERE work_info.userid = :userid )';
	$s2 = $pdo->prepare($sql2);
	$s2->bindValue(':userid',$UID);	
	$s2->bindValue(':groupid',$_SESSION["groupid"]);	
	$s2->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location: /includes/error.html.php");
	exit(); 
	}

	$rows2 = array();
	while(	$row2 = $s2->fetch() ){	

		// $rows2[] = array($row2[timedate]." ".$row2[starttime]."-".$row2[endtime],"root",$row2[timedate]." ".$row2[starttime]."-".$row2[endtime]);
		// $rows2[] = array($row2[username],$row2[timedate]." ".$row2[starttime]."-".$row2[endtime],$row2[username]);
		$rows2[] = array($row2[timeid],"root",$row2[timedate]." ".$row2[starttime]."-".$row2[endtime]);
		// $rows2[] = array($row2[userid],$row2[timeid],$row2[username]);
	}


	try
	{
	$sql2 = 'SELECT username, work_info.userid, work_info.timeid FROM work_info INNER JOIN 
	time_info on work_info.timeid = time_info.timeid  INNER JOIN user_info WHERE work_info.userid != :userid AND user_info.position = "staff" 
	AND user_info.groupid = :groupid AND user_info.userid = work_info.userid AND work_info.timeid not in ( SELECT work_info.timeid 
	FROM  work_info WHERE work_info.userid = :userid )';
	$s2 = $pdo->prepare($sql2);
	$s2->bindValue(':userid',$UID);	
	$s2->bindValue(':groupid',$_SESSION["groupid"]);	
	$s2->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location: /includes/error.html.php");
	exit(); 
	}

	while(	$row2 = $s2->fetch() ){	
		$rows2[] = array($row2[userid],$row2[timeid],$row2[username]);
	}

   	include 'a2.html.php';



	if(isset($_POST['action']) and $_POST['action'] == 'Submit')
	{
		if($_POST['s2'] && $_POST['timeid'] && $_POST['s1']){
		  	$_SESSION["states"] = "Application submitted!!!!" ;
			try
			{
				$sql = 'INSERT INTO switch SET

				userid1 = :userid1,
				userid2 = :userid2,
				usertime1 = :usertime1,
				usertime2 = :usertime2,
				reason = :reason';
				$s = $pdo->prepare($sql);

				$s->bindValue(':userid1',$UID);	
				$s->bindValue(':userid2',$_POST['s2']);	
				$s->bindValue(':usertime1',$_POST['timeid']);
				$s->bindValue(':usertime2',$_POST['s1']);
				$s->bindValue(':reason',$_POST['reason']);	
				$s->execute();
			}
			catch (PDOException $e){
			$error = 'Error select.';
			header("Location: /includes/error.html.php");
			exit(); 
			}
		}else{
			if(!$_POST['timeid']) $_SESSION["error1"] = "Please choose your time.";
			if(!$_POST['s1']) $_SESSION["error2"] = "Please choose another time.";
			if(!$_POST['s2']) $_SESSION["error3"] = "Please choose a person.";
		}

	  	header('Location: .');

	}

?>





