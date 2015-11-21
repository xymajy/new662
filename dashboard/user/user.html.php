<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>regular</title>
  </head>
  <body>


    <?php foreach ($switchapps as $switchapp): ?>
      <form action="" method="post">
			username: <input type="hidden" name="userid1" value="<?=$switchapp[userid1]?>"><?=$switchapp[un1]?><br>
			Want to switch work time : <input type="hidden" name="timeid1" value="<?=$switchapp[usertime1]?>"><?=$switchapp[td1]," ",$switchapp[ts1]," - ",$switchapp[te1]?><br>
      		with your time : <input type="hidden" name="timeid2" value="<?=$switchapp[usertime2]?>"><?=$switchapp[td2]," ",$switchapp[ts2]," - ",$switchapp[te2]?><br>
      Reason: <input type="hidden" name="reason" value=""><?=$switchapp[reason]?><br><br/>
      <div style="float:left">
      <button type="submit"  name="action" class="btn btn-primary hidden-xs" value="swagree">Agree</button></div>
      <div class="text-right">
      <button type="submit"  name="action" class="btn btn-danger hidden-xs" value="swreject">Reject</button>
    </div>
		  </form>	
    <?php endforeach; ?>

  </body>
</html>


