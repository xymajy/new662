<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My addgroup page</title>
  </head>
  <body>
  <h3 class="bk-margin-off"><strong>Create Group</strong></h3><br/>
    <?php echo $_SESSION["states"]; $_SESSION["states"] = ""; ?>
    <div style="float:left">
  	<form action="" method="post">
		
        <label for="groupid">groupid: <input type="text" name="groupid"
            id="groupid" value="<?php echo $maxgroupid[groupid]+1; ?>"disabled></label>
        <label for="groupname">&nbsp&nbsp&nbsp&nbsp&nbspgroupname: <input type="text" name="groupname"
            id="groupname" value="Please name groupname"></label>
    </div>	
    <div class="text-right">
    <button type="submit"  name="action" class="btn btn-primary hidden-xs" value="Creategroup">Submit</button>
	</form>
  </div>
  </body>
</html>
