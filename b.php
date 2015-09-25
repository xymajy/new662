<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My login page</title>
  </head>
  <body>

<select name="select">
  <?php

include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

	$sql = 'SELECT lname FROM usrinfo';
	$s = $pdo->prepare($sql);
	// $s->bindValue(':UID',$UID);	
	$s->execute();
	while(	$row = $s->fetch() ){	
	?>
<!-- 		print_r($row[lname]); -->
		<option value="<?=$row[lname]?>"><?=$row[lname]?></option>
	<?php
 }
 ?>
</select>


  </body>
</html>

<select class="form-control" style="height:40px;width:200px">
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  <option>$rows[0]</option>
  <?php foreach ($rows as $v): ?>
  <?php echo "<option>7</option>"; ?>
  <?php endforeach ?>
  <option value=".$rows[TID]">".$rows[TID]"</option>
</select>