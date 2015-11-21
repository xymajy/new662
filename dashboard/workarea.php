
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

	$dashrow = $s->fetch();
	$_SESSION["groupid"] = $dashrow['groupid'] ;
	// $row = $s->fetch();

	// echo " Name is : " . $row['username'] . "<br>";
	// echo " Phone is : " . $row['phone'] . "<br>";
	// echo " Address is : " . $row['address'] . "<br>"; 



	try
	{
	$sql = 'SELECT * FROM work_info INNER JOIN time_info ON time_info.timeid = work_info.timeid WHERE userid = :userid 
	AND timedate >= DATE_SUB(CURDATE(),INTERVAL 7 DAY) 
	AND timedate <= DATE_ADD(CURDATE(), INTERVAL 7 DAY)';
	$s = $pdo->prepare($sql);
	$s->bindValue(':userid',$UID);	
	$s->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	echo "$e";
	//header("Location: /includes/error.html.php");
	exit(); 
	}
	foreach ($s as $row)
	{
	  $work_schedules[] = array(
	    'timedate1' => $row['timedate'],
	    'starttime1' => $row['starttime'],
	    'endtime1' => $row['endtime']
	  );
	}
	$workdata1_1=$work_schedules[0]['timedate1']."T". $work_schedules[0]['starttime1'];
	$workdata2_1=$work_schedules[1]['timedate1']."T". $work_schedules[1]['starttime1'];
	$workdata3_1=$work_schedules[2]['timedate1']."T". $work_schedules[2]['starttime1'];
	$workdata4_1=$work_schedules[3]['timedate1']."T". $work_schedules[3]['starttime1'];
	$workdata5_1=$work_schedules[4]['timedate1']."T". $work_schedules[4]['starttime1'];
	$workdata6_1=$work_schedules[5]['timedate1']."T". $work_schedules[5]['starttime1'];
	$workdata7_1=$work_schedules[6]['timedate1']."T". $work_schedules[6]['starttime1'];
	$workdata8_1=$work_schedules[7]['timedate1']."T". $work_schedules[7]['starttime1'];
	$workdata9_1=$work_schedules[8]['timedate1']."T". $work_schedules[8]['starttime1'];
	$workdata10_1=$work_schedules[9]['timedate1']."T". $work_schedules[9]['starttime1'];
	$workdata11_1=$work_schedules[10]['timedate1']."T". $work_schedules[10]['starttime1'];
	$workdata12_1=$work_schedules[11]['timedate1']."T". $work_schedules[11]['starttime1'];
	$workdata13_1=$work_schedules[12]['timedate1']."T". $work_schedules[12]['starttime1'];
	$workdata14_1=$work_schedules[13]['timedate1']."T". $work_schedules[13]['starttime1'];
	$workdata15_1=$work_schedules[14]['timedate1']."T". $work_schedules[14]['starttime1'];
	$workdata16_1=$work_schedules[15]['timedate1']."T". $work_schedules[15]['starttime1'];
	$workdata16_1=$work_schedules[16]['timedate1']."T". $work_schedules[16]['starttime1'];
	$workdata17_1=$work_schedules[17]['timedate1']."T". $work_schedules[17]['starttime1'];
	$workdata18_1=$work_schedules[18]['timedate1']."T". $work_schedules[18]['starttime1'];
	$workdata19_1=$work_schedules[19]['timedate1']."T". $work_schedules[19]['starttime1'];
	$workdata20_1=$work_schedules[20]['timedate1']."T". $work_schedules[20]['starttime1'];
	$workdata21_1=$work_schedules[21]['timedate1']."T". $work_schedules[21]['starttime1'];
	$workdata22_1=$work_schedules[22]['timedate1']."T". $work_schedules[22]['starttime1'];
	$workdata23_1=$work_schedules[23]['timedate1']."T". $work_schedules[23]['starttime1'];
	$workdata24_1=$work_schedules[24]['timedate1']."T". $work_schedules[24]['starttime1'];
	$workdata25_1=$work_schedules[25]['timedate1']."T". $work_schedules[25]['starttime1'];
	$workdata26_1=$work_schedules[26]['timedate1']."T". $work_schedules[26]['starttime1'];
	$workdata27_1=$work_schedules[27]['timedate1']."T". $work_schedules[27]['starttime1'];
	$workdata28_1=$work_schedules[28]['timedate1']."T". $work_schedules[28]['starttime1'];
	$workdata29_1=$work_schedules[29]['timedate1']."T". $work_schedules[29]['starttime1'];
	$workdata30_1=$work_schedules[30]['timedate1']."T". $work_schedules[30]['starttime1'];
	$workdata31_1=$work_schedules[31]['timedate1']."T". $work_schedules[31]['starttime1'];
	$workdata32_1=$work_schedules[32]['timedate1']."T". $work_schedules[32]['starttime1'];



	// try
	// {
	// $sql = 'SELECT * FROM work_info INNER JOIN time_info ON time_info.timeid = work_info.timeid WHERE userid = :userid 
	// AND timedate >= DATE_SUB(CURDATE(),INTERVAL MOD(DAYOFWEEK(CURDATE())-1,7) DAY) 
	// AND timedate <= DATE_ADD(CURDATE(), INTERVAL MOD(7 - (DAYOFWEEK(CURDATE())), 7) DAY)';
	// $s = $pdo->prepare($sql);
	// $s->bindValue(':userid',$UID);	
	// $s->execute();
	// }
	// catch (PDOException $e){
	// $error = 'Error select.';
	// echo "$e";
	// //header("Location: /includes/error.html.php");
	// exit(); 
	// }
	// foreach ($s as $row)
	// {
	//   $work_schedules[] = array(
	//     'timedate1' => $row['timedate'],
	//     'starttime1' => $row['starttime'],
	//     'endtime1' => $row['endtime']
	//   );
	// }
	// try
	// {
	// $sql = 'SELECT * FROM work_info INNER JOIN time_info ON time_info.timeid = work_info.timeid WHERE userid = :userid 
	// AND timedate >= DATE_SUB(CURDATE(), INTERVAL MOD(DAYOFWEEK(CURDATE())-1,7)DAY) 
	// AND timedate <= DATE_ADD(CURDATE(), INTERVAL MOD(7 - (DAYOFWEEK(CURDATE())), 7) DAY)';
	// $s = $pdo->prepare($sql);
	// $s->bindValue(':userid',$UID);	
	// $s->execute();
	// }
	// catch (PDOException $e){
	// $error = 'Error select.';
	// header("Location: /includes/error.html.php");
	// exit(); 
	// }
	// foreach ($s as $row)
	// {
	//   $work_schedules[] = array(
	//     'timedate2' => $row['timedate'],
	//     'starttime2' => $row['starttime'],
	//     'endtime2' => $row['endtime']
	//   );
	// }

	// try
	// {
	// $sql = 'SELECT * FROM work_info INNER JOIN time_info ON time_info.timeid = work_info.timeid WHERE userid = :userid 
	// AND timedate >= DATE_SUB(CURDATE(), INTERVAL MOD(DAYOFWEEK(CURDATE())-1,7)DAY) 
	// AND timedate <= DATE_ADD(CURDATE(), INTERVAL MOD(7 - (DAYOFWEEK(CURDATE())), 7) DAY)';
	// $s = $pdo->prepare($sql);
	// $s->bindValue(':userid',$UID);	
	// $s->execute();
	// }
	// catch (PDOException $e){
	// $error = 'Error select.';
	// header("Location: /includes/error.html.php");
	// exit(); 
	// }
	// foreach ($s as $row)
	// {
	//   $work_schedules[] = array(
	//     'timedate3' => $row['timedate'],
	//     'starttime3' => $row['starttime'],
	//     'endtime3' => $row['endtime']
	//   );
	// }

    include 'workarea.html.php';

//triple functions

	if(isset($_POST['Request']) and $_POST['Request'] == 'Submit')
{
	if($_POST['timeid']){
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
		header("Location: /includes/error.html.php");
		exit(); 
		}
	}else{
		$_SESSION["error1"] = "Please choose a time";
	}

  	header('Location: .');
}


	if(isset($_POST['Switch']) and $_POST['Switch'] == 'Submit')
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
	// echo "UID is " . $UID . "<br>";
	// echo "s2 is " . $_POST['s2'] . "<br>";
	// echo "timeid is " . $_POST['timeid'] . "<br>";
	// echo "s1 is " . $_POST['s1'] . "<br>";
	// echo "reason is " . $_POST['reason'] . "<br>";
}

	function weekreader($date1)
	{
		$week=Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
		$date_time=$date1;
		list($date)=explode(" ", $date_time); //取出日期部份
		list($Y,$M,$D)=explode("-",$date); //分離出年月日以便製作時戳
		echo $date."  (".$week[date("w", mktime(0,0,0,$M,$D,$Y))].")";
	}

	
?>