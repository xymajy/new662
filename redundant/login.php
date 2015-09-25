<html>
<body>
<?php
include_once("dbconnect.inc.php");
$mysqli = new mysqli($host, $user, $password, $database);

/**************check connectiong********************/

if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else echo "Successfully connect to the database" . "<br>";


/**************get the data*************************/
echo "what!";


//session_start();

//$row = array();
//$sql = $mysqli->query("SELECT * FROM info");
//$res = $mysqli->query($sql);
//$row = mysqli_fetch_array($sql);
//echo $row;
//echo $row[];

//$row = $rows = array();
$query = "select * from info; ";
$sql = $mysqli->query("SELECT * FROM info; ");
while($row = mysql_fetch_array($sql)){

print_r($rows);
//$rows[]=$row;
}
//print_r($rows);

//echo mysqli_fetch_array($sql);
//echo $row;
//while($row = mysql_fetch_array($sql)){
//	$rows[] = $row;
//}
//print_r($rows);
//echo "what again!" . "<br>";

?>

</body>
</html>

