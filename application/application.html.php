<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>application page</title>
    <style>
    .error {color: #FF0000;}
    </style>
  </head>
  <body>
    <p>This is application page</p>
    <?php  echo $_SESSION["states"]; $_SESSION["states"] = ""; ?>
    <form action=" ../dashboard" method="post">
    <button type="submit"  name="action" value="0">Back</button>
    </form>
    <br>




    <form action="" method="post">
    <select  style="height:40px;width:300px" name = "timeid", id = "timeid">
      <option value="">Please Select Time You want to leave</option>
      <?php foreach ($rows as $row): ?>
      <option value="<?=$row[timeid]?>"><?=$row[timedate]," ",$row[starttime]," - ",$row[endtime]?></option>
      <?php endforeach; ?>
    </select>

    <span class="error"> * <?php echo $_SESSION["error1"]; $_SESSION["error1"] = ""; ?></span>
    <br><br><br>
    <!-- <input style="height:40px;width:300px" type="text" name="reason"> -->

    <textarea style="height:60px;width:300px" name = "reason" cols=40 rows=4></textarea>  
    <br>
    <button type="submit"  name="action" value="Submit">Submit</button>
    </form>
  
  <!-- <textarea name = "reason" cols=40 rows=4></textarea>    -->
  <!-- change this into form instead of text -->

  </body>
</html>


