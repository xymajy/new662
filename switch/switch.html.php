<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>switch page</title>
  </head>
  <body>
    <p>This is switch page</p>
<?php  echo $_SESSION["states"]; $_SESSION["states"] = ""; ?>
  <form action=" /dashboard" method="post">
  <button type="submit"  name="action" value="0">Back</button>
  </form>
  

  <form action="" method="post">
  <select  style="height:40px;width:300px" name = "timeid", id = "timeid">
    <?php foreach ($rows as $row): ?>
    <option value="<?=$row[timeid]?>"><?=$row[timedate]," ",$row[starttime]," - ",$row[endtime]?></option>
    <?php endforeach; ?>
  </select>

  <form action="" method="post">
  <select  style="height:40px;width:300px" name = "timeid", id = "timeid">
    <?php foreach ($rows2 as $row2): ?>
    <option value="<?=$row2[timeid]?>"><?=$row2[timedate]," ",$row2[starttime]," - ",$row2[endtime]?></option>
    <?php endforeach; ?>
  </select>
  </form>

  <form action="" method="post">
  <select  style="height:40px;width:300px" name = "timeid", id = "timeid">
    <?php foreach ($rows as $row): ?>
    <option value="<?=$row[timeid]?>"><?=$row[timedate]," ",$row[starttime]," - ",$row[endtime]?></option>
    <?php endforeach; ?>
  </select>
  </form>

  <input type="text" name="reason">
  <button type="submit"  name="action" value="Submit">Submit</button>
  </form>



  </body>
</html>

