	
<?php include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html>
<body>
	<div class="panel-body text-center bk-padding-top-20 bk-wrapper bk-bg-white">
		<!-- Work schedule starts -->
		<div id="" style="height:400px;color:#484848;">
			<?php include 'display.php';?>
		</div>
		<!-- Work schedule ends -->
	</div>
	<div class="panel-body bk-padding-bottom-10 text-center bk-bg-white">
	<?php include 'display_text.php';?>
	</div>
	<div class="panel-body bk-padding-off-bottom bk-padding-off-top bk-bg-info">
		<form action="?" method="post">
		<div class="row text-center">
			<button type="submit" name="action" value="schedule" class="btn btn-primary btn-lg hidden-xs col-lg-4 col-md-4 col-sm-4 col-xs-12 bk-bg-lighten bk-padding-top-10 bk-padding-bottom-10 ">
			<h4 class="bk-margin-off-bottom"> Work Schedule </h4>
			<small>Work Schedule</small>
			</button>
			<button type="submit" name="action" value="request" class="btn btn-primary btn-lg hidden-xs col-lg-4 col-md-4 col-sm-4 col-xs-12 bk-bg-lighten bk-padding-top-10 bk-padding-bottom-10">
			<h4 class="bk-margin-off-bottom"> Leaving Request </h4>
			<small>Leaving Request</small>
			</button>
			<button type="submit" name="action" value="switch" class="btn btn-primary btn-lg hidden-xs col-lg-4 col-md-4 col-sm-4 col-xs-12 bk-bg-lighten bk-padding-top-10 bk-padding-bottom-10">
			<h4 class="bk-margin-off-bottom"> Switch </h4>
			<small>Switch</small>
			</button>
		</div>
		</form>
	</div>
</body>
</html>