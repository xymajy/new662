<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';


    try
	{
		$sql2 = 'SELECT * FROM user_info';
		$s2 = $pdo->prepare($sql2);
		$s2->execute();
	}
	catch (PDOException $e){
		$error = 'Error select.';
		header("Location: /includes/error.html.php");
		exit(); 
	}

	$deleteusers2 = array();
	while(	$deleteuser2 = $s2->fetch() ){	
		$deleteusers2[] = array($deleteuser2[userid],"root",$deleteuser2[username]);
	}
	print_r($deleteusers2);
	echo "<br>";

	include 'wardendelete.html.php';

	// set time
	if(isset($_POST['action']) and $_POST['action'] == 'Submit')
	{
		if($_POST['s2'] && $_POST['timeid'] && $_POST['s1']){  // timeid=timeid s1=groupid s2=num
		  	$_SESSION["states"] = "Application submitted!!!!" ;
		  	try
			{
				$sql = 'SELECT * FROM group_time WHERE groupid = :groupid AND timeid = :timeid';
				$s = $pdo->prepare($sql);
				$s->bindValue(':groupid',$_POST['s1']);
				$s->bindValue(':timeid',$_POST['timeid']);	
				$s->execute();
			}
			catch (PDOException $e){
				$error = 'Error select.';
				header("Location: /includes/error.html.php");
				exit(); 
			}

		  	if($row = $s->fetch() ){
				try
				{

			      	$sql = 'UPDATE group_time SET
			        neednum = :neednum
			        WHERE groupid = :groupid AND timeid = :timeid';
					$s = $pdo->prepare($sql);
					$s->bindValue(':groupid',$_POST['s1']);
					$s->bindValue(':timeid',$_POST['timeid']);	
					$s->bindValue(':neednum',$_POST['s2']);
					$s->execute();


				}
				catch (PDOException $e){
				$error = 'Error select.';
				header("Location: /includes/error.html.php");
				exit(); 
				}


		  	}else{
				try
				{
					$sql = 'INSERT INTO group_time SET
					groupid = :groupid,
					timeid = :timeid,
					neednum = :neednum';
					$s = $pdo->prepare($sql);
					$s->bindValue(':groupid',$_POST['s1']);
					$s->bindValue(':timeid',$_POST['timeid']);	
					$s->bindValue(':neednum',$_POST['s2']);
					$s->execute();
				}
				catch (PDOException $e){
				$error = 'Error select.';
				header("Location: /includes/error.html.php");
				exit(); 
				}
			}
		}else{
			if(!$_POST['timeid']) $_SESSION["error1"] = "Please choose time.";
			if(!$_POST['s1']) $_SESSION["error2"] = "Please choose group.";
			if(!$_POST['s2']) $_SESSION["error3"] = "Please choose number.";
		}

	  	header('Location: .');
	}




?>