<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>cancle page</title>
  </head>
  <body>
    <p>This is cancle page</p>

    <?php echo $state; $state = ""; ?>

  <form action="homepage.php" method="post">
  <button type="submit"  name="action" value="0">Back</button>
  </form>

  <select  style="height:40px;width:300px">
    <?php foreach ($rows as $row): ?>
    <option value="<?=$row[TID]?>"><?=$row[workdate]," ",$row[begintime]," - ",$row[endtime]?></option>
    <?php endforeach; ?>
  </select>


  <form action="" method="post">
  <button type="submit"  name="action" value="Submit">Submit</button>
  </form>

  </body>
</html>


