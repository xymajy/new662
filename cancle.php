<?php

session_start();
  include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';


	$UID = $_SESSION["userid"];


	try
	{
	//$sql = 'SELECT TID FROM workinfo WHERE UID = :UID';
	$sql = 'SELECT workinfo.TID, workdate, begintime, endtime FROM workinfo INNER JOIN time on workinfo.TID = time.TID WHERE UID = :UID';


	$s = $pdo->prepare($sql);
	$s->bindValue(':UID',$UID);	
	$s->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location:http://localhost/error.html.php");
	exit(); 
	}
	$rows = $row = array();
	while(	$row = $s->fetch() ){	
		//print_r($row);
		//$row[] = $row[TID];
		$rows[] = $row;
		// $rows[] = $row[begintime];
		// $rows[] = $row[endtime];
	}
	//print_r($rows);

	// try
	// {
	// $sql = 'SELECT lname FROM usrinfo';
	// $s = $pdo->prepare($sql);
	// // $s->bindValue(':UID',$UID);	
	// $s->execute();
	// }
	// catch (PDOException $e){
	// $error = 'Error select.';
	// header("Location:http://localhost/error.html.php");
	// exit(); 
	// }
	// $rows  = array();
	// while(	$row = $s->fetch() ){	
	// 	$rows[] = $row[lname];
	// }




	if(isset($_POST['action']) and $_POST['action'] == 'Submit')
	{
	  // include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	  // if( $fname ==  $_POST['fname'] &&
	  //     $lname ==  $_POST['lname'] &&
	  //     $address ==  $_POST['address'] )  $_SESSION["edit"] = " ";
	  // else   $_SESSION["edit"] = "Edit info Successful!!";

	  // try
	  // {
	  //   $sql = 'UPDATE usrinfo SET
	  //       fname = :fname,
	  //       lname = :lname,
	  //       address = :address
	  //       WHERE UID = :UID';
	  //   $s = $pdo->prepare($sql);
	  //   $s->bindValue(':UID', $id);
	  //   $s->bindValue(':fname', $_POST['fname']);
	  //   $s->bindValue(':lname', $_POST['lname']);
	  //   $s->bindValue(':address', $_POST['address']);
	  //   $s->execute();
	    
	  // }
	  // catch (PDOException $e)
	  // {
	  //   $error = 'Error updating submitted user.';
	  //   include 'error.html.php';
	  //   exit();
	  // }

	  // header('Location: http://localhost/editinfo.php');
		echo "Application submitted!!!!" . "<br>";

	  //header('Location: http://localhost/editinfosuc.php');
	  // exit();
	}
	include 'cancle.html.php';
?>