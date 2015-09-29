
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

	$row = $s->fetch();

	echo " Name is : " . $row['username'] . "<br>";
	echo " Phone is : " . $row['phone'] . "<br>";
	echo " Address is : " . $row['address'] . "<br>"; 



	try
	{
	$sql = 'SELECT * FROM work_info INNER JOIN time_info ON time_info.timeid = work_info.timeid WHERE userid = :userid';
	$s = $pdo->prepare($sql);
	$s->bindValue(':userid',$UID);	
	$s->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location: /includes/error.html.php");
	exit(); 
	}
	echo "<br>" . "work time:" . "<br>"; 
	while($row = $s->fetch()){
		echo $row['timedate'] . " " . $row['starttime'] . "-" . $row['endtime'] . "<br>";
	}

    include 'homepage.html.php';


?>	
