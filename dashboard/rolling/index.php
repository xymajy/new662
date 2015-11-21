
<?php 
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

	$UID = $_SESSION["userid"];

	if(!$UID) header("Location: index.php");
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

	// $row = $s->fetch();

	// echo " Name is : " . $row['username'] . "<br>";
	// echo " Phone is : " . $row['phone'] . "<br>";
	// echo " Address is : " . $row['address'] . "<br>"; 



	try
	{
	$sql = 'SELECT * FROM work_info INNER JOIN time_info ON time_info.timeid = work_info.timeid WHERE userid = :userid 
	AND timedate >= DATE_SUB(CURDATE(), INTERVAL MOD(DAYOFWEEK(CURDATE())-1,7) DAY) 
	AND timedate <= DATE_ADD(CURDATE(), INTERVAL MOD(7 - (DAYOFWEEK(CURDATE())), 7) DAY)';
	$s = $pdo->prepare($sql);
	$s->bindValue(':userid',$UID);	
	$s->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location: /includes/error.html.php");
	exit(); 
	}
	foreach ($s as $row)
	{
	  $work_schedules1[] = array(
	    'timedate1' => $row['timedate'],
	    'starttime1' => $row['starttime'],
	    'endtime1' => $row['endtime']
	  );
	}

	try
	{
	$sql = 'SELECT * FROM work_info INNER JOIN time_info ON time_info.timeid = work_info.timeid WHERE userid = :userid 
	AND timedate >= DATE_SUB(CURDATE(), INTERVAL MOD(DAYOFWEEK(CURDATE())-1,7)-7 DAY) 
	AND timedate <= DATE_ADD(CURDATE(), INTERVAL MOD(7 - (DAYOFWEEK(CURDATE())), 7)+7 DAY)';
	$s = $pdo->prepare($sql);
	$s->bindValue(':userid',$UID);	
	$s->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location: /includes/error.html.php");
	exit(); 
	}
	foreach ($s as $row)
	{
	  $work_schedules2[] = array(
	    'timedate2' => $row['timedate'],
	    'starttime2' => $row['starttime'],
	    'endtime2' => $row['endtime']
	  );
	}

	try
	{
	$sql = 'SELECT * FROM work_info INNER JOIN time_info ON time_info.timeid = work_info.timeid WHERE userid = :userid 
	AND timedate >= DATE_SUB(CURDATE(), INTERVAL MOD(DAYOFWEEK(CURDATE())-1,7) DAY) 
	AND timedate <= DATE_ADD(CURDATE(), INTERVAL MOD(7 - (DAYOFWEEK(CURDATE())), 7) DAY)';
	$s = $pdo->prepare($sql);
	$s->bindValue(':userid',$UID);	
	$s->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location: /includes/error.html.php");
	exit(); 
	}
	foreach ($s as $row)
	{
	  $work_schedules3[] = array(
	    'timedate3' => $row['timedate'],
	    'starttime3' => $row['starttime'],
	    'endtime3' => $row['endtime']
	  );
	}
	//$date2="2013-06-22";
	// function weekreader($date1)
	// {
	// 	$week=Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
	// 	$date_time=$date1;
	// 	list($date)=explode(" ", $date_time); //取出日期部份
	// 	list($Y,$M,$D)=explode("-",$date); //分離出年月日以便製作時戳
	// 	echo $date."  (".$week[date("w", mktime(0,0,0,$M,$D,$Y))].")";
	// }
	include "index.html.php";