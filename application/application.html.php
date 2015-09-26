<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>application page</title>
  </head>
  <body>
    <p>This is application page</p>
<?php  echo $_SESSION["states"]; $_SESSION["states"] = ""; ?>
  <form action="/homepage.php" method="post">
  <button type="submit"  name="action" value="0">Back</button>
  </form>
  

  <form action="" method="post">
  <select  style="height:40px;width:300px" name = "timeid", id = "timeid">
    <?php foreach ($rows as $row): ?>
    <option value="<?=$row[timeid]?>"><?=$row[timedate]," ",$row[starttime]," - ",$row[endtime]?></option>
    <?php endforeach; ?>
  </select>

  <input type="text" name="reason">
  <button type="submit"  name="action" value="Submit">Submit</button>
  </form>
  
  </body>
</html>


