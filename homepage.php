
<?php 
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

	$UID = $_SESSION["userid"];

	if(!$UID) header("Location:http://localhost/index.php");
	try
	{
	$sql = 'SELECT * FROM User_Info WHERE userid = :userid';
	$s = $pdo->prepare($sql);
	$s->bindValue(':userid',$UID);	
	$s->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location:http://localhost/error.html.php");
	exit(); 
	}

	$row = $s->fetch();

	echo " Name is : " . $row['username'] . "<br>";
	echo " Phone is : " . $row['phone'] . "<br>";
	echo " Address is : " . $row['address'] . "<br>"; 



	try
	{
	$sql = 'SELECT * FROM Work_Info INNER JOIN Time_Info ON Time_Info.timeid = Work_Info.timeid WHERE userid = :userid';
	$s = $pdo->prepare($sql);
	$s->bindValue(':userid',$UID);	
	$s->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location:http://localhost/error.html.php");
	exit(); 
	}
	echo "<br>" . "work time:" . "<br>"; 
	while($row = $s->fetch()){
		echo $row['timedate'] . " " . $row['starttime'] . "-" . $row['endtime'] . "<br>";
	}

    include 'homepage.html.php';


?>	
