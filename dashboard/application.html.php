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
    <div>
    <form action="?" method="post">
    <select  style="height:40px;width:300px" name = "timeid", id = "timeid">
      <option value="">Please Select Time You want to leave</option>
      <?php foreach ($rows as $row): ?>
      <option value="<?=$row[timeid]?>"><?=$row[timedate]," ",$row[starttime]," - ",$row[endtime]?></option>
      <?php endforeach; ?>
    </select>
    
    <span class="error"> * <?php echo $_SESSION["error1"]; $_SESSION["error1"] = ""; ?></span>
    </div>
    <br><br><br><br><br><br><br>
    <div class="input-group">
    <input type="text" class="form-control bk-noradius" name = "reason"></input>  
    <span class="input-group-btn">
    <button class="btn btn-primary hidden-xs" type="submit"  name="Request" value="Submit">Submit</button>
    </span>
    </div>
    </form>
  </body>
</html>
