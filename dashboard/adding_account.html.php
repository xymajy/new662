
<?php include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/helpers.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My addstaff page</title>
  </head>
  <body>
    <h3 class="bk-margin-off"><strong>Create Account</strong></h3><br/>
    <?php echo $_SESSION["states"]; $_SESSION["states"] = ""; ?>
    <form action="" method="post">
    <div style="float:left">
        <label for="userid">userid:  <input type="text" name="userid"
            id="userid" value="<?php echo $maxuserid; ?>"disabled></label>
        <label for="username">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp username: <input type="text" name="username"
            id="username" value="Please name username"></label>
        <span class="error"> * <?php echo $_SESSION["error1"]; $_SESSION["error1"] = ""; ?></span>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <select  style="height:40px;width:300px" name = "groupid", id = "groupid">
          <option value="">Please assign a gourp</option>
          <?php foreach ($groupids as $onegroupid): ?>
          <option value="<?=$onegroupid[groupid]?>"><?="Group ".$onegroupid[groupid].": ".$onegroupid[gname]?></option>
          <?php endforeach; ?>
        </select>
        <span class="error"> * <?php echo $_SESSION["error2"]; $_SESSION["error2"] = ""; ?></span>
        </div>
        <div class="text-right">
      <button type="submit"  name="action" class="btn btn-primary hidden-xs" value="AddStaff">Submit</button><br/><br/>
     </form>
    </div>

  </body>
</html>
