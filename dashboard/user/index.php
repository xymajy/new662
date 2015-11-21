<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

    // auto reject switch request with time user working at

    try
	{
		$sql = 'SELECT switch.userid1, u1.username AS un1, switch.usertime1,t1.timedate AS td1, t1.starttime AS ts1, t1.endtime 
		AS te1, switch.usertime2,t2.timedate AS td2, t2.starttime AS ts2, t2.endtime AS te2,reason FROM switch INNER JOIN 
		user_info AS u1 ON switch.userid1 = u1.userid INNER JOIN time_info AS t1 on switch.usertime1 = t1.timeid INNER JOIN 
		time_info AS t2 on switch.usertime2 = t2.timeid WHERE switch.userid2 = :userid AND state1 is NULL ORDER BY switch.usertime1';
		$s = $pdo->prepare($sql);
		$s->bindValue(':userid',$_SESSION["userid"]);	
		$s->execute();
	}
	catch (PDOException $e){
		$error = 'Error select.';
		header("Location: /includes/error.html.php");
		exit(); 
	}
	
	$switchapps = array();
	while(	$switchapp = $s->fetch() ){	

		// do a querry to check if time is viable
	    try
		{
			$sql2 = 'SELECT * FROM work_info WHERE userid = :userid AND timeid = :timeid';
			$s2 = $pdo->prepare($sql2);
			$s2->bindValue(':userid',$_SESSION["userid"]);	
			$s2->bindValue(':timeid',$switchapp["usertime1"]);	
			$s2->execute();
		}
		catch (PDOException $e){
			$error = 'Error select.';
			header("Location: /includes/error.html.php");
			exit(); 
		}
		if($temp = $s2->fetch()){

			try
			{
		      	$sql3 = 'UPDATE switch SET state1 = :state1
		          	WHERE usertime1 = :usertime1 AND usertime2 = :usertime2 AND userid1 = :userid1 AND userid2 = :userid2';
		      	$s3 = $pdo->prepare($sql3);
		      	$s3->bindValue(':state1', 'N');
		      	$s3->bindValue(':usertime1', $switchapp['usertime1']);
		      	$s3->bindValue(':userid1', $switchapp['userid1']);
		      	$s3->bindValue(':usertime2', $switchapp['usertime2']);
		      	$s3->bindValue(':userid2', $_SESSION["userid"]);

		      	$s3->execute();
			}
			catch (PDOException $e){
				echo $e;
				// $error = 'Error select.';
				// header("Location: /includes/error.html.php");
				exit(); 
			}


		}else{

			$switchapps[] = $switchapp;			

		}

	}





	include 'user.html.php';




	if(isset($_POST['action']) and $_POST['action'] == 'swagree')
	{
		echo $_POST['userid1']."<br>";
		echo $_POST['timeid1']."<br>";
		echo $_POST['timeid2']."<br>";
		// update the switch

		try
		{
	      	$sql = 'UPDATE switch SET state1 = :state1
	          	WHERE usertime1 = :usertime1 AND usertime2 = :usertime2 AND userid1 = :userid1 AND userid2 = :userid2';
	      	$s = $pdo->prepare($sql);
	      	$s->bindValue(':state1', 'Y');
	      	$s->bindValue(':usertime1', $_POST['timeid1']);
	      	$s->bindValue(':userid1', $_POST['userid1']);
	      	$s->bindValue(':usertime2', $_POST['timeid2']);
	      	$s->bindValue(':userid2', $_SESSION["userid"]);

	      	$s->execute();
		}
		catch (PDOException $e){
			$error = 'Error select.';
			header("Location: /includes/error.html.php");
			exit(); 
		}



	  	header('Location: .');
	}

	if(isset($_POST['action']) and $_POST['action'] == 'swreject')
	{
		//first update the application table

		echo $_POST['userid1']."<br>";
		echo $_POST['timeid1']."<br>";
		echo $_POST['timeid2']."<br>";

		try
		{
	      	$sql = 'UPDATE switch SET state1 = :state1
	          	WHERE usertime1 = :usertime1 AND usertime2 = :usertime2 AND userid1 = :userid1 AND userid2 = :userid2';
	      	$s = $pdo->prepare($sql);
	      	$s->bindValue(':state1', 'N');
	      	$s->bindValue(':usertime1', $_POST['timeid1']);
	      	$s->bindValue(':userid1', $_POST['userid1']);
	      	$s->bindValue(':usertime2', $_POST['timeid2']);
	      	$s->bindValue(':userid2', $_SESSION["userid"]);

	      	$s->execute();
		}
		catch (PDOException $e){
			$error = 'Error select.';
			header("Location: /includes/error.html.php");
			exit(); 
		}

	  	header('Location: .');
	}



?>