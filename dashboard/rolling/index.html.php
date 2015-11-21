<?php include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	<div class="col-sm-8">
		<div class="panel bk-widget bk-border-off bk-webkit-fix">
			<div class="bs-example">
				<div id="carousel-example-generic3c" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="item">
							<div class="panel-body bk-bg-primary">
								<h6 class="bk-margin-off bk-docs-font-weight-300">Last Week <small></small></h6>
							</div>
							<div class="panel-body bk-bg-white text-center bk-padding-top-15 bk-padding-bottom-15">
							</div>
							<div class="panel-body bk-bg-white text-center">
								<h1 class="bk-margin-off-top">
								<?php 
								foreach ($work_schedules3 as $work_schedule)
									{
										weekreader($work_schedule['timedate3']); echo "     ";
										htmlout($work_schedule['starttime3']); echo "     ";
										htmlout($work_schedule['endtime3']);echo "     ";
										echo  "<br>";
									}
								?>
								</h1>
								<!-- <h6 class="bk-docs-font-weight-300 pull-right">CLOUDY </h6> -->
							</div>
						</div>
						<div class="item">
							<div class="panel-body bk-bg-primary">
								<h6 class="bk-margin-off bk-docs-font-weight-300">Current Week <small></small></h6>
							</div>
							<div class="panel-body bk-bg-white text-center bk-padding-top-15 bk-padding-bottom-15">
							</div>
							<div class="panel-body bk-bg-white text-center">
								<h1 class="bk-margin-off-top"><?php 
								foreach ($work_schedules1 as $work_schedule)
									{
										weekreader($work_schedule['timedate1']); //htmlout($work_schedule['timedate1']); 
										echo "     ";
										htmlout($work_schedule['starttime1']); echo "     ";
										htmlout($work_schedule['endtime1']);echo "     ";
										echo  "<br>";
									}
								?></h1>
								<!-- <h6 class="bk-docs-font-weight-300 pull-right">WINDY </h6> -->
							</div>
						</div>
						<div class="item active">
							<div class="panel-body bk-bg-primary">
								<h6 class="bk-margin-off bk-docs-font-weight-300">Next Week <small></small></h6>
							</div>
							<div class="panel-body bk-bg-white text-center bk-padding-top-15 bk-padding-bottom-15">
							</div>
							<div class="panel-body bk-bg-white text-center">
								<h1 class="bk-margin-off-top">
								<?php 
								foreach ($work_schedules2 as $work_schedule)
									{
										weekreader($work_schedule['timedate2']); echo "     ";
										htmlout($work_schedule['starttime2']); echo "     ";
										htmlout($work_schedule['endtime2']);echo "     ";
										echo  "<br>";
									}
								?>
								</h1>
								<!-- <h6 class="bk-docs-font-weight-700 bk-fg-inverse pull-right">RAINY </h6> -->
							</div>
						</div>
					</div>
					<a class="left carousel-control bk-carousel-control bk-carousel-control-white bk-carousel-hide-init" href="#carousel-example-generic3c" role="button" data-slide="prev">
						<span class="fa fa-angle-left icon-prev bk-bg-very-light-gray"></span>
					</a>
					<a class="right carousel-control bk-carousel-control bk-carousel-control-white bk-carousel-hide-init" href="#carousel-example-generic3c" role="button" data-slide="next">
						<span class="fa fa-angle-right icon-next"></span>
					</a>
				</div>
			</div>
			<div class="panel-body bk-ltr">
				<div class="row text-center">
					<a class="col-xs-4 bk-bg-primary bk-bg-darken bk-padding-top-5 bk-padding-bottom-5">
						<h6>SETTING</h6>
					</a>
					<a class="col-xs-4 bk-bg-primary bk-bg-darken bk-padding-top-5 bk-padding-bottom-5">
						<h6>UPDATE</h6>
					</a>
					<a class="col-xs-4 bk-bg-primary bk-bg-darken bk-padding-top-5 bk-padding-bottom-5">
						<h6>NEW</h6>
					</a>
				</div>
			</div>
		</div>  	
	</div>

	</body>
</html>
