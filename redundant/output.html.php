<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My login page</title>
  </head>
  <body>
    <p>
      <?php echo $output;
	$row = $rows = array();	

	$sql = mysql_querry("SELECT * FROM info");
	while($row = mysql_fetch_array($sql)){
		$row[] = $row;
	}
	//echo $rows . "<br>";
	echo "what ?" . "<br>";

	 ?>
    </p>
  </body>
</html>
