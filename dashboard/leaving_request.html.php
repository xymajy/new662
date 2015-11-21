<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
	</head>
		<body>
    <?php foreach ($leaveapps as $leaveapp): ?>
      <form action="" method="post">
		username: <input type="hidden" name="leaveuserid" value="<?=$leaveapp[userid]?>"><?=$leaveapp[username]?><br>
		Leave appointment: <input type="hidden" name="leavetimeid" value="<?=$leaveapp[timeid]?>"><?=$leaveapp[timedate]," ",$leaveapp[starttime]," - ",$leaveapp[endtime]?><br>
	    Reason: <input type="hidden" name="userid" value=""><?=$leaveapp[reason]?><br>
	    <button type="submit"  name="action3" class="btn btn-primary hidden-xs" value="apagree">Agree</button>
	    <button type="submit"  name="action3" class="btn btn-primary hidden-xs" value="apreject">Reject</button>
		</form>	
  <?php endforeach; ?>
	<?php foreach ($switchapps as $switchapp): ?>
      <form action="" method="post">
      username1: <input type="hidden" name="swuserid1" value="<?=$switchapp[userid1]?>"><?=$switchapp[un1]?>
      username2: <input type="hidden" name="swuserid2" value="<?=$switchapp[userid2]?>"><?=$switchapp[un2]?><br>
      switch time1: <input type="hidden" name="swtimeid1" value="<?=$switchapp[usertime1]?>"><?=$switchapp[td1]," ",$switchapp[ts1]," - ",$switchapp[te1]?><br>
      switch time2: <input type="hidden" name="swtimeid2" value="<?=$switchapp[usertime2]?>"><?=$switchapp[td2]," ",$switchapp[ts2]," - ",$switchapp[te2]?><br>
      Reason: <input type="hidden" name="reason" value=""><?=$switchapp[reason]?><br>
      <button type="submit"  name="action3" class="btn btn-primary hidden-xs" value="swagree">Agree</button>
      <button type="submit"  name="action3" class="btn btn-primary hidden-xs"value="swreject">Reject</button>
      </form> 

    <?php endforeach; ?>
	</body>
</html>